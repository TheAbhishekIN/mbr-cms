<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;
use App\Models\Page as PageModel;
use Illuminate\Support\Str;

class CreateUpdatePage extends Component
{
    public $parent_id;
    public $title;
    public $content;
    public $pages;
    public $createUpdate;
    public $pageId;

    protected $rules = [
        'parent_id' => 'required|numeric',
        'title' => 'required|string|max:255',
    ];

    public function mount($createUpdate, $id = null){

        $this->createUpdate = $createUpdate;
        $this->pageId = $id;

        if($createUpdate == 'edit' && $id){
            $page = PageModel::find($id);
            $this->parent_id = $page->parent_id ?? '';
            $this->title = $page->title ?? '';
            $this->content = $page->content ?? '';
        }

        $this->pages = PageModel::pluck('title', 'id');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $page = new PageModel();
        if($this->createUpdate == 'edit'){
            $page = PageModel::findOrFail($this->pageId);
        }
        $page->parent_id = $this->parent_id;
        $page->title = $this->title;
        $page->slug = Str::slug($this->title);
        $page->content = $this->content;

        $page->save();

        session()->flash('message', 'Page successfully created.');

        return redirect()->route('cms.pages')->with('message', 'Success');
    }

    public function render()
    {
        return view('livewire.cms.create-update-page')->layout('layouts.app');
    }
}

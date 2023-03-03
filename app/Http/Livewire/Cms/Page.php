<?php

namespace App\Http\Livewire\Cms;

use App\Models\Page as PageModel;
use Livewire\Component;
use Livewire\WithPagination;

class Page extends Component
{
    use WithPagination;

    public $search = '';
    public $deletePage;
 
    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function confirmDelete(int $id){
        $this->deletePage = $id;
    }
    
    public function deletePage(int $id){
        PageModel::destroy($id);
    }

    public function render()
    {
        return view('livewire.cms.page', [
            'pages' => PageModel::where('title', 'like', '%'.$this->search.'%')->orderByDesc('id')->paginate(5),
        ])->layout('layouts.app');
    }
}

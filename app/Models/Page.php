<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'title',
        'slug',
        'content'
    ];

    public function parentPage(){
        return $this->belongsTo(Page::class, 'parent_id');
    }

    public function childPages()
    {
        return $this->hasMany(Page::class, 'parent_id');
    }

    public static function tree() {
        return static::with(implode('.', array_fill(0, 4, 'children')))->where('parent_id', '=', NULL)->get();
    }
}
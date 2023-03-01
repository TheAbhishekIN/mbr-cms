<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    public function parent_page(){
        return $this->belongsTo(Page::class, 'parent_id', 'id');
    }

    public function child_pages(){
        return $this->hasMany(Page::class, 'id', 'parent_id');
    }
}
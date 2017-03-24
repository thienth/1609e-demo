<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['id', 'cate_name', 'description', 'parent_id'];

    function getParent(){
    	return Category::find($this->parent_id);
    }

    function getParentName(){
    	$parent = $this->getParent();

    	return $parent != false ? $parent->cate_name : "";
    }
}

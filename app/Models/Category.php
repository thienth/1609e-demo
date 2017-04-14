<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nestable\NestableTrait;


class Category extends Model
{
    use NestableTrait;
    
    protected $table = 'categories';
    protected $parent = 'parent_id';
    protected $fillable = ['id', 'cate_name', 'description', 'parent_id'];

    function getParent(){
    	return Category::find($this->parent_id);
    }

    function getParentName(){
    	$parent = $this->getParent();

    	return $parent != false ? $parent->cate_name : "";
    }
}

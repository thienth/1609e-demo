<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
	/**
	* Get list category to display
	* @author: ThienTH
	* @date: 2017/03/20
	* @return: view
	*/
    public function index(){
    	// Get all category
    	$cateList = Category::all();

    	// Return view with data
    	return view("admin.category.index", ["cateList" => $cateList]);
    }

    /**
	* Generate add new cate form
	* @author: ThienTH
	* @date: 2017/03/20
	* @return: view
	*/
    public function addNew(){
    	
    	// Create new category object
    	$model = new Category();

    	// return form with empty model
    	return view("admin.category.form", ["model" => $model]);
    }
}

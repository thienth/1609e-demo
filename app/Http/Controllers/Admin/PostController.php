<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
	/**
	 * Add new post
	 * @param Request
	 * @auth Thienth
	 * @return View
	 */
    public function add(Request $request){
    	$model = new Post();
    	$categories = Category::nested()->get();
    	dd($categories);
    	return view(ADMIN_VIEW_HINT . 'post.form', compact('model', 'categories'));
    }
}

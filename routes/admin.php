<?php 
use Illuminate\Http\Request;
Route::group(['middleware' => 'auth'], function(){
	Route::get('/index', "Admin\\DashboardController@index")->name('admin.dashboard');

	// Category route
	Route::get('/category', "Admin\\CategoryController@index")->name("admin.cate.list");
	Route::get('/category/add-new', "Admin\\CategoryController@addNew")->name("admin.cate.add");
	Route::get('/category/update/{id}', "Admin\\CategoryController@update")->name("admin.cate.update");
	// save category (insert/update)
	Route::post('/category/store', "Admin\\CategoryController@store")->name("admin.cate.store");
	Route::delete('/category/delete', "Admin\\CategoryController@remove")->name("admin.cate.remove");

	// Post Route
	Route::get('/post', "Admin\\PostController@index")->name("admin.post.list");
	Route::get('/post/ad-new', "Admin\\PostController@add")->name("admin.post.add");

});

 ?>
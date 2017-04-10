<?php 
use Illuminate\Http\Request;
Route::get('/index', "Admin\\DashboardController@index")->name('admin.dashboard');

Route::get('/category', "Admin\\CategoryController@index")->name("admin.cate.list");
Route::get('/category/add-new', "Admin\\CategoryController@addNew")->name("admin.cate.add");
Route::get('/category/update/{id}', "Admin\\CategoryController@update")->name("admin.cate.update");
// save category (insert/update)
Route::post('/category/store', "Admin\\CategoryController@store")->name("admin.cate.store");
Route::delete('/category/delete', "Admin\\CategoryController@remove")->name("admin.cate.remove");


 ?>
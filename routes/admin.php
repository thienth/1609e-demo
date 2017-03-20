<?php 
Route::get('/', "Admin\\DashboardController@index");
Route::get('/category', "Admin\\CategoryController@index")->name("admin.cate.list");
Route::get('/category/add-new', "Admin\\CategoryController@addNew")->name("admin.cate.add");



 ?>
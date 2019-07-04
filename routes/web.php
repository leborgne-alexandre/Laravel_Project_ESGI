<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Controle des root user authentifier

Route::middleware(["auth"])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource("/posts", "PostsController");
    Route::get("/trashed", 'PostsController@trashed')->name('trashed-posts');
    Route::resource("/categories", "CategoriesController");
    // Route::resource("/tags", "TagsController");
    Route::get("/likeOrDislikePost/{post}/{user}/{type}", "PostsController@likeOrDislike");
    Route::get("/users", "UsersController@index")->name("users.index");
    Route::put("restore/{post}", "PostsController@restore")->name("restore-post");

});


// Controle des root admin

Route::middleware(["auth", "admin"])->group(function () {


    Route::get("users", "UsersController@index")->name("users.index");



});

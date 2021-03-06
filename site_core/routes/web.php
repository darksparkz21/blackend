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
/*
Route::get('/', function () {
    return view('pages.index');
});
*/

Route::get('/', 'PostController@page');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::resource('/posts', 'PostController');
Route::post('/image-upload', 'PostController@uploadImages');

// Backpack Routes
Route::group(['prefix' => 'admin', 'middleware' => ['admin','clearance'], 'namespace' => 'Admin'], function()
{
    CRUD::resource('menu-item', 'MenuItemCrudController');
    CRUD::resource('article', 'ArticleCrudController');
    CRUD::resource('category', 'CategoryCrudController');
    CRUD::resource('tag', 'TagCrudController');
});
/** CATCH-ALL ROUTE for Backpack/PageManager - needs to be at the end of your routes.php file  **/
Route::get('{page}/{subs?}', ['uses' => 'PageController@index'])
->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);
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

// Rutas de Sesión
Auth::routes();

// Rutas para Front
Route::get('/'						, 'FrontController@index');
Route::get('/related/{category}'	, 'FrontController@showRelatedArticles');
Route::get('/product/{article}'		, 'FrontController@showArticle');
Route::get('/category/{category}'	, 'FrontController@category');


// Rutas para Admin
Route::get('/home'				, 'HomeController@index')->name('home');
Route::resource('articles'		, 'ArticleController');
Route::resource('categories'	, 'CategoryController');
Route::resource('subcategories'	, 'SubcategoryController');
Route::resource('sliders'		, 'SliderController');
Route::post('articles/search',['uses' => 'ArticleController@searchResults', 'as' => 'articles.search']);

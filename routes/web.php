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

// Rutas para Front-End
Route::get('/', 'FrontController@showArticles');
Route::get('/related/{category}', 'FrontController@showRelatedArticles');
Route::get('/showArticle/{article}', 'FrontController@showArticle');

// Rutas para Back-End
Route::get('/home'				, 'HomeController@index')->name('home');
Route::resource('articles'		, 'ArticleController');
Route::resource('categories'	, 'CategoryController');
Route::resource('subcategories'	, 'SubcategoryController');
Route::resource('sliders'		, 'SliderController');

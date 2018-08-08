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
Route::get('/'						, 'FrontController@index')->name('front.index');
Route::get('/related/{category}'	, 'FrontController@showRelatedArticles');
Route::get('/product/{article}'		, 'FrontController@showArticle');
Route::get('/product/view/{slug}'	, 'FrontController@articleBySlug');
Route::get('/category/{category}'	, 'FrontController@category');
Route::get('/sendmessage'			, 'FrontController@messagesend')->name('send.message');


// Rutas para Admin
Route::get('/dashboard'			, 'HomeController@index')->name('home');
Route::resource('articles'		, 'ArticleController');
Route::get('article/pictures/{id}', ['uses' => 'PicController@articlePics','as' => 'article.pictures']);
Route::resource('categories'	, 'CategoryController');
Route::resource('pictures', 'PicController');
Route::resource('subcategories'	, 'SubcategoryController');
Route::resource('sliders'		, 'SliderController');
Route::post('articles/search'	,['uses' => 'ArticleController@searchResults', 'as' => 'articles.search']);

// Rutas auxiliares
Route::get('/addSlugs'			, 'ArticleController@addSlugToAll');

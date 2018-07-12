<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class FrontController extends Controller
{
    public function theme() 
    {
        $articles = Article::all();
        return view('backend.article.index', ['articles' => $articles]);
    }
    public function showArticles() 
    {
        $articles = Article::all();
        return view('front', ['articles' => $articles]);
    }
    public function showRelatedArticles($category) 
    {
        // Decode JSON to PHP array
        $category = json_decode($category);
        
        // If it's an array
        if (is_array($category)){
            //Obtener todos los id de categoria
            $category_ids = collect($category)->pluck('id');
            $articles = Article::whereHas('categories', function($query) use ($category_ids) {
                // Assuming your category table has a column id
                $query->whereIn('categories.id', $category_ids);
            })->get();
        } else {
            dd('Not an array (bad url parameter)');
        }
        return view('front', ['articles' => $articles]);
    }
    public function showArticle($article_id) 
    {
        // Decode JSON to PHP array
        $a = Article::find($article_id);
    	$category = json_decode($a->categories()->get());
        // If it's an array
        if (is_array($category)){
            //Obtener todos los id de categoria
            $category_ids = collect($category)->pluck('id');
            $articles = Article::whereHas('categories', function($query) use ($category_ids) {
                // Assuming your category table has a column id
                $query->whereIn('categories.id', $category_ids);
            })->get();
        } else {
            dd('Not an array (bad url parameter)');
        }
        //dd($articles);
        return view('article', ['article' => $a, 'related' => $articles]);
    }
}

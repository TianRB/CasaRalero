<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Slider;

class FrontController extends Controller
{
    public function index() 
    {
        $slides = Slider::where('enabled', 1)->take(3)->get();
        return view('frontend.index', ['slides' => $slides]);
    }


    public function category($category) 
    {
        switch ($category) {

            case 'muebles':
                $articles = Article::whereHas('categories', function($query) {
                    $query->where('categories.name', 'Muebles'); })->get();
                return view('frontend.category', ['articles' => $articles]);
        
            case 'silleria':
                $articles = Article::whereHas('categories', function($query) {
                    $query->where('categories.name', 'Silleria'); })->get();
                return view('frontend.category', ['articles' => $articles]);
        
            case 'archivo':
                $articles = Article::whereHas('categories', function($query) {
                    $query->where('categories.name', 'Archivo'); })->get();
                return view('frontend.category', ['articles' => $articles]);
        
            case 'cafeteria-y-hoteleria':
                $articles = Article::whereHas('categories', function($query) {
                    $query->where('categories.name', 'Cafetería y Hotelería'); })->get();
                return view('frontend.category', ['articles' => $articles]);
        
            case 'sofas-y-espera':
                $articles = Article::whereHas('categories', function($query) {
                    $query->where('categories.name', 'SofasEspera'); })->get();
                return view('frontend.category', ['articles' => $articles]);
        
            case 'recepciones':
                $articles = Article::whereHas('categories', function($query) {
                    $query->where('categories.name', 'Recepciones'); })->get();
                return view('frontend.category', ['articles' => $articles]);
        
            case 'accesorios':
                $articles = Article::whereHas('categories', function($query) {
                    $query->where('categories.name', 'Accesorios'); })->get();
                return view('frontend.category', ['articles' => $articles]);
        
        }
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
        //dd('success');
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
        return view('frontend.article', ['main' => $a, 'related' => $articles]);
    }
}

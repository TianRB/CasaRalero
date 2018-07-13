<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Subcategory;
use App\Pic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Image;
use File;

class ArticleController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('backend.article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('backend.article.create',['categories' => $categories, 'subcategories' => $subcategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $input = $request->all();

        $rules = [
         'titulo' => 'required|max:255',
         'contenido' => 'required',
         'imagen' => 'required',
         'imagen.*' => 'mimes:jpeg,png,jpg|max:150'
        ];
        $messages = [
            'titulo.required' => 'El campo "título" es obligatorio',
            'contenido.required' => 'El campo "contenido" es obligatorio',
            'imagen.required' => 'Debes subir una foto',
            'imagen.mimes' => 'El archivo debe ser una imágen',
            'imagen.max' => 'La imagen no debe pesar más de 150KB'
        ];

       $validator = Validator::make($input, $rules, $messages);
       if ( $validator->fails() ) {
       return redirect('articles/create')
                   ->withErrors( $validator )
                   ->withInput();
        } else {
            //dd($request->imagen);
            $a = new Article;
            $a->title = $request->input('titulo');
            $a->content = $request->input('contenido');
            $a->save();
            $a->categories()->sync($request->input('categoria'));
            $a->subcategories()->sync($request->input('subcategoria'));
            foreach ($request->imagen as $image) {
                //  Crear Imagen
                //$file = Input::file('imagen');
                //dd($image);
                $name = str_replace(' ', '', strtolower($input['titulo']));

                $file_name = $name.str_random(6).'.'.$image->getClientOriginalExtension();
                $pic = new Pic;
                $pic->path = 'article_pictures/'.$file_name;
                $image->move('article_pictures/', $file_name);
                $a->pics()->save($pic);
            }
            return redirect('articles/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        dd('ArticleController@show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $article = Article::find($id);
        return view('backend.article.edit', ['article' => $article, 'categories' => $categories, 'subcategories' => $subcategories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $input = $request->all();

        $rules = [
         'titulo' => 'required|max:255',
         'contenido' => 'required',
         'imagen' => 'required',
         'imagen.*' => 'mimes:jpeg,png,jpg|max:150'
        ];
        $messages = [
            'titulo.required' => 'El campo "título" es obligatorio',
            'contenido.required' => 'El campo "contenido" es obligatorio',
            'imagen.required' => 'Debes subir una foto',
            'imagen.mimes' => 'El archivo debe ser una imágen',
            'imagen.max' => 'La imagen no debe pesar más de 150KB'
        ];

       $validator = Validator::make($input, $rules, $messages);
       if ( $validator->fails() ) {
       return redirect('articles/create')
                   ->withErrors( $validator )
                   ->withInput();
        } else {
            //dd($request->imagen);
            $a = Article::find($id);
            $a->title = $request->input('titulo');
            $a->content = $request->input('contenido');
            $a->save();
            $a->categories()->sync($request->input('categoria'));
            $a->subcategories()->sync($request->input('subcategoria'));
            foreach ($request->imagen as $image) {
                //  Crear Imagen
                //$file = Input::file('imagen');
                //dd($image);
                $name = str_replace(' ', '', strtolower($input['titulo']));

                $file_name = $name.str_random(6).'.'.$image->getClientOriginalExtension();
                $pic = new Pic;
                $pic->path = 'article_pictures/'.$file_name;
                $image->move('article_pictures/', $file_name);
                $a->pics()->save($pic);
            }
            return redirect('articles/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = Article::find($id);
        if ($a->image != null) {
         $file = $a->image;
         $filename = public_path($file);
         File::delete($filename);
        }
        $a->delete();
        return redirect('articles/');
    }

    /**
     * Add a category to the article.
     *
     * @param  \App\Article  $a
     * @param  \App\Category  $c
     * @return \Illuminate\Http\Response
     */
    public function addCategory(Article $a, Category $c)
    {
        // Save category $c without detaching other categories
        $a->categories()->sync($c, false);
    }

    /**
     * Add a subcategory to the article.
     *
     * @param  \App\Article  $a
     * @param  \App\Subcategory  $s
     * @return \Illuminate\Http\Response
     */
    public function addSubcategory(Article $a, Subcategory $s)
    {
        // Save subcategory $s without detaching other subcategories
        $a->subcategories()->sync($s, false);
    }
}

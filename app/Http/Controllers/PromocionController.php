<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use App\Promocion;
use Image;
use File;

class PromocionController extends Controller
{
    
    private $prefix = 'promos.'; // Rutas
    private $viewPrefix = 'backend.promociones.'; // Vistas
    private $modelSingular = 'promocion'; // Variable enviada a vistas con un modelo
    private $modelPlural = 'promociones'; // Variable enviada a vistas con varios modelos
    
    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(){
        return view($this->viewPrefix.'index', [$this->modelPlural => Promocion::all()]);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create(){
        return view($this->viewPrefix.'create');
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request){
        
        // dd($request->all());
        $input = $request->all();
        
        $rules = [
            'name' => 'required|unique:promociones|max:255',
            'imagen' => 'required|mimes:jpeg,png,jpg|max:400',
            'precio' => 'required|max:255'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        } else {
            //  Crear Imagen
            $file = Input::file('imagen');
            $name = str_random(12);
            $file_name = $name.'.'.$file->getClientOriginalExtension();
            $img_path ='promo_pictures/'.$file_name;
            $request->imagen->move('promo_pictures/', $file_name); 

            $m = new Promocion; // Modelo
            $m->fill($request->all());
            $m->imagen = $img_path;

            $m->save();
            return redirect()->route($this->prefix.'index');
        }
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int $id
    * @return \Illuminate\Http\Response
    */
    public function show($id){
        return view($this->viewPrefix.'show', [$this->modelSingular => Promocion::find($id)]);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id){
        return view($this->viewPrefix.'edit', [$this->modelSingular => Promocion::find($id)]);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id){
        
        // dd($request->all());
        $input = $request->all();
        
        $rules = [
            'name' => 'required|max:255',
            'imagen' => 'mimes:jpeg,png,jpg|max:400',
            'precio' => 'required|max:255'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        } else {
            $m = Promocion::find($id);
            $m->update($input);
            if (Input::file('imagen')) { // Si hay imagen
                File::delete(public_path($m->imagen)); // Eliminar vieja imagen
                $file = Input::file('imagen'); //  Crear Imagen
                $file_name = str_random(12).'.'.$file->getClientOriginalExtension();
                $img_path ='promo_pictures/'.$file_name;
                $request->imagen->move('promo_pictures/', $file_name);
                $m->imagen = $img_path; 
            }
            $m->save();
            return redirect()->route($this->prefix.'index');
        }
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id){
        $m = Promocion::find($id);
        File::delete(public_path($m->imagen)); // Eliminar imagen
        $m->delete();
        return redirect()->route($this->prefix.'index');
    }

    /**
    * Search the specified resource on storage.
    *
    * 
    * @return \Illuminate\Http\Response
    */
    public function searchResults(Request $request)
    {
     $name = $request->name;
     //dd($name);
     $promociones = Promocion::Name($name)->get();
     //dd($promociones);
     return view('backend.promociones.index', ['promociones' => $promociones, 'search' => $name]);
    }
}

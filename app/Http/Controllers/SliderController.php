<?php

namespace App\Http\Controllers;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Image;
use File;

class SliderController extends Controller
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
        $sliders = Slider::all();
        return view('backend.slider.index', ['slider_pics' => $sliders]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create');
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
         'titulo' => 'max:64',
         'imagen' => 'required|mimes:jpeg,png,jpg|max:150'
        ];
        $messages = [
            //'titulo.required' => 'El campo "título" es obligatorio',
            'imagen.required' => 'Debes subir una foto',
            'imagen.mimes' => 'El archivo debe ser una imágen',
            'imagen.max' => 'La imagen no debe pesar más de 150KB'
        ];

       $validator = Validator::make($input, $rules, $messages);
       if ( $validator->fails() ) {
       return redirect('sliders/create')
                   ->withErrors( $validator )
                   ->withInput();
        } else {  
            //  Crear Imagen
            $file = Input::file('imagen');
            $name = str_replace(' ', '', strtolower($input['titulo']));
            $file_name = $name.str_random(6).'.'.$file->getClientOriginalExtension();
            $url ='slider_pictures/'.$file_name;
            $request->imagen->move('slider_pictures/', $file_name); 

            $s = new Slider;
            $s->title = $request->input('titulo');
            $s->path = $url;
            if ($request->input('activado')) {
                $s->enabled = true;
            }
            $s->save();
            return redirect('sliders/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $s = Slider::find($id);
        if ($s->path != null) {
         $file = $s->path;
         $filename = public_path($file);
         File::delete($filename);
        }
        $s->delete();
        return redirect('sliders/');
    }
}

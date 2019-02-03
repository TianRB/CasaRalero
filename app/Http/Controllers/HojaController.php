<?php

namespace App\Http\Controllers;

use App\Hoja;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Validator;
use Image;
use File;

class HojaController extends Controller
{

	private $prefix = 'hojas.'; // Para Rutas
	private $viewPrefix = 'backend.hojas.'; // Para Vistas

	public function __construct(){
		$this->middleware('auth');
	}

	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index(){
		return view($this->viewPrefix.'index', ['hojas' => Hoja::all()]);
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
			'name' => 'unique:hojas|required|max:255',
			'file' => 'max:800|mimes:pdf,jpg,jpeg,png'
		];
		$validator = Validator::make($input, $rules);
		if ($validator->fails()) {
			return redirect()->back()
			->withErrors($validator)
			->withInput();
		} else {
			$m = new Hoja;
			$m->fill($request->all());
			$m->save();

			// imagen 1
			if ($request->file != null) {
				$file = Input::file('file');
				$file_name = str_random(16).'.'.$file->getClientOriginalExtension();
				$m->file = 'img/hojas/'.$file_name;
				$request->file->move('img/hojas/', $file_name);
				$m->save();
			}

			return redirect()->route($this->prefix.'index');
		}
	}

	/**
	* Display the specified resource.
	*
	* @param  \App\Hoja  $category
	* @return \Illuminate\Http\Response
	*/
	public function show($id){
		return view($this->viewPrefix.'show', ['c' => Hoja::find($id)]);
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Hoja  $category
	* @return \Illuminate\Http\Response
	*/
	public function edit($id){
		return view($this->viewPrefix.'edit', ['a' => Hoja::find($id)]);
	}

	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  \App\Hoja  $category
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, $id){

		// dd($request->all());
		$input = $request->all();

		$rules = [
			'name' => 'required|max:255',
			'file' => 'max:800|mimes:pdf,jpg,jpeg,png'
		];
		$validator = Validator::make($input, $rules);
		if ($validator->fails()) {
			return redirect()->back()
			->withErrors($validator)
			->withInput();
		} else {
			$m = Hoja::find($id);
			$m->update($request->all());
			$m->save();

			// imagen 1
			if ($request->file != null) {
				$file = Input::file('file');
				$file_name = str_random(16).'.'.$file->getClientOriginalExtension();
				$m->file = 'img/hojas/'.$file_name;
				$request->file->move('img/hojas/', $file_name);
				$m->save();
			}

			return redirect()->route($this->prefix.'index');
		}
	}

	/**
	* Remove the specified resource from storage.
	*
	* @param  \App\Hoja  $category
	* @return \Illuminate\Http\Response
	*/
	public function destroy($id){
		$m = Hoja::find($id);
		// Eliminar imagen 1
		$oldfile = public_path($m->file);
		File::delete($oldfile);
		$m->delete();
		return redirect()->route($this->prefix.'index');
	}
}

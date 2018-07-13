<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BaseCategories extends Seeder
{
    /**
     * Crear las Categorías base.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('categories')->insert([
	        'name' => 'Muebles',
	       	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	       	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

	    ]); 
	    DB::table('categories')->insert([
	        'name' => 'Silleria',
	       	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	       	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
	    ]); 
	    DB::table('categories')->insert([
	        'name' => 'Archivo',
	       	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	       	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
	    ]); 
	    DB::table('categories')->insert([
	        'name' => 'Cafetería y Hotelería',
	       	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	       	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
	    ]); 
	    DB::table('categories')->insert([
	        'name' => 'Sofás y Espera',
	       	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	       	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
	    ]); 
	    DB::table('categories')->insert([
	        'name' => 'Recepciones',
	       	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	       	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
	    ]); 
	    DB::table('categories')->insert([
	        'name' => 'Accesorios',
	       	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	       	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
	    ]);    
	}
}

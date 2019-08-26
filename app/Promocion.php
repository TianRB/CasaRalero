<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $table = 'promociones';
    protected $fillable = ['name', 'imagen', 'precio'];

    public function scopeName($query, $name)
    {
        return $query->where("name","like","%$name%");
    }
}

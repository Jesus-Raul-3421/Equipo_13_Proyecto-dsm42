<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    //
}
class Categorias extends Modelo
{
    protected $fillable = [
        'nombre', 'status', 'url'
    ];

    public function categoriesProducts()
    {
        return $this->belongsToMany(Productos::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ofertas extends Model
{
    use HasFactory;

    function getOfertas(){
        $ofertas = $this->all()->get('produto_id');;
        return $ofertas;
    }
}
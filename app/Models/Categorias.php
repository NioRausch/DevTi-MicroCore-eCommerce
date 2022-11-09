<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Produtos;

class Categorias extends Model
{
    use HasFactory;

    public function produtos()
    {
        return $this->hasMany(Produtos::class);
    }
}
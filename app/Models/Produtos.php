<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'produtos';
    
    use HasFactory;
}
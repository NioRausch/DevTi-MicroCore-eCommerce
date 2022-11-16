<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Comments;

class Produtos extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'produtos';

    use HasFactory;

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}

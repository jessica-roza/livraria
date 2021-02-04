<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria_Livro extends Model
{
    public $timestamps = false;
    protected $table = 'categoria_has_livro';
    protected $primaryKey = 'id';
    protected $fillable = [
        'categoria_id',
        'livro_id'
    ];
}

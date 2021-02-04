<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro_Autor extends Model
{
    public $timestamps = false;
    protected $table = 'livro_has_auotr';
    protected $primaryKey = 'id';
    protected $fillable = [
      'livro_id',
      'autor_id'
    ];
}

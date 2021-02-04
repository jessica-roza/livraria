<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Usuario extends Model
{
    public $timestamps = false;
    protected $table = 'tipo_usuario';
    protected $primaryKey = 'id';
    protected $fillable = [
      'nome'
    ];

    public function User()
    {
        return $this->hasMany(User::class);
    }
}

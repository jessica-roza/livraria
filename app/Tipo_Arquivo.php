<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Arquivo extends Model
{
    public $timestamps = false;
    protected $table = 'tipo_arquivo';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome'
    ];

    public function Arquivo()
    {
        return $this->hasMany(Arquivo::class);
    }
}

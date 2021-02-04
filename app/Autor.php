<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Autor extends Model
{
    use Searchable;

    public $timestamps = false;
    protected $table = 'autor';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome',
        'ativo'
    ];

    public function toSearchableArray()
    {
        $array = $this->toArray();
        return $array;
    }

    public function Livro()
    {
        return $this->belongsToMany(Livro::class,'livro_has_autor','autor_id','livro_id');
    }
}

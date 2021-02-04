<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Categoria extends Model
{

    use Searchable;

    public $timestamps = false;
    protected $table = 'categoria';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome'
    ];

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();
        return $array;
    }

    public function Livro()
    {
        return $this->belongsToMany(Livro::class,'categoria_has_livro','categoria_id','livro_id');
    }
}

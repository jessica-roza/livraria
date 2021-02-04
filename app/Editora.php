<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Editora extends Model
{
    use Searchable;

    public $timestamps = false;
    protected $table = 'editora';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome',
    ];

    public function Livro()
    {
        return $this->belongsTo(Editora::class);
    }
}

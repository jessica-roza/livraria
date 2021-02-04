<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Livro extends Model
{
    use Searchable;
    public $timestamps = false;
    protected $table = 'livro';
    protected $primaryKey = 'id';
    protected $fillable = [
        'titulo',
        'isbn',
        'edicao',
        'ano',
        'digital',
        'descricao',
        'editora_id'
    ];

    public function Exemplar()
    {
        return $this->hasMany(Exemplar::class);
    }

    public function Categoria()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_has_livro', 'livro_id', 'categoria_id');
    }

    public function Autor()
    {
        return $this->belongsToMany(Autor::class, 'livro_has_autor', 'livro_id', 'autor_id');
    }

    public function Editora()
    {
        return $this->hasMany(Livro::class);
    }

    public function Arquivo()
    {
        return $this->hasMany(Arquivo::class);
    }

    public function AutoresNomes()
    {
        $nomes = '';
        $cont = 1;
        foreach ($this->Autor as $autor) {

            if ($cont < count($this->Autor))
                $nomes .= $autor->nome . ', ';
            else
                $nomes .= $autor->nome;
            $cont++;
        }
        return $nomes;
    }

}

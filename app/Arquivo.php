<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
    public $timestamps = false;
    protected $table = 'arquivo';
    protected $primaryKey = 'id';
    protected $fillable = [
        'path',
        'original_name',
        'livro_id',
        'tipo_arquivo_id'
    ];

    public function TipoArquivo()
    {
        return $this->belongsTo(Tipo_Arquivo::class);
    }

    public function Exemplar()
    {
        return $this->belongsTo(Exemplar::class);
    }

    public function Livro()
    {
        return $this->belongsTo(Livro::class);
    }
}

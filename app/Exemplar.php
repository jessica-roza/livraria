<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exemplar extends Model
{
    public $timestamps = false;
    protected $table = 'exemplar';
    protected $primaryKey = 'id';
    protected $fillable = [
        'disponivel',
        'circular',
        'livro_id',
        'arquivo_id'
    ];

    public function Livro()
    {
        return $this->belongsTo(Livro::class);
    }

    public function Arquivo()
    {
        return $this->hasOne(Arquivo::class);
    }

    public function Emprestimo()
    {
        return $this->hasMany(Emprestimo::class);
    }
}

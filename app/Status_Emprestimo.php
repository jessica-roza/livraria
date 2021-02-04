<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status_Emprestimo extends Model
{
    public $timestamps = false;
    protected $table = 'status_emprestimo';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome'
    ];

    public function Emprestimo()
    {
        return $this->hasMany(Emprestimo::class);
    }
}

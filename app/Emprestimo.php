<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Emprestimo extends Model
{
    use Searchable;

    protected $table = 'emprestimo';
    protected $primaryKey = 'id';
    protected $dates = [
        'data_emprestimo',
        'data_devolucao'
    ];
    protected $fillable = [
        'User_id',
        'data_emprestimo',
        'data_devolucao',
        'status_emprestimo_id',
        'exemplar_id'
    ];

    public function Usuario()
    {
        return $this->belongsTo(User::class,'User_id');
    }

    public function Exemplar()
    {
        return $this->belongsTo(Exemplar::class);
    }

    public function Status_Emprestimo()
    {
        return $this->belongsTo(Status_Emprestimo::class,'status_emprestimo_id');
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    protected $table = 'usuario';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'password',
        'tipo_usuario_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function TipoUsuario()
    {
        return $this->belongsTo(Tipo_Usuario::class);
    }

    public function Emprestimo()
    {
        return $this->hasMany(Emprestimo::class);
    }

    public function AptoEmprestimo()
    {
        $emprestimoAtrasado = $this->Emprestimo()->where('status_emprestimo_id', 5)
            ->orderBy('updated_at', 'Desc')
            ->first();


        if ($emprestimoAtrasado->updated_at > now()->subDays(30))
            return 'pois possui entregas em atraso com menos de 30 dias.';

        $emprestimosAtivos = $this->Emprestimo()->where('status_emprestimo_id',3)->count();

       if ($this->TipoUsuario->id == 1 ||$this->TipoUsuario->id == 2){
           if ($emprestimosAtivos > 5)
               return 'pois possui 5 livros emprestados.';
       }else{
           if ($emprestimosAtivos > 3)
               return 'pois possui 3 livros emprestados.';
       }

       return '';
    }
}

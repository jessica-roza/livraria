<?php

namespace App\Http\Controllers;

use App\Grafico;
use App\Livro;
use PDF;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::User()->tipo_usuario_id == 1) {
            $graficos[] = [Grafico::EmprestimosReservasMensais(),'Empréstimos/Reservas no ultimo Mês'];
            $graficos[] = [Grafico::EmprestimosReservasTrimestre(),'Empréstimos/Reservas no ultimo Trimestre'];
            $graficos[] = [Grafico::EmprestimosReservasPorCategoriaTrimestre(),'Empréstimos/Reservas por Categorias no ultimo Trimestre'];

            return view('Adm.view',compact('graficos'));
        }
        else
            return redirect('/');
    }

    public function RelatorioLivroExemplares()
    {
        $data = Livro::all();
        dd($data);
        $pdf = PDF::loadView('Relatorio.livroExemplares');
        return $pdf->stream();
    }
}

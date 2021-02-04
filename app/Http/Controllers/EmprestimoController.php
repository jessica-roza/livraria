<?php

namespace App\Http\Controllers;

use App\Emprestimo;
use App\Exemplar;
use App\Status_Emprestimo;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


class EmprestimoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = \Request::get('query');
        if ($query != '') {
            $emprestimos = Emprestimo::search($query)->paginate(10);

        } else {
            $emprestimos = Emprestimo::paginate(10);
        }
        return view('Emprestimo.list', compact('emprestimos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $exemplares = Exemplar::where('disponivel', 1)->whereDoesntHave('Emprestimo', function ($query) {
            $query->whereIn('status_emprestimo_id', [1, 3]);
        })->get();
        return view('Emprestimo.create', compact('users', 'exemplares'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(request('user'));
        if (($erro = $user->AptoEmprestimo()) != ''){
            return redirect()->back()->withErrors(["Erro: Este usuário não está apto a realizar novos empréstimos, $erro"]);
        }

        $request->validate([
            'data_emprestimo' => 'required',
            'user' => 'required',
            'exemplar' => 'required',
        ]);


        $exemplar = Exemplar::find(request('exemplar'));
        $data = Carbon::createFromFormat('Y-m-d', request('data_emprestimo'));

        if ($exemplar->circular) {
            if ($data->dayOfWeek() == 5) {
                $dt_dev = $data->addDay(3)->toDateTimeString();
            } else {
                $dt_dev = $data->addDay(1)->toDateTimeString();
            }
        } else {
            if ($user->TipoUsuario->id == 1 || $user->TipoUsuario->id == 2)
                $dt_dev = $data->addDay(15)->toDateTimeString();
            else
                $dt_dev = $data->addDay(10)->toDateTimeString();

        }

        if (request('data_emprestimo') > now()) {
            $status = 1;
        } else {
            $status = 3;
        }

        Emprestimo::create([
            'data_emprestimo' => request('data_emprestimo'),
            'data_devolucao' => $dt_dev,
            'User_id' => request('user'),
            'exemplar_id' => request('exemplar'),
            'status_emprestimo_id' => $status,
        ]);

        return redirect('/emprestimo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Emprestimo $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function show(Emprestimo $emprestimo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Emprestimo $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function edit(Emprestimo $emprestimo)
    {
        $status = Status_Emprestimo::all();
        return view('Emprestimo.edit', compact('emprestimo', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Emprestimo $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emprestimo $emprestimo)
    {
        $request->validate([
            'status' => 'required'
        ]);


        $emprestimo->update([
            'status_emprestimo_id' => request('status')
        ]);

        return redirect('/emprestimo');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Emprestimo $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emprestimo $emprestimo)
    {
        //
    }
}

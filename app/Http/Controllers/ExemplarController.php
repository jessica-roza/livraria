<?php

namespace App\Http\Controllers;

use App\Emprestimo;
use App\Exemplar;
use App\Livro;
use Illuminate\Http\Request;

class ExemplarController extends Controller
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
            $exemplares = Exemplar::search($query)->paginate(10);

        } else {
            $exemplares = Exemplar::paginate(10);
        }
        return view('Exemplar.list', compact('exemplares'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $livros = Livro::all();
        return view('Exemplar.create', compact('livros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'livro' => 'required',
            'circular' => 'nullable',
            'disponivel' => 'nullable'
        ]);

        if (request('circular'))
            $circular = 0;
        else
            $circular = 1;
        if (request('circular'))
            $disponivel = 0;
        else
            $disponivel = 1;

        Exemplar::create([
            'circular' => $circular,
            'disponivel' => $disponivel,
            'livro_id' => request('livro')
        ]);

        return redirect('/exemplar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exemplar $exemplar
     * @return \Illuminate\Http\Response
     */
    public function show(Exemplar $exemplar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exemplar $exemplar
     * @return \Illuminate\Http\Response
     */
    public function edit(Exemplar $exemplar)
    {
        return view('Exemplar.edit',compact('exemplar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Exemplar $exemplar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exemplar $exemplar)
    {
        $request->validate([
            'circular' => 'nullable',
            'disponivel' => 'nullable'
        ]);

        if (request('circular'))
            $circular = 0;
        else
            $circular = 1;
        if (request('disponivel'))
            $disponivel = 0;
        else
            $disponivel = 1;

        $exemplar->update([
            'circular' => $circular,
            'disponivel' => $disponivel,
        ]);

        return redirect('/exemplar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exemplar $exemplar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exemplar $exemplar)
    {
        //
    }
}

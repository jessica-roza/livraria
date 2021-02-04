<?php

namespace App\Http\Controllers;

use App\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
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
            $autores = Autor::search($query)->paginate(10);

        } else {
            $autores = Autor::paginate(10);
        }
        return view('Autor.list', compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Autor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (request('ativo'))
            $ativo = 1;
        else
            $ativo = 0;

        $request->validate([
            'autor' => 'required|max:150',
            'ativo' => 'nullable'
        ]);

        Autor::create([
            'nome' => request('autor'),
            'ativo' => $ativo
        ]);

        return redirect('/autor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Autor $autor
     * @return \Illuminate\Http\Response
     */
    public function show(Autor $autor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Autor $autor
     * @return \Illuminate\Http\Response
     */
    public function edit(Autor $autor)
    {
        return view('Autor.edit', compact('autor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Autor $autor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autor $autor)
    {
        if (request('ativo') == 'on') {
            $ativo = 1;
        } else {
            $ativo = 0;
        }

        $autor->update([
            'nome' => request('autor'),
            'ativo' => $ativo
        ]);


        return redirect('/autor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Autor $autor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autor $autor)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
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
            $categorias = Categoria::search($query)->paginate(10);

        } else {
            $categorias = Categoria::paginate(10);
        }

        return view('Categoria.list', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Categoria.create');
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
            'categoria' => 'required|max:45'
        ]);

        Categoria::create([
            'nome' => request('categoria')
        ]);

        return redirect('/categoria');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($categoria)
    {
        $categoria = Categoria::find($categoria);
        return view('Categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoria)
    {
        $categoria = Categoria::find($categoria);
        $request->validate([
            'categoria' => 'required'
        ]);

        $categoria->update([
            'nome' => request('categoria')
        ]);

        return redirect('/categoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}

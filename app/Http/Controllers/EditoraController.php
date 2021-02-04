<?php

namespace App\Http\Controllers;

use App\Editora;
use Illuminate\Http\Request;

class EditoraController extends Controller
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
            $editoras = Editora::search($query)->paginate(10);

        } else {
            $editoras = Editora::paginate(10);
        }
        return view('Editora.list', compact('editoras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Editora.create');
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
            'editora' => 'required|max:150'
        ]);

        Editora::create([
            'nome' => request('editora')
        ]);

        return redirect('/editora');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Editora $editora
     * @return \Illuminate\Http\Response
     */
    public function show(Editora $editora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Editora $editora
     * @return \Illuminate\Http\Response
     */
    public function edit(Editora $editora)
    {
        return view('Editora.edit', compact('editora'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Editora $editora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Editora $editora)
    {
        $request->validate([
            'editora' => 'required|max:150'
        ]);

        $editora->update([
            'nome' => request('editora')
        ]);

        return redirect('/editora');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Editora $editora
     * @return \Illuminate\Http\Response
     */
    public function destroy(Editora $editora)
    {
        //
    }
}

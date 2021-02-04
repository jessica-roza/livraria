<?php

namespace App\Http\Controllers;

use App\Arquivo;
use App\Autor;
use App\Categoria;
use App\Editora;
use App\Livro;
use Faker\Provider\Image;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = \Request::get('query');
        $categoria = \Request::get('categoria');
        $livros = new Livro();
        if ($categoria != '') {
            $livros = Livro::whereHas('Categoria', function ($query) use ($categoria) {
                $query->where('categoria_id', $categoria);
            });
        }

        if ($query != '') {
            $livros = $livros->where('titulo', 'like', "%$query%")->orWhereHas('Autor', function ($q) use ($query) {
                $q->where('nome', 'like', "%$query%");
            })->paginate(10)->load('Autor', 'Categoria');
        } else {
            $livros = $livros->paginate(10);
        }
        $categorias = Categoria::all();
        return view('Livro.list', compact('livros', 'categorias'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $autores = Autor::all();
        $editoras = Editora::all();
        return view('Livro.create', compact('categorias', 'autores', 'editoras'));
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
            'titulo' => 'required|max:100',
            'isbn' => 'required|max:17',
            'edicao' => 'required',
            'ano' => 'required',
            'capa' => 'required',
            'categoria' => 'required',
            'descricao' => 'required',
            'autor' => 'required',
            'digital' => 'nullable',
            'ebook' => 'required_if:digital,1',
            'editora' => 'required'
        ]);

        $arquivo = $request->file('capa');
        $result = Storage::disk('local')->put("Capa", $arquivo);


        $livro = Livro::create([
            'titulo' => request('titulo'),
            'isbn' => request('isbn'),
            'edicao' => request('edicao'),
            'ano' => request('ano'),
            'digital' => request('digital'),
            'descricao' => request('descricao'),
            'editora_id' => request('editora')
        ]);


        // Inserir 1-Capa

        Arquivo::create([
            'path' => $result,
            'original_name' => $arquivo->getClientOriginalName(),
            'tipo_arquivo_id' => 1,
            'livro_id' => $livro->id
        ]);

        if (request('digital')) {
            $arquivo = $request->file('ebook');
            $result = Storage::disk('local')->put("Ebook", $arquivo);

            // Criar Ebook - 2
            Arquivo::create([
                'path' => $result,
                'original_name' => $arquivo->getClientOriginalName(),
                'tipo_arquivo_id' => 2,
                'livro_id' => $livro->id
            ]);
        }

        $livro->Categoria()->attach(request('categoria'));
        $livro->Autor()->attach(request('autor'));

        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Livro $livro
     * @return \Illuminate\Http\Response
     */
    public function show(Livro $livro)
    {
        return view('Livro.view', compact('livro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Livro $livro
     * @return \Illuminate\Http\Response
     */
    public function edit(Livro $livro)
    {
        return view('Livro.edit', compact('livro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Livro $livro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Livro $livro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Livro $livro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livro $livro)
    {
        //
    }
}



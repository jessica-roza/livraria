<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Categoria;
use App\Livro;
use App\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = \Request::get('query');
        if ($query != '') {
            $buscas = Livro::search($query)->paginate(4)->load('Autor','Categoria');

        } else {
            $buscas = Livro::paginate(4);
        }

        $categorias = Categoria::all();
        $highLights = \App\Livro::inRandomOrder()->limit(2)->get();

        return view('welcome', compact('categorias','buscas','highLights'));
    }
}

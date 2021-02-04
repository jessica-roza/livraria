<?php
/**
 * Created by PhpStorm.
 * User: jroza
 * Date: 01/11/2018
 * Time: 16:10
 */
?>
@extends('layouts.admin')
@section('content')
    <section class="wrapper">
        <div class="inner">
            <span href="#" style="font-size: 23px;"><i style="color: #ce1b28;" class="icon fa-book"></i> Livros
                </span>
            <br>
            <br>
            <form method="GET">
                <input type="hidden" value="{{isset($_GET['categoria'])?$_GET['categoria']:''}}" name="categoria">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button type="submit" class="input-group-text primary dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="basic-addon2">
                            {{isset($_GET['categoria'])&& $_GET['categoria'] != ''?\App\Categoria::find($_GET['categoria'])->nome:'Todas'}}
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" id="cat" data-id="0" href="">Todas</a>
                            @foreach($categorias as $categoria)
                                <a class="dropdown-item" id="cat" href=""
                                   data-id="{{$categoria->id}}">{{$categoria->nome}}</a>
                            @endforeach

                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Buscar..." name="query"
                           aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text primary" id="basic-addon2"><i
                                    class="icon fa-search"></i></button>
                    </div>
                </div>
            </form>
            <div class="highlights">
                @foreach($livros as $livro)
                    <section style="max-width: 250px;">
                        <div style="max-width: 200px;box-shadow: 0px 0px 4px 1px rgba(0, 0, 0, 0.095);">
                            <a href="/livro/{{$livro->id}}" style="text-decoration: none;">
                                <img style="width: 100%;height: auto;max-height: 300px;min-height: 300px;vertical-align: top;"
                                     src='{{asset("storage/{$livro->Arquivo[0]->path}")}}' alt="{{$livro->titulo}}"/>
                                <div class="content" style="max-height:100px;width: 100% !important; padding: 5% 1%;">
                                    <h5>{{$livro->titulo}}<br>{{$livro->AutoresNomes()}}</h5>
                                </div>
                            </a>
                        </div>
                    </section>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $('a[id^=cat]').on('click', function (e) {
            var query = window.location.href;
            query = query.split('query=')[1];
            if (query == null) {
                query = '';
            }
            var id = $(this).data('id');
            if (id !== 0) {
                window.location.href = "/livro?categoria=" + id + "&query=" + query;
            } else {
                window.location.href = "/livro?query=" + query;
            }
            return false;
        });
    </script>
@endsection

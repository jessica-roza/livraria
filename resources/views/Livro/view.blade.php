<?php
/**
 * Created by PhpStorm.
 * User: Jessica
 * Date: 10/27/2018
 * Time: 7:26 PM
 */
?>
@extends('layouts.admin')
@section('content')
    <section class="wrapper">
        <div class="inner">
            <span href="#" style="font-size: 23px;"><i style="color: #ce1b28;" class="icon fa-book"></i> Detalhes do Livro
                </span>
            <br>
            <br>
            <div class="row gtr-uniform">
                <div class="col-4 col-12-xsmall">
                    <img style="width: auto;height: auto;max-height: 400px;vertical-align: top;box-shadow: 0px 0px 4px 1px rgba(0, 0, 0, 0.5);"
                         src="{{asset("storage/{$livro->Arquivo[0]->path}")}}" alt="{{$livro->titulo}}">
                </div>
                <div class="col-8 col-12-xsmall">
                    <h4>Titulo: <label>{{$livro->titulo}}</label></h4>
                    <h4>ISBN: <label>{{$livro->isbn}}</label></h4>
                    <h4>Ano: <label>{{$livro->ano}}</label></h4>
                    <h4>Edição: <label>{{$livro->edicao}}</label></h4>
                    <h4>Descrição:</h4><span>{{$livro->descricao}}</span>

                </div>
                <div class="col-12">
                    <ul class="actions">
                        @if($livro->Exemplar()->where('disponivel',1)->first())
                            <li><a href="/" class="primary">Reservar</a></li>
                        @else
                            <li>
                                <button class="btn-outline-dark disabled">Nenhum Exemplar Físico disponível</button>
                            </li>
                        @endif
                        @if($livro->digital == 1)
                            <li><a href="" class="primary">DownLoad</a></li>
                            <li><a href="" class="primary">Abrir</a></li>
                        @endif
                        <li><a href="/" class="default">Voltar</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

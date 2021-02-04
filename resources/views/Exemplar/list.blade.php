<?php
/**
 * Created by PhpStorm.
 * User: jroza
 * Date: 07/11/2018
 * Time: 14:45
 */
?>
@extends('layouts.admin')
@section('content')
    <section class="wrapper">
        <div class="inner">
            <span href="#" style="font-size: 23px;"><i style="color: #ce1b28;" class="icon fa-book"></i> Exemplares
                </span>
            <br>
            <br>
            <form method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Buscar..." name="query"
                           aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text primary" id="basic-addon2"><i
                                    class="icon fa-search"></i></button>
                    </div>
                </div>
            </form>
            <a href="/exemplar/create" class="button small primary">Novo</a>
            <br>
            <br>
            <div class="table-wrapper">
                <table>
                    <thead>
                    <tr>
                        <th>Código do Exemplar</th>
                        <th>Titulo</th>
                        <th>Tipo</th>
                        <th>Disponibilidade</th>
                        <th>Opções</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($exemplares as $exemplar)
                        <tr>
                            <td>{{$exemplar->id}}</td>
                            <td>{{$exemplar->Livro->titulo}}</td>
                            <td>{{$exemplar->circular?'Circular':'Comum'}}</td>
                            <td>{{$exemplar->disponivel?'Disponível':'Indisponível'}}</td>
                            <td>
                                <a href="/exemplar/{{$exemplar->id}}/edit" role="button" class="button small primary">Atualizar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
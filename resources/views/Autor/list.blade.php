<?php
/**
 * Created by PhpStorm.
 * User: Jessica
 * Date: 10/27/2018
 * Time: 9:38 PM
 */
?>
@extends('layouts.admin')
@section('content')
    <section class="wrapper">
        <div class="inner">
            <span href="#" style="font-size: 23px;"><i style="color: #ce1b28;" class="icon fa-book"></i> Listar Autores
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
            <a href="/autor/create" class="button small primary">Novo</a>
            <br>
            <br>
            <div class="table-wrapper">
                <table>
                    <thead>
                    <tr>
                        <th class="">Matricula</th>
                        <th class="">Nome</th>
                        <th class="">Ativo</th>
                        <th class="">Opções</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($autores as $autor)
                        <tr>
                            <td>{{$autor->id}}</td>
                            <td>{{$autor->nome}}</td>
                            <td>{{$autor->ativo}}</td>
                            <td>
                                <a href="/autor/{{$autor->id}}/edit" class="button small primary ">Atualizar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                Colocar a paginação
            </div>
        </div>
    </section>
@endsection
<?php
/**
 * Created by PhpStorm.
 * User: Jessica
 * Date: 10/28/2018
 * Time: 8:44 PM
 */
?>
@extends('layouts.admin')
@section('content')
    <section class="wrapper">
        <div class="inner">
            <span href="#" style="font-size: 23px;"><i style="color: #ce1b28;" class="icon fa-book"></i> Listar Categorias
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
            <a href="/categoria/create" class="button small primary">Novo</a>
            <br>
            <br>
            <table>
                <thead>
                <tr>
                    <th class="">Matricula</th>
                    <th class="">Nome</th>
                    <th class="">Opções</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{$categoria->id}}</td>
                        <td>{{$categoria->nome}}</td>
                        <td>
                            <a href="/categoria/{{$categoria->id}}/edit" class="button small primary ">Atualizar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $categorias->links() }}
        </div>
    </section>
@endsection
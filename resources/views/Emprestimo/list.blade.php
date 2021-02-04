<?php
/**
 * Created by PhpStorm.
 * User: Jessica
 * Date: 10/29/2018
 * Time: 9:47 PM
 */
?>
@extends('layouts.admin')
@section('content')
    <section class="wrapper">
        <div class="inner">
            <span href="#" style="font-size: 23px;"><i style="color: #ce1b28;" class="icon fa-book"></i> Listar Emprestimos
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
            <a href="/emprestimo/create" class="button small primary">Novo</a>
            <br>
            <br>
            <div class="table-wrapper">
                <table>
                    <thead>
                    <tr>
                        <th>Data do Emprestimo</th>
                        <th>Data de Devolução</th>
                        <th>Usuário</th>
                        <th>Status</th>
                        <th>Exemplar</th>
                        <th>Opções</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($emprestimos as $emprestimo)
                        <tr>
                            <td>{{$emprestimo->data_emprestimo->format('d/M/Y')}}</td>
                            <td>{{$emprestimo->data_devolucao->format('d/M/Y')}}</td>
                            <td>{{$emprestimo->Usuario->name}}</td>
                            <td>{{$emprestimo->Status_Emprestimo->nome}}</td>
                            <td>{{"Cod.: ".$emprestimo->Exemplar->id ." - Título: ". $emprestimo->Exemplar->Livro->titulo }}</td>
                            @if(in_array($emprestimo->Status_Emprestimo->id,[2,4,5]))
                                <td>
                                    <a href="/emprestimo/{{$emprestimo->id}}/edit"
                                       class="button small primary disabled">Atualizar</a>
                                </td>
                            @else
                                <td>
                                    <a href="/emprestimo/{{$emprestimo->id}}/edit" class="button small primary ">Atualizar</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
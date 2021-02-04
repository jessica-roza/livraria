<?php
/**
 * Created by PhpStorm.
 * User: Jessica
 * Date: 10/29/2018
 * Time: 9:51 PM
 */
?>
@extends('layouts.admin')
@section('content')
    <section class="wrapper">
        <div class="inner">
            <span href="#" style="font-size: 23px;"><i style="color: #ce1b28;" class="icon fa-book"></i> Realizar Emprestimo
                </span>
            <br>
            <br>
            @include("layouts.error")
            <form method="post" action="/emprestimo">
                {{csrf_field()}}
                <div class="row gtr-uniform">
                    <div class="col-10 col-12-xsmall">
                        <label for="data_emprestimo">Data Empréstimo</label>
                        <input type="date" name="data_emprestimo" id="data_emprestimo"  min="{{now()->format('Y-m-d')}}" required/>
                    </div>
                    <div class="col-10 col-12-xsmall">
                        <select name="user" id="user">
                            <option value="" disabled selected>- Usuário -</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-10 col-12-xsmall">
                        <select name="exemplar" id="exemplar">
                            <option value="" disabled selected>- Exemplares -</option>
                            @foreach($exemplares as $exemplar)
                                <option value="{{$exemplar->id}}">{{$exemplar->Livro->titulo}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <ul class="actions">
                            <li><input type="submit" value="Salvar" class="primary"/></li>
                            <li><input type="reset" value="Limpar"/></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
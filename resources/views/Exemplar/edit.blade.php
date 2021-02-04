<?php
/**
 * Created by PhpStorm.
 * User: jroza
 * Date: 07/11/2018
 * Time: 16:45
 */
?>
@extends('layouts.admin')
@section('content')
    <section class="wrapper">
        <div class="inner">
            <span href="#" style="font-size: 23px;"><i style="color: #ce1b28;" class="icon fa-book"></i> Atualizar Exemplar
                </span>
            <br>
            <br>
            <form method="post" action="/exemplar/{{$exemplar->id}}">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="row gtr-uniform">
                    <div class="col-6 col-12-xsmall">
                        <h4> Código do Exemplar:</h4>
                        <input type="text" name="id" id="id" value="{{$exemplar->id}}" readonly/>
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <h4> Titulo:</h4>
                        <input type="text" name="livro" id="livro" value="{{$exemplar->Livro->titulo}}" readonly/>
                    </div>
                    <div class="col-6 col-12-small">
                        <input type="checkbox" id="circular" name="circular" {{$exemplar->circular?'checked':''}}>
                        <label for="circular">Circular</label>
                    </div>
                    <div class="col-6 col-12-small">
                        <input type="checkbox" id="disponivel" name="disponivel" {{$exemplar->disponivel?'checked':''}}>
                        <label for="disponivel">Disponível</label>
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

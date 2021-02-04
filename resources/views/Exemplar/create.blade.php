<?php
/**
 * Created by PhpStorm.
 * User: jroza
 * Date: 07/11/2018
 * Time: 14:56
 */
?>
@extends('layouts.admin')
@section('content')
    <section class="wrapper">
        <div class="inner">
            <span href="#" style="font-size: 23px;"><i style="color: #ce1b28;" class="icon fa-book"></i> Cadastrar Exemplar
                </span>
            <br>
            <br>
            <form method="post" action="/exemplar">
                {{csrf_field()}}
                <div class="row gtr-uniform">
                    <div class="col-10 col-12-xsmall">
                        <select name="livro" id="livro">
                            <option value="" disabled selected>- Livro -</option>
                            @foreach($livros as $livro)
                                <option value="{{$livro->id}}">{{$livro->titulo}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-12-small">
                        <input type="checkbox" id="circular" name="circular">
                        <label for="circular">Circular</label>
                    </div>
                    <div class="col-12 col-12-small">
                        <input type="checkbox" id="disponivel" name="disponivel">
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
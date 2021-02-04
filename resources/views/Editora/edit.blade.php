<?php
/**
 * Created by PhpStorm.
 * User: Jessica
 * Date: 10/29/2018
 * Time: 9:32 PM
 */
?>
@extends('layouts.admin')
@section('content')
    <section class="wrapper">
        <div class="inner">
            <span href="#" style="font-size: 23px;"><i style="color: #ce1b28;" class="icon fa-edit"></i> Atualizar Categoria
                </span>
            <br>
            <br>
            <form method="post" action="/editora/{{$editora->id}}">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <div class="row gtr-uniform">
                    <div class="col-10 col-12-xsmall">
                        <input type="text" name="editora" id="editora" value="{{$editora->nome}}"
                               maxlength="150"
                               placeholder="Nome da Editora" required/>
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
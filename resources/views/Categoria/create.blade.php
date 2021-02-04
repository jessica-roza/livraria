<?php
/**
 * Created by PhpStorm.
 * User: Jessica
 * Date: 10/28/2018
 * Time: 8:48 PM
 */
?>
@extends('layouts.admin')
@section('content')
    <section class="wrapper">
        <div class="inner">
            <span href="#" style="font-size: 23px;"><i style="color: #ce1b28;" class="icon fa-book"></i> Cadastro de Categoria
                </span>
            <br>
            <br>
            <form method="post" action="/categoria">
                {{csrf_field()}}
                <div class="row gtr-uniform">
                    <div class="col-10 col-12-xsmall">
                        <input type="text" name="categoria" id="categoria"
                               maxlength="150"
                               placeholder="Nome da Categoria" required/>
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
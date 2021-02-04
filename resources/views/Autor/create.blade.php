<?php
/**
 * Created by PhpStorm.
 * User: Jessica
 * Date: 10/27/2018
 * Time: 10:20 PM
 */
?>
@extends('layouts.admin')
@section('content')
    <section class="wrapper">
        <div class="inner">
            <span href="#" style="font-size: 23px;"><i style="color: #ce1b28;" class="icon fa-book"></i> Cadastro de Autor
                </span>
            <br>
            <br>
            <form method="post" action="/autor" enctype='multipart/form-data'>
                {{csrf_field()}}
                <div class="row gtr-uniform">
                    <div class="col-10 col-12-xsmall">
                        <input type="text" name="autor" id="autor"
                               maxlength="150"
                               placeholder="Nome do Autor" required/>
                    </div>
                    <div class="col-6 col-12-small">
                        <input type="checkbox" id="checkbox-alpha" name="ativo" checked>
                        <label for="checkbox-alpha">Ativo</label>
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
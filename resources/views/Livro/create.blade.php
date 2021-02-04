<?php
/**
 * Created by PhpStorm.
 * User: Jessica
 * Date: 10/20/2018
 * Time: 8:30 PM
 */
?>
@extends('layouts.admin')
@section('content')
    <section class="wrapper">
        <div class="inner">
            <span href="#" style="font-size: 23px;"><i style="color: #ce1b28;" class="icon fa-book"></i> Cadastro de Livro
                </span>
            <br>
            <br>
            <form method="post" action="/livro" enctype='multipart/form-data'>
                {{csrf_field()}}
                <div class="row gtr-uniform">
                    <div class="col-10 col-12-xsmall">
                        <input type="text" name="titulo" id="titulo" value="" maxlength="100"
                               placeholder="Titulo para o Livro" required/>
                    </div>
                    <div class="col-10 col-12-xsmall">
                        <input type="text" name="isbn" id="isbn" value="" maxlength="17" placeholder="Isbn" required/>
                    </div>
                    <div class="col-10 col-12-xsmall">
                        <select name="categoria" id="categoria">
                            <option value="" disabled selected>- Categorias -</option>
                            @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-10 col-12-xsmall">
                        <select name="autor" id="autor">
                            <option value="" disabled selected>- Autores -</option>
                            @foreach($autores as $autor)
                                <option value="{{$autor->id}}">{{$autor->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-10 col-12-xsmall">
                        <select name="editora" id="editora">
                            <option value="" disabled selected>- Editora -</option>
                            @foreach($editoras as $editora)
                                <option value="{{$editora->id}}">{{$editora->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-5 col-12-xsmall">
                        <input type="text" name="edicao" id="edicao" value="" pattern="([0-9])*\d"
                               title="Digite apenas números" maxlength="3" placeholder="Edição" required/>
                    </div>
                    <div class="col-5 col-12-xsmall">
                        <input type="text" name="ano" id="ano" pattern="([0-9])*\d" title="Digite apenas números"
                               maxlength="4" value="" placeholder="Ano Publicação" required/>
                    </div>
                    <div class="input-group mb-3 col-10 col-12-xsmall">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">CAPA</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="capa"
                                   aria-describedby="inputGroupFileAddon01" name="capa">
                            <label class="custom-file-label" for="inputGroupFile01">Escolha a Capa</label>
                        </div>
                    </div>
                    <div class="col-6 col-12-small">
                        <input type="checkbox" id="digital" name="digital" value="1">
                        <label for="digital">Possui Exemplar Digital</label>
                    </div>
                    <div class="input-group mb-3 col-10 col-12-xsmall" id="divEbook" style="display: none;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">E-BOOK</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="ebook"
                                   aria-describedby="inputGroupFileAddon01" name="ebook">
                            <label class="custom-file-label" for="inputGroupFile01">Escolha o E-Book</label>
                        </div>
                    </div>
                    <div class="col-10 col-12-xsmall">
                        <textarea name="descricao" id="descricao" maxlength="255"
                                  placeholder="Faça uma descrição do livro" required></textarea>
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
@section('js')
    <script>
        $('#digital').on('click',function () {
            $('#divEbook').toggle(300);
        });
    </script>
@endsection

<?php
/**
 * Created by PhpStorm.
 * User: jroza
 * Date: 07/11/2018
 * Time: 14:30
 */
?>
@extends('layouts.admin')
@section('content')
    <section class="wrapper">
        <div class="inner">
            <span href="#" style="font-size: 23px;"><i style="color: #ce1b28;" class="icon fa-book"></i> Atualizar Emprestimo
                </span>
            <br>
            <br>
            <form method="post" action="/emprestimo/{{$emprestimo->id}}">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="row gtr-uniform">
                    <div class="col-5 col-12-xsmall">
                        <label for="data_emprestimo">Data Empréstimo</label>
                        <input type="text" name="data_emprestimo" id="data_emprestimo"
                               value="{{$emprestimo->data_emprestimo->format('d/M/Y')}}" readonly/>
                    </div>
                    <div class="col-5 col-12-xsmall">
                        <label for="data_devolucao">Data Devolução</label>
                        <input type="text" name="data_devolucao" id="data_devolucao"
                               value="{{$emprestimo->data_devolucao->format('d/M/Y')}}" readonly/>
                    </div>
                    <div class="col-4 col-12-xsmall">
                        <label for="data_devolucao">Usuario</label>
                        <input type="text" name="data_devolucao" id="data_devolucao"
                               value="{{$emprestimo->Usuario->name}}" readonly/>
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label for="data_devolucao">Exemplar</label>
                        <input type="text" name="data_devolucao" id="data_devolucao"
                               value="{{$emprestimo->Exemplar->Livro->titulo}}" readonly/>
                    </div>
                    <div class="col-10 col-12-xsmall">
                        <label for="status">Status</label>
                        <select name="status" id="status">
                            <option value="" disabled selected>- Status -</option>
                            @foreach($status as $st)
                                @if($st->id == $emprestimo->Status_Emprestimo->id)
                                    <option value="{{$st->id}}" selected>{{$st->nome}}</option>
                                @else
                                    <option value="{{$st->id}}">{{$st->nome}}</option>
                                @endif
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
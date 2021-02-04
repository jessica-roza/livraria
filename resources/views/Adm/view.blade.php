<?php
/**
 * Created by PhpStorm.
 * User: jroza
 * Date: 05/11/2018
 * Time: 17:34
 */
?>
@extends('layouts.admin')
@section('content')
    <section class="wrapper">
        <div class="inner">
            <span href="#" style="font-size: 23px;"><i style="color: #ce1b28;" class="icon fa-line-chart"></i> DashBoard
                </span>
            <br>
            <br>
            @foreach($graficos as $grafico)
                <div>
                    <h3 style="text-align: center;">{{$grafico[1]}}</h3>
                </div>
                <div id="app">
                    {!! $grafico[0]->container() !!}
                </div>
                {!! $grafico[0]->script() !!}
                <br>
                <br>
                <br>
                <br>
            @endforeach
        </div>
    </section>
@endsection

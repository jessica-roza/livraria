@extends('layouts.base')
@section('style')
    <style>
        .carac {
            display: -moz-flex;
            display: -webkit-flex !important;
            display: -ms-flex;
            display: flex;
            -moz-align-items: center;
            -webkit-align-items: center;
            -ms-align-items: center;
            align-items: center;
        }

        .carac .cont {
            padding: 2em 3em 0.1em 3em;
        }

        .carac.left {
            -moz-flex-direction: row;
            -webkit-flex-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
        }

        .wrapper.style1 .carac {
            background-color: #fff;
        }

        .img {
            border-radius: 0;
            border: 0;
            display: inline-block;
            position: relative;
        }

        .carac .img img {
            max-width: 195.89px;
            max-height: 279.14px;
        }

        .img img {
            border-radius: 0;
            display: block;
        }

        img {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }

        .carac:last-child {
            margin-bottom: 2em;
        }
        .primeira{
            max-width: 195.89px;
            max-height: 279.14px;
            width: 100%;
        }
        .segunda{
            max-width: 195.89px;
            max-height: 279.14px;
            width: 100%;
        }
        .texto{
            text-shadow: -1px 0 rgba(46, 46, 46, 0.92),
                0 1px rgba(46, 46, 46, 0.92),
                1px 0 rgba(46, 46, 46, 0.92),
                0 -1px rgba(46, 46, 46, 0.92);
        }
    </style>
@endsection
@section('content')
    <section class="wrapper">
        <div class="inner">
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
            @if(request('query') != null)
                @include('Livro.search')
            @endif
            @include('Livro.carousel')
            <br><br>
        </div>
    </section>
    <section id="cta" class="wrapper">
        <div class="inner">
            <h4 class="texto">
                <i class="icon fa-quote-left"></i> O homem que não lê bons livros não tem nenhuma vantagem sobre o homem que não sabe ler.
            </h4>
        </div>
    </section>

    <section>
        <div class="inner">
            <section id="one" class="wrapper style1">
                <div class="inner">
                    <article class="carac left">
                        <span class="img primeira">
                            <img src="{{asset("storage/{$highLights[0]->Arquivo[0]->path}")}}"
                                 alt="{{$highLights[0]->titulo}}"/>
                        </span>
                        <div class="cont">
                            <h3><span>{{$highLights[0]->titulo}} </span></h3>
                            <p>{{$highLights[0]->descricao}}</p>
                            <ul class="actions">
                                <li>
                                    <a href="/livro/{{$highLights[0]->id}}" class="button alt">Detalhes</a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    
                </div>
            </section>
        </div>
    </section>
@endsection
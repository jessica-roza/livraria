<?php
/**
 * Created by PhpStorm.
 * User: jroza
 * Date: 19/10/2018
 * Time: 17:57
 */
?>
        <!DOCTYPE HTML>
<html>
@include('layouts.head')
@yield('style')

<body class="is-preload">

<!-- Header -->
@include('layouts.header')
@auth
    <!-- Nav -->
    <nav id="menu">
        <ul class="links">
            <li><a href="/">Home</a></li>
            @if(Auth::user()->tipo_usuario_id == 1)
                <li><a href="/admin">Area Administrativa</a></li>
            @endif
            <li><a href="/livro">Livros</a></li>
        </ul>
    </nav>

    <!-- Banner -->

    <section id="banner">
        <div class="inner">
            <h1>Constantinopla</h1>
            <p><span><i class="icon fa-quote-left"></i> Ler um livro é para o bom leitor conhecer a pessoa e o modo de pensar de alguém que lhe é estranho. <br>
            É procurar compreendê-lo e, sempre que possível, fazer dele um amigo. </span> <br>

                <span style="font-size: 0.7em;">Hermann Hesse</span>
            </p>
        </div>
    </section>
@endauth
@yield('content')
</body>
@include('layouts.footer')
</html>

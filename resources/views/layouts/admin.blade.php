<?php
/**
 * Created by PhpStorm.
 * User: Jessica
 * Date: 10/20/2018
 * Time: 8:45 PM
 */
?>
        <!DOCTYPE HTML>
<html>
@include('layouts.head')
<body class="is-preload">

<!-- Header -->
@include('layouts.header')

<!-- Nav -->
<nav id="menu">
    <ul class="links">
        <li><a href="/">Home</a></li>
        <li><a href="/admin">Administração</a></li>
        <li><a href="/livro/create">Cadastrar Livro</a></li>
        <li><a href="/livro">Buscar Livros</a></li>
        <li><a href="/autor">Autores</a></li>
        <li><a href="/categoria">Categorias</a></li>
        <li><a href="/editora">Editoras</a></li>
        <li><a href="/emprestimo">Emprestimos</a></li>
        <li><a href="/exemplar">Exemplares</a></li>
    </ul>
</nav>

<!-- Banner -->
<div id="heading">
    <h1>Area Administrativa</h1>
</div>

@yield('content')
</body>
@include('layouts.footer')
</html>
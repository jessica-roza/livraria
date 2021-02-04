<?php
/**
 * Created by PhpStorm.
 * User: Jessica
 * Date: 10/15/2018
 * Time: 4:23 PM
 */
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Biblioteca Virtual</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <link rel="stylesheet" href="assets/industrious/assets/css/main.css"/>
</head>
<body class="is-preload">

<!-- Header -->
<header id="header">
    <a class="logo" href="#">Nome Legal</a>
    <nav>
        <a href="#menu">Menu</a>
    </nav>
</header>

<!-- Nav -->
<nav id="menu">
    <ul class="links">
        <li><a href="#">Home</a></li>
        <li><a href="#">Elements</a></li>
        <li><a href="#">Generic</a></li>
    </ul>
</nav>
<div id="heading" >
    <h1>Generic Page</h1>
</div>
<section class="wrapper">
    <div class="inner">
        <a href="#" style="font-size: 23px;" class="icon fa-vcard-o"><span style="color: #555555;"> Cadastre-se</span></a>
        <form method="post" action="#">
            <div class="row gtr-uniform">
                <div class="col-7 col-12-xsmall">
                    <input type="text" name="nome" id="nome" value="" placeholder="Nome Completo"/>
                </div>
                <div class="col-7 col-12-xsmall">
                    <input type="email" name="email" id="email" value="" placeholder="Email"/>
                </div>
                <div class="col-7 col-12-xsmall">
                    <input type="password" name="password" id="password" value="" placeholder="Senha"/>
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


<?php
/**
 * Created by PhpStorm.
 * User: jroza
 * Date: 31/10/2018
 * Time: 19:31
 */
?>
<div class="highlights">
    @foreach($buscas as $busca)
        <section  style="max-width: 250px;">
            <div style="max-width: 200px;box-shadow: 0px 0px 4px 1px rgba(0, 0, 0, 0.095);">
                <a href="/livro/{{$busca->id}}" style="text-decoration: none;">
                    <img style="width: 100%;height: auto;max-height: 300px;vertical-align: top;"
                         src='{{asset("storage/{$busca->Arquivo[0]->path}")}}' alt="{{$busca->titulo}}"/>
                    <div class="content" style="max-height:100px;width: 100% !important; padding: 5% 1%;">
                        <h5>{{$busca->titulo}}<br>{{$busca->AutoresNomes()}}</h5>
                    </div>
                </a>
            </div>
        </section>
    @endforeach
</div>

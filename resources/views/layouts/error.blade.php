<?php
/**
 * Created by PhpStorm.
 * User: jroza
 * Date: 08/11/2018
 * Time: 18:11
 */
?>

@if(count($errors))
    <div class="alert alert-danger col-10">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

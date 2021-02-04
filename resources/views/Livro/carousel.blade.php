<?php
/**
 * Created by PhpStorm.
 * User: jroza
 * Date: 26/10/2018
 * Time: 19:14
 */
?>
<style>
    @media (min-width: 768px) {

        /* show 3 items */
        .carousel-inner .active,
        .carousel-inner .active + .carousel-item,
        .carousel-inner .active + .carousel-item + .carousel-item,
        .carousel-inner .active + .carousel-item + .carousel-item + .carousel-item {
            display: block;
        }

        .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
        .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item,
        .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item,
        .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item + .carousel-item {
            transition: none;
        }

        .carousel-inner .carousel-item-next,
        .carousel-inner .carousel-item-prev {
            position: relative;
            transform: translate3d(0, 0, 0);
        }

        .carousel-inner .active.carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
            position: absolute;
            top: 0;
            right: -25%;
            z-index: -1;
            display: block;
            visibility: visible;
        }

        /* left or forward direction */
        .active.carousel-item-left + .carousel-item-next.carousel-item-left,
        .carousel-item-next.carousel-item-left + .carousel-item,
        .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item,
        .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item,
        .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
            position: relative;
            transform: translate3d(-100%, 0, 0);
            visibility: visible;
        }

        /* farthest right hidden item must be abso position for animations */
        .carousel-inner .carousel-item-prev.carousel-item-right {
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            display: block;
            visibility: visible;
        }

        /* right or prev direction */
        .active.carousel-item-right + .carousel-item-prev.carousel-item-right,
        .carousel-item-prev.carousel-item-right + .carousel-item,
        .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item,
        .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item,
        .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
            position: relative;
            transform: translate3d(100%, 0, 0);
            visibility: visible;
            display: block;
            visibility: visible;
        }

    }

    /* Bootstrap Lightbox using Modal */

    #profile-grid {
        overflow: auto;
        white-space: normal;
    }

    #profile-grid .profile {
        padding-bottom: 40px;
    }

    #profile-grid .panel {
        padding: 0
    }

    #profile-grid .panel-body {
        padding: 15px
    }

    #profile-grid .profile-name {
        font-weight: bold;
    }

    #profile-grid .thumbnail {
        margin-bottom: 6px;
    }

    #profile-grid .panel-thumbnail {
        overflow: hidden;
    }

    #profile-grid .img-rounded {
        border-radius: 4px 4px 0 0;
    }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
@foreach($categorias as $categoria)
<div class="container-fluid" style="background-color: rgba(208, 201, 201, 0.25); padding: 2%; padding-right: 0%;">
    <div id="carouselExample{{$categoria->id}}" class="carousel slide" data-ride="carousel" data-interval="9000">
        <div class="carousel-inner row w-100 mx-auto" role="listbox">
            <div class="col-12 col-12-xsmall">
                <h3 style="float: left;">{{$categoria->nome}}</h3>
                <a href="/livro?categoria={{$categoria->id}}" class="button small"
                 style="float: right; margin-right: 2%;">Ver Mais</a>
             </div>
             <br><br>
             @php
             $cont = 0;
             @endphp
             @foreach(\App\Livro::whereHas('Categoria',function ($query) use ($categoria){
             $query->where('categoria_id',$categoria->id);
         })->get() as $livro)
         <div class="carousel-item col-md-4 {{$cont == 0 ? 'active' : ''}}">
            <div class="panel panel-default">
                <div class="panel-thumbnail">
                    <a href="/livro/{{$livro->id}}" target="_blank" title="{{$livro->titulo}}"
                     class="thumb">
                     <img class="img-fluid mx-auto d-block"
                     style="width: auto;height: auto;max-height: 300px;vertical-align:
                     top;box-shadow: 0px 0px 4px 1px rgba(0, 0, 0, 0.5);"
                     src="{{asset("storage/{$livro->Arquivo[0]->path}")}}" alt="{{$livro->titulo}}">
                 </a>
             </div>
         </div>
     </div>
     @php
     $cont++;
     @endphp
     @endforeach
     <a class="carousel-control-prev" href="#carouselExample{{$categoria->id}}" role="button"
         data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
     </a>
     <a class="carousel-control-next text-faded" href="#carouselExample{{$categoria->id}}" role="button"
         data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
     </a>
 </div>
</div>
</div>
<br><br>
@endforeach


<script>
    $(document).ready(function(){
        $('div[id^=carouselExample]').on('slide.bs.carousel', function (e) {


            var $e = $(e.relatedTarget);
            var idx = $e.index();
            var itemsPerSlide = 3;
            var totalItems = $('.carousel-item').length;

            if (idx >= totalItems - (itemsPerSlide - 1)) {
                var it = itemsPerSlide - (totalItems - idx);
                for (var i = 0; i < it; i++) {
                // append slides to end
                if (e.direction == "left") {
                    $('.carousel-item').eq(i).appendTo('.carousel-inner');
                }
                else {
                    $('.carousel-item').eq(0).appendTo('.carousel-inner');
                }
            }
        }
        });


        $('#carouselExample').carousel({
            interval: 2000
        });


        $(document).ready(function () {
            /* show lightbox when clicking a thumbnail */
            $('a.thumb').click(function (event) {
                event.preventDefault();
                var content = $('.modal-body');
                content.empty();
                var title = $(this).attr("title");
                $('.modal-title').html(title);
                content.html($(this).html());
                $(".modal-profile").modal({show: true});
            });

        });
    });
</script>
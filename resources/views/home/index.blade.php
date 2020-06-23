@extends('layouts.default')

@push('page-css')
 <style>
     .carousel {
         height: 315px !important;
     }

     .carousel-item {
         height: 315px !important;
     }
 </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div id="homeCarousel" class="carousel slide mb-2" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#homeCarousel" data-slide-to="1"></li>
                    <li data-target="#homeCarousel" data-slide-to="2"></li>
                    <li data-target="#homeCarousel" data-slide-to="3"></li>
                    <li data-target="#homeCarousel" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block m-auto" src="{{ url('img/banner/banner-1.jpeg') }}">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block m-auto" src="{{ url('img/banner/banner-2.jpeg') }}">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block m-auto" src="{{ url('img/banner/banner-3.jpeg') }}">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block m-auto" src="{{ url('img/banner/banner-4.jpeg') }}">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block m-auto" src="{{ url('img/banner/banner-5.jpeg') }}">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#homeCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#homeCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Próximo</span>
                </a>
            </div>
            <h3 class="text-primary">
                Alguns produtos que separamos pra você...
            </h3>
            <hr>
            <div class="row">
                @foreach($products as $product)
                    <x-products.card :product="$product"></x-products.card>
                @endforeach
            </div>
        </div>
    </div>
@endsection
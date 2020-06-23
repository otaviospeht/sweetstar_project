@extends('layouts.default')

@include('products.script')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="text-center">Filtros</h4>
                    <form id="filters_form">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <h6 style="margin-left: -12px;">Categorias</h6>
                                <div class="form-row align-items-center">
                                @foreach($categorias as $categoria)
                                    <div class="checkbox checkbox-primary form-check-inline p-0 m-0 col-12 col-md-6 col-lg-4">
                                        <input checked id="categoria_{{ $categoria['idCat'] }}" type="checkbox" name="idCat[]" class="input-filter categorias"
                                               value='{{ $categoria['idCat'] }}'>
                                        <label class="cursor-pointer text-uppercase" for="categoria_{{ $categoria['idCat'] }}">
                                            {{ $categoria['nome'] }}
                                        </label>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <h6 style="margin-left: -12px;">Marcas</h6>
                                <div class="form-row align-items-center">
                                @foreach($marcas as $marca)
                                    <div class="checkbox checkbox-primary form-check-inline p-0 m-0 col-12 col-md-6 col-lg-4">
                                        <input checked id="marca_{{ $marca['idMarca'] }}" type="checkbox" name="idMarca[]" class="input-filter marcas"
                                               value='{{ $marca['idMarca'] }}'>
                                        <label class="cursor-pointer text-uppercase" for="marca_{{ $marca['idMarca'] }}">
                                            {{ $marca['nome'] }}
                                        </label>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <h6 style="margin-left: -12px;">Tipos</h6>
                                <div class="form-row align-items-center">
                                    @foreach($tipos as $tipo)
                                        <div class="checkbox checkbox-primary form-check-inline p-0 m-0 col-12 col-md-6 col-lg-4">
                                            <input checked id="tipo_{{ $tipo['idTipo'] }}" type="checkbox" name="idTipo[]" class="input-filter tipos"
                                                   value='{{ $tipo['idTipo'] }}'>
                                            <label class="cursor-pointer text-uppercase" for="tipo_{{ $tipo['idTipo'] }}">
                                                {{ $tipo['nome'] }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4 offset-md-8 col-lg-2 offset-lg-10">
                                <button type="submit" class="btn btn-primary waves-effect waves-light w-100">Aplicar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row" id="products-container">
            @include('products.partials.products')
        </div>
    </div>
</div>
@endsection
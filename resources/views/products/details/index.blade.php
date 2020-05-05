@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <img src="{{ url('img/logo.png') }}" style="max-width: 100%;">
                </div>
                <div class="col-6">
                    <h4>Título de um produto fodaralho pra caralho</h4>
                    <form id="add_to_cart" method="POST">
                        <div class="row pt-2">
                            <div class="col-12">
                                <label for="qntd_product">Quantidade</label>
                                <input type="number" id="qntd_product" name="qntd_product" class="form-control" min="0" value="1" aria-describedby="qntdHelper" style="max-width: 100px">
                                <small id="qntdHelper" class="form-text text-muted">
                                    540 em estoque
                                </small>
                            </div>
                        </div>
                        <div class="row position-absolute" style="bottom: 0; width: 100%">
                            <div class="col-12">
                                <button class="btn btn-success w-100 d-flex align-items-center justify-content-center">
                                    <i class="mdi mdi-plus-box"></i> Adicionar ao carrinho
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <h5>Detalhes</h5>
                    <small>Imagina aqui uma descrição muito daora, porque eu tô sem criatividade, é isso rapazeada.</small>
                </div>
            </div>
        </div>
    </div>
@endsection
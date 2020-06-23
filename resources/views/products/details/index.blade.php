@extends('layouts.default')

@include('products.details.script')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-center mb-2">{{ $product['nome'] }}</h4>
                    <hr>
                </div>
                <div class="col-12 col-md-6">
                    <img src="{{ url('img/products') . "/{$product['img']}" }}" style="max-width: 100%;">
                </div>
                <div class="col-12 col-md-6">
                    <form id="add_to_cart" method="POST">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group text-center">
                                    <label for="qntd_product">Quantidade</label>
                                    <input type="number" id="qntd_product" name="qntd_product" class="form-control" min="0" value="1" aria-describedby="qntdHelper" style="max-width: 100px">
                                </div>
                            </div>
                        </div>
                        <div class="row position-absolute" style="bottom: 0; width: 100%">
                            <div class="col-12">
                                <a href="/carrinho/add?codProd={{ $product['codProd'] }}" class="btn btn-outline-success w-100 font-weight-bold text-uppercase d-flex align-items-center justify-content-center">
                                    <i class="mdi mdi-cart" style="font-size: 1.5rem"></i> Adicionar ao carrinho
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#details" data-toggle="tab" aria-expanded="false" class="nav-link active show">
                                Detalhes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#specs" data-toggle="tab" aria-expanded="true" class="nav-link">
                                Especificações
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="details">
                            {{ $product['descricao'] }}
                        </div>
                        <div class="tab-pane fade" id="specs">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <table class="table-sm w-100">
                                        <tbody>
                                            <tr>
                                                <th>Fornecedor:</th>
                                                <td class="text-right">{{ $product['codFornNavigation']['razaoSoc'] }}</td>
                                            </tr>
                                            <tr>
                                                <th>Categoria:</th>
                                                <td class="text-right">{{ $product['idCatNavigation']['nome'] }}</td>
                                            </tr>
                                            <tr>
                                                <th>Marca:</th>
                                                <td class="text-right">{{ $product['idMarcaNavigation']['nome'] }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tipo:</th>
                                                <td class="text-right">{{ $product['idTipoNavigation']['nome'] }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
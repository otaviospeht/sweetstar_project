@extends('layouts.default')

@include('carrinho.script')
@include('carrinho.style')

@section('content')
    <div class="row">
        <div class="col-12 col-xl-8">
            <div class="card-box">
                <div class="d-flex align-items-center justify-content-between">
                    <span class="h6">Carrinho de compras</span>
                    <span class="h6 cart-itens">{{ count($products) }} produto(s)</span>
                </div>
                <hr>
                <table class="table-sm w-100">
                    <thead>
                        <tr>
                            <th>Detalhes do produto</th>
                            <th class="text-center">Quantidade</th>
                            <th class="text-center">Preço</th>
                            <th class="text-center">Total</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ url('img/products/') . "/{$product['img']}"}}" class="product-image">
                                        <div class="ml-2 text-left font-13">
                                            <span class="font-weight-bold">
                                                {{ $product['nome'] }}
                                            </span>
                                            <br>
                                            <span>
                                                {{ $product['idCatNavigation']['nome'] }}
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center m-auto" style="width: 200px">
                                        <input data-id="{{ $product['codProd'] }}" type="number" name="quantidade" value="{{ $product['quantidade'] }}" />
                                    </div>
                                </td>
                                <td class="text-center">
                                    R$ <span class="item-valorUnit" data-mask="#.##0,00" data-mask-reverse="true">{{ $product['valorUnit'] }}</span>
                                </td>
                                <td class="text-center">
                                    R$ <span class="item-subtotal" data-mask="#.##0,00" data-mask-reverse="true">{{ $product['subtotal'] }}</span>
                                </td>
                                <td class="text-center">
                                    <a href="/carrinho/{{ $product['codProd'] }}" class="btn btn-icon btn-outline-danger btn-sm btn-delete waves-effect waves-light"><i class="mdi mdi-delete-forever"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card-box bg-light">
                <div class="d-flex align-items-center justify-content-between">
                    <span class="h6">Resumo do pedido</span>
                </div>
                <hr>
                <table class="table-sm w-100">
                    <tbody>
                        <tr>
                            <th>Subtotal:</th>
                            <td class="text-right">R$ <span class="cart-subtotal" data-mask="#.##0,00" data-mask-reverse="true">{{ $subtotal }}</span></td>
                        </tr>
                        <tr>
                            <th>Frete:</th>
                            <td class="text-right">R$ <span class="cart-frete" data-mask="#.##0,00" data-mask-reverse="true">{{ $frete }}</span></td>
                        </tr>
                        <tr class="border-top pt-2">
                            <th>Valor total:</th>
                            <td class="text-right">R$ <span class="cart-total" data-mask="#.##0,00" data-mask-reverse="true">{{ $total }}</span></td>
                        </tr>
                    </tbody>
                </table>
                @if(count($products) > 0)
                    <a href="{{ route('checkout') }}" class="btn btn-outline-success btn-finalizar-compra w-100 mt-2 text-uppercase waves-effect waves-light"><i class="mdi mdi-cart"></i> FINALIZAR COMPRA</a>
                @endif
            </div>
        </div>
    </div>
@endsection
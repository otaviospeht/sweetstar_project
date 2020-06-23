@extends('layouts.default')

@include('carrinho.checkout.script')

@section('content')
    <div class="row">
        <div class="col-12">
            <span class="h5">
                Confirme suas informações
            </span>
            <hr>
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <span class="h6">
                                    <i class="mdi mdi-map-marker"></i> Endereço
                                </span>
                                <a data-toggle="modal" data-target="#address-modal" class="float-right text-primary" title="Editar endereço" style="cursor: pointer">
                                    <i class="mdi mdi-pencil"></i>
                                </a>
                                <hr>
                                <div>
                                    <table class="w-100 table-sm">
                                        <tbody>
                                        <tr>
                                            <th>CEP:</th>
                                            <td class="text-right"><span data-name="CEP" data-mask="00000-000">{{ Auth::user()->CEP }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>Rua:</th>
                                            <td class="text-right"><span data-name="Rua">{{ Auth::user()->Rua }}</span>, <span data-name="Numero">{{ Auth::user()->Numero }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>Bairro:</th>
                                            <td class="text-right"><span data-name="Bairro">{{ Auth::user()->Bairro }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>Cidade:</th>
                                            <td class="text-right"><span data-name="Cidade">{{ Auth::user()->Cidade }}</span> - <span data-name="UF">{{ Auth::user()->UF }}</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <span class="h6">
                                    <i class="mdi mdi-cash"></i> Forma de pagamento
                                </span>
                                <hr>
                                <ul class="nav nav-tabs tabs-bordered nav-justified">
                                    <li class="nav-item">
                                        <a href="#boleto" data-toggle="tab" aria-expanded="false" class="nav-link active show">
                                            BOLETO
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#cartao" data-toggle="tab" aria-expanded="true" class="nav-link">
                                            CARTÃO
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="payment tab-pane active show" id="boleto">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a href="{{ route('checkout.boleto') }}" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-download"></i> BAIXAR BOLETO</a>
                                        </div>
                                    </div>
                                    <div class="payment tab-pane" id="cartao">
                                        <form id="payment_form">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="card">Selecione o cartão</label>
                                                    <select name="card" class="form-control">
                                                        @foreach(Auth::user()->cards as $card)
                                                            <option value="{{ $card->ID_Cartao }}">
                                                                XXXX-XXXX-XXXX-{{ substr($card->Num_Cartao, -4) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-12 col-xl-4">
                                                    <label for="parcelas">Parcelas</label>
                                                    <select name="parcelas" class="form-control">
                                                        @for($i = 1; $i <= 12; $i++)
                                                            <option value="{{ $i }}">{{ $i }}x sem júros</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-12 col-xl-4">
                                                    <label for="cvv">CVV</label>
                                                    <input name="cvv" type="text" data-mask="000" class="form-control" />
                                                </div>
                                            </div>
                                        </form>
                                        <button type="button" class="btn btn-success btn-sm w-100 waves-effect waves-light mt-3"
                                                data-toggle="modal" data-target="#card-modal">
                                            <i class="mdi mdi-credit-card-plus"></i> ADICIONAR CARTÃO
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="card-box">
                        <span class="h6">
                            <i class="mdi mdi-shopping"></i> Resumo do pedido
                        </span>
                        <hr>
                        <table class="w-100 table-sm">
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <th>
                                        {{ strtoupper($product['nome']) }}
                                    </th>
                                    <td class="text-right">
                                        {{ $product['quantidade'] }} unids - R$ <span data-mask="#.##0,00" data-mask-reverse="true">{{ $product['subtotal'] }}</span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <table class="w-100 table-sm">
                            <tbody>
                            <tr>
                                <th>Frete:</th>
                                <td class="text-right">R$ <span data-mask="#.##0,00" data-mask-reverse="true">{{ $frete }}</span></td>
                            </tr>
                            <tr>
                                <th>Valor total:</th>
                                <td class="text-right">R$ <span data-mask="#.##0,00" data-mask-reverse="true">{{ $total }}</span></td>
                            </tr>
                            </tbody>
                        </table>
                        <button type="button" id="finish_button" class="btn btn-outline-success btn-block waves-effect waves-light mt-3">
                            <i class="mdi mdi-cash"></i> CONFIRMAR PEDIDO
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Modal de edição de endereço--}}

    <div id="address-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">
                        <i class="mdi mdi-pencil"></i> Editar endereço
                    </h4>
                </div>
                <div class="modal-body">
                    <form id="new_address" action="{{ route('profile.address.update') }}">
                        <div class="form-row">
                            <div class="col-12 col-lg-4 mb-2">
                                <label for="CEP">CEP</label>
                                <input id="Cep" name="CEP" type="text" class="form-control" data-mask="00000-000" placeholder="12345-678" required>
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <label for="Rua">Rua</label>
                                <input id="Rua" name="Rua" type="text" class="form-control" required>
                            </div>
                            <div class="col-12 col-lg-2 mb-2">
                                <label for="Numero">Número</label>
                                <input id="Numero" name="Numero" type="text" data-mask="00000" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-lg-4 mb-2">
                                <label for="Bairro">Bairro</label>
                                <input id="Bairro" name="Bairro" type="text" class="form-control" required>
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <label for="Cidade">Cidade</label>
                                <input id="Cidade" name="Cidade" type="text" class="form-control" required>
                            </div>
                            <div class="col-12 col-lg-2 mb-2">
                                <label for="UF">Estado</label>
                                <input id="Uf" name="UF" type="text" class="form-control" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">
                                    <i class="mdi mdi-content-save"></i> CONFIRMAR
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    {{--Modal de cadastro de cartão--}}

    <div id="card-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">
                        <i class="mdi mdi-credit-card-plus"></i> Cadastrar cartão
                    </h4>
                </div>
                <div class="modal-body">
                    <form id="new_card">
                        <input type="hidden" name="Cod_Cli" value="{{ Auth::user()->Cod_Cli }}" />
                        <div class="row">
                            <div class="col-12">
                                <label for="Num_Cartao">Número do cartão</label>
                                <input name="Num_Cartao" type="text" class="form-control" data-mask="0000-0000-0000-0000" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="Nome_Cartao">Nome impresso no cartão</label>
                                <input name="Nome_Cartao" type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="Data_Val">Data de validade</label>
                                <input name="Data_Val" type="text" class="form-control" />
                            </div>
                            <div class="col-6">
                                <label for="cvv">CVV</label>
                                <input name="cvv" type="text" data-mask="000" class="form-control" />
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">
                                    <i class="mdi mdi-content-save"></i> CONFIRMAR
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection
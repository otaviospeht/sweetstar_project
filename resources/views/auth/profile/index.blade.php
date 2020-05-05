@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <img src="{{ url('img/logo.png') }}" class="img-thumbnail">
                </div>
                <div class="col-9">
                    <div class="personal_info">
                        <h5>{{ $user->nome }}</h5>
                        <small><i>{{ $user->email }}</i></small> <br>
                        <small><i>{{ $user->cpf }} - {{ $user->data_nasc }}</i></small> <br>
                        <small><i>{{ $user->rua }} {{ $user->numero }}, {{ $user->bairro }}, {{ $user->cidade }} - {{ $user->estado }}</i></small>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-3">
                    <button id="my_orders" class="btn btn-primary d-flex align-items-center justify-content-center w-100 mb-2" type="button">
                        <i class="mdi mdi-view-list" style="font-size: 1.2em" title="Meus pedidos"></i> Meus pedidos
                    </button>
                    <button id="edit_button" class="btn btn-primary d-flex align-items-center justify-content-center w-100" type="button">
                        <i class="mdi mdi-account-edit" style="font-size: 1.2em" title="Editar perfil"></i> Editar perfil
                    </button>
                </div>
                <div class="col-9">
                    <div class="card">
                        <div class="card-header">
                            <h5>Meus pedidos</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">nº</th>
                                        <th class="text-center">Data</th>
                                        <th class="text-center">Valor total</th>
                                        <th style="width: 40px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-warning font-weight-bold text-center">350</td>
                                        <td class="text-center">04/05/2020 <sup>21:11</sup></td>
                                        <td class="text-center">R$ 630,55</td>
                                        <td class="text-center">
                                            <button class="btn btn-link btn-sm" title="Mais informações"><i class=" mdi mdi-information-outline"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-warning font-weight-bold text-center">350</td>
                                        <td class="text-center">04/05/2020 <sup>21:15</sup></td>
                                        <td class="text-center">R$ 52,11</td>
                                        <td class="text-center">
                                            <button class="btn btn-link btn-sm" title="Mais informações"><i class=" mdi mdi-information-outline"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-warning font-weight-bold text-center">350</td>
                                        <td class="text-center">04/05/2020 <sup>21:22</sup></td>
                                        <td class="text-center">R$ 221,99</td>
                                        <td class="text-center">
                                            <button class="btn btn-link btn-sm" title="Mais informações"><i class=" mdi mdi-information-outline"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
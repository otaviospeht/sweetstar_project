@extends('layouts.default')

@include('auth.profile.script')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center">
                        <div class="d-inline-block mx-4">
                            <i class="mdi mdi-account-circle" style="font-size: 4.5em;"></i>
                        </div>
                        <div class="personal_info d-inline-block">
                            <h5>{{ Auth::user()->Nome_Comp }}</h5>
                            <small><i>{{ Auth::user()->Email }}</i></small> <br>
                            <small><i><span data-mask="000.000.000-00">{{ Auth::user()->CPF }}</span> - <span class="date">{{ Auth::user()->Data_Nasc }}</span></i></small> <br>
                            <small><i>{{ Auth::user()->Rua }} {{ Auth::user()->Numero }}, {{ Auth::user()->Bairro }}, {{ Auth::user()->Cidade }} - {{ Auth::user()->UF }}</i></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tabs-vertical-env mt-4">
                <ul class="nav tabs-vertical">
                    <li class="nav-item">
                        <a href="#pedidos" class="nav-link active show" data-toggle="tab" aria-expanded="false">Meus pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a href="#perfil" class="nav-link" data-toggle="tab" aria-expanded="true">Editar perfil</a>
                    </li>
                </ul>

                <div class="tab-content w-100">
                    <div class="tab-pane active" id="pedidos">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">nº</th>
                                <th class="text-center">Data</th>
                                <th class="text-center">Valor total</th>
                                <th class="text-center">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pedidos as $pedido)
                                <tr>
                                    <td class="text-warning font-weight-bold text-center">{{ $pedido->Num_Ped }}</td>
                                    <td class="text-center"><span class="date">{{ $pedido->Data_Ped }}</span></td>
                                    <td class="text-center">R$ <span data-mask="#.##0,00" data-mask-reverse="true">{{ $pedido->Valor_Tot }}</span></td>
                                    <td class="text-center">{{ $pedido->ID_Status == 3 ? 'Pendente' : 'Concluído' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="perfil">
                        <form id="edit_user_form" method="POST">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <p class="h5">Dados de acesso</p>
                                    <div class="d-none d-lg-block divisor-right"></div>
                                </div>
                                <div class="col-12 col-lg-8">
                                    <div class="form-row">
                                        <div class="col-12 mb-2">
                                            <label for="Email">E-mail</label>
                                            <input id="Email" name="Email" type="Email" class="form-control" placeholder="example@email.com" value="{{ Auth::user()->Email }}" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12 col-lg-6 mb-2">
                                            <label for="Senha">Senha</label>
                                            <input id="Senha" name="Senha" type="password" class="form-control" required>
                                        </div>
                                        <div class="col-12 col-lg-6 mb-2">
                                            <label for="confirm_password">Confirme sua senha</label>
                                            <input id="confirm_password" name="password" type="password" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <p class="h5">Dados pessoais</p>
                                    <div class="d-none d-lg-block divisor-right"></div>
                                </div>
                                <div class="col-12 col-lg-8">
                                    <div class="form-row">
                                        <div class="col-12 mb-2">
                                            <label for="Nome_Comp">Nome completo</label>
                                            <input id="NomeComp" name="Nome_Comp" type="text" class="form-control" placeholder="Exemplo da Silva" value="{{ Auth::user()->Nome_Comp }}" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12 col-lg-4 mb-2">
                                            <label for="CPF">CPF</label>
                                            <input id="Cpf" name="CPF" type="text" class="form-control" data-mask="000.000.000-00" placeholder="123.456.789-10" value="{{ Auth::user()->CPF }}" required>
                                        </div>
                                        <div class="col-12 col-lg-4 mb-2">
                                            <label for="Data_Nasc">Data de nascimento</label>
                                            <input id="DataNasc" name="Data_Nasc" type="text" class="form-control">
                                        </div>
                                        <div class="col-12 col-lg-4 mb-2">
                                            <label for="Contato_Tel">Celular</label>
                                            <input id="ContatoTel" name="Contato_Tel" type="text" data-mask="(00) 00000-0000" placeholder="(00) 00000-0000" value="{{ Auth::user()->Contato_Tel }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <p class="h5">Endereço</p>
                                    <div class="d-none d-lg-block divisor-right"></div>
                                </div>
                                <div class="col-12 col-lg-8">
                                    <div class="form-row">
                                        <div class="col-12 col-lg-4 mb-2">
                                            <label for="CEP">CEP</label>
                                            <input id="Cep" name="CEP" type="text" class="form-control" data-mask="00000-000" placeholder="12345-678" value="{{ Auth::user()->CEP }}" required>
                                        </div>
                                        <div class="col-12 col-lg-6 mb-2">
                                            <label for="Rua">Rua</label>
                                            <input id="Rua" name="Rua" type="text" class="form-control" value="{{ Auth::user()->Rua }}" required>
                                        </div>
                                        <div class="col-12 col-lg-2 mb-2">
                                            <label for="Numero">Número</label>
                                            <input id="Numero" name="Numero" type="text" data-mask="00000" class="form-control"value="{{ Auth::user()->Numero }}" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12 col-lg-4 mb-2">
                                            <label for="Bairro">Bairro</label>
                                            <input id="Bairro" name="Bairro" type="text" class="form-control"value="{{ Auth::user()->Bairro }}" required>
                                        </div>
                                        <div class="col-12 col-lg-6 mb-2">
                                            <label for="Cidade">Cidade</label>
                                            <input id="Cidade" name="Cidade" type="text" class="form-control"value="{{ Auth::user()->Cidade }}" required>
                                        </div>
                                        <div class="col-12 col-lg-2 mb-2">
                                            <label for="UF">Estado</label>
                                            <input id="Uf" name="UF" type="text" class="form-control"value="{{ Auth::user()->UF }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="col-12 col-lg-4 offset-lg-8">
                                    <button type="submit" class="btn btn-primary w-100">SALVAR ALTERAÇÕES</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
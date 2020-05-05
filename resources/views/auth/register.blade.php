@extends('layouts.default')

@push('page-js')
<script>
    $('#birthdate').daterangepicker({
        singleDatePicker: true,
        startDate: moment().startOf('month').format('DD/MM/YYYY'),
        maxDate: moment()
    });
</script>
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <span style="font-size: 1.2rem">
                <i class="mdi mdi-account-plus"></i> Cadastro
            </span>
        </div>
        <div class="card-body">
            <form id="create_user_form" method="POST">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <p class="h5">Dados de acesso</p>
                        <div class="d-none d-lg-block divisor-right"></div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="form-row">
                            <div class="col-12 mb-2">
                                <label for="email">E-mail</label>
                                <input id="email" name="email" type="email" class="form-control" placeholder="example@email.com" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-lg-6 mb-2">
                                <label for="password">Senha</label>
                                <input id="password" name="password" type="password" class="form-control" required>
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
                                <label for="">Nome completo</label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="Exemplo da Silva" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-lg-4 mb-2">
                                <label for="cpf">CPF</label>
                                <input id="cpf" name="cpf" type="text" class="form-control" data-mask="000.000.000-00" placeholder="123.456.789-10" required>
                            </div>
                            <div class="col-12 col-lg-4 mb-2">
                                <label for="birthdate">Data de nascimento</label>
                                <input id="birthdate" name="birthdate" type="text" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4 mb-2">
                                <label for="phone_number">Celular</label>
                                <input id="phone_number" name="phone_number" type="text" data-mask="(00) 00000-0000" placeholder="(00) 00000-0000" class="form-control">
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
                                <label for="cep">CEP</label>
                                <input id="cep" name="cep" type="text" class="form-control" data-mask="00000-000" placeholder="12345-678" required>
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <label for="rua">Rua</label>
                                <input id="rua" name="street_name" type="text" class="form-control">
                            </div>
                            <div class="col-12 col-lg-2 mb-2">
                                <label for="numero">Número</label>
                                <input id="numero" name="number" type="text" data-mask="00000" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-lg-4 mb-2">
                                <label for="bairro">Bairro</label>
                                <input id="bairro" name="bairro" type="text" class="form-control">
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <label for="cidade">Cidade</label>
                                <input id="cidade" name="cidade" type="text" class="form-control">
                            </div>
                            <div class="col-12 col-lg-2 mb-2">
                                <label for="uf">Estado</label>
                                <input id="uf" name="uf" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="col-12 col-lg-4 offset-lg-8">
                        <button type="submit" class="btn btn-primary w-100">CADASTRAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
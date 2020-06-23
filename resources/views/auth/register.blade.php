@extends('layouts.default')

@push('page-js')
<script>
    $('#DataNasc').daterangepicker({
        singleDatePicker: true,
        startDate: moment().startOf('month').format('DD/MM/YYYY'),
        maxDate: moment()
    });

    $(`form`).on('submit', function(e) {
        e.preventDefault();

        let _form = $(this);

        $.ajax({
            url: '{{ route('auth.store') }}',
            method: 'POST',
            data: _form.serialize(),
            success() {
                $.Notification.notify('success', 'top right', 'Sucesso!', 'Sua conta foi cadastrada.');
                _form[0].reset();

                setTimeout(() => {
                    window.location.replace('{{ route('home') }}')
                }, 1500);
            },
            error() {
                $.Notification.notify('error', 'top right', 'Ocorreu um erro ao cadastrar seu usuário.');
            }
        })
    });

    $(document).ready(function() {
        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#Rua").val("");
            $("#Bairro").val("");
            $("#Cidade").val("");
            $("#Uf").val("");
        }

        //Quando o campo cep perde o foco.
        $("#Cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#Rua").val("...");
                    $("#Bairro").val("...");
                    $("#Cidade").val("...");
                    $("#Uf").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#Rua").val(dados.logradouro);
                            $("#Bairro").val(dados.bairro);
                            $("#Cidade").val(dados.localidade);
                            $("#Uf").val(dados.uf);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
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
                                <label for="Email">E-mail</label>
                                <input id="Email" name="Email" type="Email" class="form-control" placeholder="example@email.com" required>
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
                                <label for="NomeComp">Nome completo</label>
                                <input id="NomeComp" name="NomeComp" type="text" class="form-control" placeholder="Exemplo da Silva" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-lg-4 mb-2">
                                <label for="Cpf">CPF</label>
                                <input id="Cpf" name="Cpf" type="text" class="form-control" data-mask="000.000.000-00" placeholder="123.456.789-10" required>
                            </div>
                            <div class="col-12 col-lg-4 mb-2">
                                <label for="DataNasc">Data de nascimento</label>
                                <input id="DataNasc" name="DataNasc" type="text" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4 mb-2">
                                <label for="ContatoTel">Celular</label>
                                <input id="ContatoTel" name="ContatoTel" type="text" data-mask="(00) 00000-0000" placeholder="(00) 00000-0000" class="form-control">
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
                                <label for="Cep">CEP</label>
                                <input id="Cep" name="Cep" type="text" class="form-control" data-mask="00000-000" placeholder="12345-678" required>
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
                                <label for="Uf">Estado</label>
                                <input id="Uf" name="Uf" type="text" class="form-control" required>
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
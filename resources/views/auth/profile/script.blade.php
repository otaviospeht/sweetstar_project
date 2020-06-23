@push('page-js')
    <script>
        $(() => {
            $(`span.date`).html((ind, val) => {
                return moment(val).format('DD/MM/YYYY');
            });

            $('#DataNasc').daterangepicker({
                singleDatePicker: true,
                startDate: moment("{{ Auth::user()->Data_Nasc }}").format('DD/MM/YYYY'),
                maxDate: moment()
            });

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

        $(`#edit_user_form`).on('submit', function(e) {
            e.preventDefault();

            let _form = $(this);

            $.ajax({
                url: "{{ route('profile.address.update') }}",
                method: 'PUT',
                data: _form.serialize(),
                success(res) {
                    $.Notification.notify('success', 'top right', 'Sucesso!', 'Informações atualizadas.');
                },
                error(res) {
                    console.log(res);
                }
            })
        });
    </script>
@endpush
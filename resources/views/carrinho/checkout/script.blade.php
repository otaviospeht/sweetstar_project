@push('page-js')
    <script>
        $(() => {
            let payment_option = 'boleto';

            $('input[name="Data_Val"]').daterangepicker({
                singleDatePicker: true,
                startDate: moment(),
                maxDate: moment('2030-12-01', 'YYYY-MM-DD'),
                locale: {
                    format: 'MM/YYYY'
                }
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

            $(`#new_address`).on('submit', (e) => {
                e.preventDefault();

                let _form = $(`#new_address`);

                $.ajax({
                    url: _form.attr('action'),
                    method: 'PUT',
                    data: _form.serialize(),
                    success(res) {
                        $.Notification.notify('success', 'top right', 'Sucesso!', res.message);

                        for(const [key, value] of Object.entries(res.user)) {
                            $(`span[data-name="${key}"]`).text(value);
                        }

                        _form[0].reset();
                        $(`#address-modal`).modal('hide');
                    },
                    error(res) {
                        console.log(res);
                    }
                })
            });

            $(`a[data-toggle="tab"]`).on('click', function(e) {
                payment_option = $(this).attr('href');
            });

            $(`#new_card`).on('submit', function(e) {
                e.preventDefault();

                let _form = $(this);

                $.ajax({
                    url: "{{ route('profile.card.store') }}",
                    method: 'POST',
                    data: _form.serialize(),
                    success(res) {
                        $.Notification.notify('success', 'top right', 'Sucesso!', 'Cartão cadastrado.');

                        $(`select[name="card"]`).append(`
                            <option value="${res.card.ID_Cartao}">XXXX-XXXX-XXXX-${res.card.Num_Cartao.substr(res.card.Num_Cartao.length - 4)}</option>
                        `);
                        _form[0].reset();
                        $(`#card-modal`).modal('hide');
                    },
                    error(res) {
                        console.log(res);
                    }
                })
            });

            $(`#finish_button`).on('click', () => {
                let payment = 1
                    ,parcelas = 1;

                if (payment_option === '#cartao') {
                    payment = 2;
                    parcelas = $(`select[name="parcelas"]`).val();

                    if ($(`input[name="cvv"]`).val().length !== 3) {
                        $.Notification.notify('error', 'top right', 'Dados inválidos.', 'CVV incorreto.')

                        return false;
                    }
                }

                $.ajax({
                    url: "{{ route('checkout.store') }}",
                    method: 'POST',
                    data: `payment=${payment}&parcelas=${parcelas}`,
                    success(res) {
                        $.Notification.notify('success', 'top right', 'Sucesso!', 'Compra realizada.')

                        setTimeout(() => {
                            window.location.replace("{{ route('profile') }}");
                        }, 1500)
                    },
                    error(res) {
                        console.log(res);
                    }
                })
            });
        })
    </script>
@endpush
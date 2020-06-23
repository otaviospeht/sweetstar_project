@push('page-js')
    <script>
        const page = {
            updateCart() {
                let _cartSubtotal = $(`.cart-subtotal`)
                    ,cartSubtotal = 0
                    ,cartItens = 0
                    ,cartFrete = parseFloat($(`.cart-frete`).text().replace(',', '.'))
                    ,_cartTotal = $(`.cart-total`)
                    ,_buttonFinalizar = $(`.btn-finalizar-compra`);

                $.each($(`.item-subtotal`), (ind, val) => {
                    cartSubtotal += parseFloat($(val).text().replace(',', '.'));
                    cartItens++;
                });

                _cartSubtotal.text(cartSubtotal.toFixed(2).replace('.', ','));
                _cartTotal.text(parseFloat(cartSubtotal + cartFrete).toFixed(2).replace('.', ','));
                $(`.cart-itens`).text(`${cartItens} produto(s)`);

                if(cartItens === 0) {
                    _buttonFinalizar.attr('disabled', true);
                } else {
                    _buttonFinalizar.attr('disabled', false);
                }
            },
            updateQuantidade(id, qntd) {
                $.ajax({
                    url: `/carrinho/${id}`,
                    method: 'PATCH',
                    data: {quantidade: qntd},
                    beforeSend() {},
                    complete() {},
                });

                page.updateCart();
            }
        };

        $(() => {
            let _qntds = $("input[type='number']");

            _qntds.inputSpinner();

            _qntds.on('change', (e) => {
                let _tr = $(e.target).parent().parent().parent()
                    ,_itemSubtotal = _tr.find('.item-subtotal')
                    ,_valorUnit = _tr.find('.item-valorUnit').text().replace(',', '.')
                    ,_qntd = $(e.target).val()
                    ,newItemSubtotal = parseFloat(+_valorUnit * +_qntd).toFixed(2);

                _itemSubtotal.text(newItemSubtotal.toString().replace('.', ','));

                page.updateQuantidade($(e.target).data('id'), _qntd);
            });

            $(`.btn-delete`).on('click', function(e) {
                e.preventDefault();

                let _url = $(this).attr('href')
                    ,tr = $(this).parent().parent();

                $.ajax({
                    url: _url,
                    method: 'DELETE',
                    success(res) {
                        $.Notification.notify('success', 'top right', 'Ação realizada!', res);

                        tr.remove();
                        page.updateCart();
                    },
                    error() {
                        $.Notification.notify('error', 'top right', 'Ocorreu um erro inesperado!');
                    }
                })
            })
        });
    </script>
@endpush
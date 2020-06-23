@push('page-js')
    <script>
        $('#DataVali').daterangepicker({
            singleDatePicker: true,
            startDate: moment().format('DD/MM/YYYY'),
            minDate: moment()
        });

        $(`#create_product_form`).submit((e) => {
            e.preventDefault();

            let _form = new FormData($(e.target)[0]);

            $.ajax({
                url: document.URL,
                method: 'POST',
                data: _form,
                processData: false,
                contentType: false,
                success(res) {
                    $.Notification.notify('success', 'top right', 'Operação Realizada', 'Produto cadastrado.');
                    setTimeout(() => {
                        window.location.replace('{{ route('admin.products.index') }}');
                    }, 2000);
                },
                error(res) {
                    console.log(res);
                }
            })
        })
    </script>
@endpush
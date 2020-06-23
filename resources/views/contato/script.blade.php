@push('page-js')
    <script>
        $(`#contact_form`).on('submit', (e) => {
            e.preventDefault();

            let _form = $(e.target);

            $.ajax({
                url: document.URL,
                method: 'POST',
                data: _form.serialize(),
                success() {
                    _form[0].reset();

                    $.Notification.notify('success', 'top right', 'Sucesso!', 'Sua mensagem foi recebida!');
                },
                error() {

                }
            });
        });
    </script>
@endpush
@push('page-js')
    <script>
        $(`#filters_form`).on('submit', (e) => {
            e.preventDefault();

            $.ajax({
                url: '{{ route('products.data') }}',
                method: 'POST',
                data: $(e.target).serialize(),
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                success(res) {
                    $(`#products-container`).html(res.view);
                },
                error(res) {
                    console.log(res);
                }
            })
        });
    </script>
@endpush
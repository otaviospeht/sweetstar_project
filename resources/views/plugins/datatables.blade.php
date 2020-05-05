@push('page-css')
    <link href="{{ url('css/datatables.min.css') }}" rel="stylesheet">
@endpush

@push('page-js')
    <script src="{{ url('js/pdfmake.min.js') }}"></script>
    <script src="{{ url('js/vfs_fonts.js') }}"></script>
    <script src="{{ url('js/datatables.min.js') }}"></script>
    <script>
        $.extend(true, $.fn.dataTable.defaults, {
            language: {
                "url": "/plugins/datatables/i18n/Portuguese-Brasil.json"
            }
        });
    </script>
@endpush
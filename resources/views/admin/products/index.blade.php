@extends('layouts.default')

@include('plugins.datatables')

@push('page-css')

@endpush

@push('page-js')
    <script>
        const page = {
            table: null
        };

        $(() => {
            loading();

            page.table = $('#datatable-products').DataTable({
                ajax: '{{ route('admin.products.all') }}',
                dom: `<'row'<'col-12'f>>
                      <'row'<'col-sm-12'tr>>
                      <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>`,
                columns: [
                    {data: 'nome'},
                    {data: 'valorUnit', render: function(data, type, row) {
                            return `R$ <span class="money_mask">${data}</span>`
                        }
                    },
                    {data: 'qntEstqProd'},
                ],
                initComplete: function (settings, json) {
                    hideLoading();

                    $('.money_mask:not(th)').mask("#.##0,00", {reverse: true});
                }
            });
        })
    </script>
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="m-b-30">
                            <a href="{{ route('admin.products.create') }}" target="_blank" class="btn btn-sm btn-primary waves-effect waves-light">
                                Cadastrar <i class="mdi mdi-plus-circle-outline"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped w-100" id="datatable-products">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Valor unitário</th>
                                <th>Em estoque</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
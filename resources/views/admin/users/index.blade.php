@extends('layouts.default')

@include('plugins.datatables')

@push('page-css')

@endpush

@push('page-js')
    <script>
        $(document).ready(function () {
            $('#users_table').DataTable({
                scrollX: true
            });
        });
    </script>
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="users_table" class="table table-hover table-bordered w-100">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>CPF</th>
                        <th>Criado em</th>
                        <th data-orderable="false" style="width: 40px"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Otavio Speht</td>
                        <td>ospeht@hotmail.com</td>
                        <td>123.456.789-10</td>
                        <td>18/04/2020 <sup>14:50</sup></td>
                        <td>
                            <button class="btn btn-link d-block m-auto" type="button">
                                <i class="mdi mdi-account-edit"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Fernanda Rocha Grécillo Antunes</td>
                        <td>fgrecillo@hotmail.com</td>
                        <td>123.456.789-10</td>
                        <td>18/04/2020 <sup>14:45</sup></td>
                        <td>
                            <button class="btn btn-link d-block m-auto" type="button">
                                <i class="mdi mdi-account-edit"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Kevyn Silvério</td>
                        <td>ksilverio@hotmail.com</td>
                        <td>123.456.789-10</td>
                        <td>18/04/2020 <sup>14:30</sup></td>
                        <td>
                            <button class="btn btn-link d-block m-auto" type="button">
                                <i class="mdi mdi-account-edit"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Vitor Adriano Hernandes</td>
                        <td>vadriano@hotmail.com</td>
                        <td>123.456.789-10</td>
                        <td>18/04/2020 <sup>15:00</sup></td>
                        <td>
                            <button class="btn btn-link d-block m-auto" type="button">
                                <i class="mdi mdi-account-edit"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
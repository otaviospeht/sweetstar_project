@extends('layouts.default')

@push('page-css')
<style>
    .divisor-right {
        border-right: 1px solid rgba(0, 0, 0, 0.1);
        height: 100%;
        width: 0;
        position: absolute;
        right: 0;
        top: 0
    }
</style>
@endpush

@push('page-js')
<script>
    $('#expiration_date').daterangepicker({
        singleDatePicker: true,
        startDate: moment().startOf('month').format('DD/MM/YYYY'),
        maxDate: moment()
    });
</script>
@endpush

@section('content')
<div class="card">
    <div class="card-header">
        <span style="font-size: 1.2rem">
            <i class="mdi mdi-cash-plus"></i> Novo produto
        </span>
    </div>
    <div class="card-body">
        <form id="create_product_form" method="POST" action="">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="product_image">Imagem</label>
                            <input id="product_image" name="product_image" type="file" class="form-control-file">
                        </div>
                    </div>
                    <div class="d-none d-lg-block divisor-right"></div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="form-row">
                        <div class="col-12 col-lg-8 mb-2">
                            <label for="product_name">Nome</label>
                            <input id="product_name" name="product_name" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-lg-4 mb-2">
                            <label for="expiration_date">Valido até</label>
                            <input id="expiration_date" name="expiration_date" type="text" class="form-control">
                        </div>
                        <div class="col-12 col-lg-4 mb-2">
                            <label for="product_price">Preço</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">R$</div>
                                </div>
                                <input id="product_price" name="product_price" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 mb-2">
                            <label for="product_provider">Fornecedor</label>
                            <select id="product_provider" name="product_provider" class="custom-select">
                                <option selected disabled>Selecione...</option>
                                <option value="1">Pepsico</option>
                                <option value="2">Elmachips</option>
                                <option value="3">RR Doces</option>
                                <option value="4">Festa Express</option>
                                <option value="5">Mastigo's Doces</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-lg-4 mb-2">
                            <label for="product_type">Tipo</label>
                            <select id="product_type" name="product_type" class="custom-select">
                                <option selected disabled>Selecione...</option>
                                <option value="1">Doce</option>
                                <option value="2">Bebida</option>
                                <option value="3">Salgado</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-4 mb-2">
                            <label for="product_category">Categoria</label>
                            <select id="product_category" name="product_category" class="custom-select">
                                <option selected disabled>Selecione...</option>
                                <option value="1">Salgadinho</option>
                                <option value="2">Energético</option>
                                <option value="3">Refrigerante</option>
                                <option value="4">Bala mastigável</option>
                                <option value="5">Bolacha</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-4 mb-2">
                            <label for="product_brand">Marca</label>
                            <select id="product_brand" name="product_brand" class="custom-select">
                                <option selected disabled>Selecione...</option>
                                <option value="1">Hersheys</option>
                                <option value="2">Ruffles</option>
                                <option value="3">Elma Chips</option>
                                <option value="4">Pepsi</option>
                                <option value="5">Monster</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col-12 mb-2">
                            <label for="product_description">Descrição</label>
                            <textarea id="product_description" name="product_description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-lg-4 offset-lg-8">
                            <button type="submit" class="btn btn-primary w-100">CADASTRAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
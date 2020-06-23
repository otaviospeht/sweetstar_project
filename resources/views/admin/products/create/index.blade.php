@extends('layouts.default')

@include('admin.products.create.script')

@section('content')
<div class="card">
    <div class="card-header">
        <span style="font-size: 1.2rem">
            <i class="mdi mdi-cash-plus"></i> Novo produto
        </span>
    </div>
    <div class="card-body">
        <form id="create_product_form" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="IdStatus" value="1">
            <input type="hidden" name="QntEstqProd" value="100">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="Img">Imagem</label>
                            <input id="Img" name="Img" type="file" accept=".png, .jpeg, .jpg" class="form-control-file" required>
                        </div>
                    </div>
                    <div class="d-none d-lg-block divisor-right"></div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="form-row">
                        <div class="col-12 col-lg-8 mb-2">
                            <label for="Nome">Nome</label>
                            <input id="Nome" name="Nome" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-lg-4 mb-2">
                            <label for="DataVali">Valido até</label>
                            <input id="DataVali" name="DataVali" type="text" class="form-control" required>
                        </div>
                        <div class="col-12 col-lg-4 mb-2">
                            <label for="ValorUnit">Preço</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">R$</div>
                                </div>
                                <input id="ValorUnit" name="ValorUnit" type="text" class="form-control" data-mask="000.000.000.000.000,00" data-mask-reverse="true" required>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 mb-2">
                            <label for="CodForn">Fornecedor</label>
                            <select id="CodForn" name="CodForn" class="custom-select" required>
                                <option selected disabled value="">Selecione...</option>
                                @foreach($fornecedores as $fornecedor)
                                    <option value="{{ $fornecedor['codForn'] }}">{{ $fornecedor['cnpj'] }} - {{ $fornecedor['razaoSoc'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-lg-4 mb-2">
                            <label for="IdTipo">Tipo</label>
                            <select id="IdTipo" name="IdTipo" class="custom-select" required>
                                <option selected disabled value="">Selecione...</option>
                                @foreach($tipos as $tipo)
                                    <option value="{{ $tipo['idTipo'] }}">{{ $tipo['nome'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-lg-4 mb-2">
                            <label for="IdCat">Categoria</label>
                            <select id="IdCat" name="IdCat" class="custom-select" required>
                                <option selected disabled value="">Selecione...</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria['idCat'] }}">{{ $categoria['nome'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-lg-4 mb-2">
                            <label for="IdMarca">Marca</label>
                            <select id="IdMarca" name="IdMarca" class="custom-select" required>
                                <option selected disabled value="">Selecione...</option>
                                @foreach($marcas as $marca)
                                    <option value="{{ $marca['idMarca'] }}">{{ $marca['nome'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col-12 mb-2">
                            <label for="Descricao">Descrição</label>
                            <textarea id="Descricao" name="Descricao" class="form-control" required></textarea>
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
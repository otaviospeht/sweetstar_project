@extends('layouts.default')

@include('contato.script')

@section('content')
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Envie-nos uma pergunta
                </div>
                <div class="card-body">
                    <form id="contact_form">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input name="nome" type="text" class="form-control" placeholder="Digite seu nome" />
                        </div>
                        <div class="form-group">
                            <label for="assunto">Assunto</label>
                            <input name="assunto" type="text" class="form-control" placeholder="Informe o assunto" />
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea name="descricao" class="form-control"></textarea>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-3 offset-md-9">
                                <button type="submit" class="btn btn-primary waves-effect waves-light w-100">
                                    <i class="mdi mdi-send"></i>
                                        Enviar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 mt-sm-2 mt-md-0">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Ou ligue para nós
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <h5>Atendimento SAC</h5>
                        <small>(11) 9 7097-3739</small>
                        <br>
                        <small>0800 111 222 333</small>
                    </div>
                    <div>
                        <h5>Ouvidoria</h5>
                        <small>(11) 9 7097-3739</small>
                        <br>
                        <small>0800 111 222 333</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
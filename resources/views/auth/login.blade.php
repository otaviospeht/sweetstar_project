@extends('layouts.wrapper')

@push('page-css')
    <style>
        .logo-img {
            max-width: 80%;
            margin: 0 10%;
        }
    </style>
@endpush

@section('content')
    <div class="text-center">
        <div class="logo-wrapper">
            <img class="logo-img" src="{{ url('img/logo.png') }}">
        </div>
        <form id="login_form" method="POST" action="">
            <div class="form-row my-3">
                <div class="col">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="mdi mdi-account"></i></span>
                        </div>
                        <input id="email" name="email" type="email" class="form-control" placeholder="E-mail">
                    </div>
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="mdi mdi-key"></i></span>
                        </div>
                        <input id="password" name="password" type="password" class="form-control" placeholder="Senha">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 col-lg-4 offset-lg-8">
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
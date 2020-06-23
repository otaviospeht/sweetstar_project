@extends('layouts.wrapper')

@push('page-css')

@endpush

@push('page-js')
    <script>
        $(() => {
            let _form = $(`#login_form`);

            $('form').on('submit', (e) => {
                e.preventDefault();

                $.ajax({
                    url: _form.attr('action'),
                    method: 'POST',
                    data: _form.serialize(),
                    success(res) {
                        window.location.replace("{{ route('home') }}");
                    },
                    error(res) {
                        $(`#error-text`).text(res.responseJSON)
                    }
                })
            })
        });
    </script>
@endpush

@section('content')
    <div class="text-center">
        <div class="logo-lg">
            <img src="{{ url('img/logo.png') }}" alt="MeetaWeb" style="max-width: 120px">
        </div>
    </div>

    <div class="card-box mt-2">
        <form id="login_form" method="POST" action="{{ route('login') }}">
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
                    <small class="text-danger form-text" id="error-text"></small>
                </div>
            </div>
            <div class="form-row d-flex align-items-center">
                <div class="col-6 col-lg-8 text-left">
                    <small>
                        <a href="/auth/register" class="text-primary">Cadastre-se</a>
                    </small>
                </div>
                <div class="col-6 col-lg-4">
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
<nav class="navbar navbar-expand-lg navbar-light bg-primary mb-2">
    <a class="navbar-brand" href="#">
        <img src="{{ url('img/logo.png') }}" style="max-height: 40px" alt="">
    </a>
    <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#main_navbar" aria-controls="main_navbar" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="main_navbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">PRODUTOS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">FALE CONOSCO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">SOBRE NÓS</a>
            </li>
        </ul>
        <div class="float-right ml-auto d-flex align-items-center">
            <form id="search_form" method="GET">
                <div class="input-group">
                    <input id="search" name="search" type="text" class="form-control" placeholder="Pesquisar...">
                    <div class="input-group-append" style="height: 38px">
                        <span class="input-group-text"><i class="mdi mdi-search-web"></i></span>
                    </div>
                </div>
            </form>
            <div class="cart_dropdown position-relative ml-2">
                <button class="btn btn-link btn-sm text-dark dropdown-toggle" id="cart_dropdown" data-toggle="dropdown" type="button">
                    <i class="mdi mdi-cart" style="font-size: 2em"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="cart_dropdown" style="width: 400px; left: -345px;">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><img src="{{ url('img/logo.png') }}" style="max-width: 60px;"></td>
                                <td>Nome do produto</td>
                                <td>R$ 5,50</td>
                                <td><button type="button" class="btn btn-sm btn-link text-danger"><i class="mdi mdi-delete"></i></button></td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('img/logo.png') }}" style="max-width: 60px;"></td>
                                <td>Nome do produto</td>
                                <td>R$ 5,50</td>
                                <td><button type="button" class="btn btn-sm btn-link text-danger"><i class="mdi mdi-delete"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <div class="row px-2">
                        <div class="col-12">
                            <button type="button" class="btn btn-success w-100">
                                Finalizar pedido
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-link btn-sm text-dark" type="button">
                <i class="mdi mdi-shield-account" style="font-size: 2em"></i>
            </button>
        </div>
    </div>
</nav>
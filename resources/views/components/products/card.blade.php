<div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4"
     data-categoria="{{ $product['idCat'] }}"
     data-marca="{{ $product['idMarca'] }}"
     data-tipo="{{ $product['idTipo'] }}">
    <div class="card-box bg-light h-100">
        <div class="card-body p-0">
        <a href="/products/{{ $product['codProd'] }}" class="d-block">
            <div class="product-img-container">
                <img class="card-img-top img-fluid mb-2" src="{{ url('img/products/') . "/{$product['img']}"}}">
            </div>
            <h6 class="product-title-container card-title text-black text-center text-uppercase">
                {{ $product['nome'] }}
            </h6>
            <hr>
        </a>
        <div class="row">
            <div class="col-12 col-lg-6 d-flex align-items-center">
                <span class="text-center h5 m-auto m-lg-0">
                    R$ <span data-mask="#.##0,00" data-mask-reverse="true">{{ number_format($product['valorUnit'], 2) }}</span>
                </span>
            </div>
            <div class="col-12 col-lg-6 d-flex align-items-center">
                <a href="/carrinho/add?codProd={{ $product['codProd'] }}" data-toggle="tooltip" title="Adicionar ao carrinho" class="m-auto  m-lg-0 mb-lg-0 ml-lg-auto"><i class="mdi mdi-cart text-success" style="font-size: 1.5rem"></i></a>
            </div>
        </div>
        </div>
    </div>
</div>
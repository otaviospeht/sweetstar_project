@forelse ($products as $product)
    <x-products.card :product="$product"></x-products.card>
@empty
    <div class="col-12">
        <div class="card-box">
            <h5 class="text-danger">Nenhum produto encontrado.</h5>
        </div>
    </div>
@endforelse
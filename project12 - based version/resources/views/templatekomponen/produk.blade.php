<div class="container justify-content-center text-center">
    <div class="row justify-content-center text-center">
        @foreach($products as $product)
        <div class="col md-3 my-3">
            <div class="card" style="width: 18rem;">
                <img src="{{$product->link}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$product->nama}}</h5>
                    <p class="card-text">Rp {{$product->harga}}</p>
                    <p class="card-text">Stok: {{$product->stok}}</p>
                    <p class="card-text">Keterangan: {{$product->keterangan}}</p>
                    @if ($id_1 == $user->id || $id_2 == $user->id)
                    <a class="btn btn-success" href="/produk/edit/{{$product->id}}">Edit</a>
                    <a class="btn btn-danger" href="/produk/destroy/{{$product->id}}">Delete</a>
                    @else
                    <a href="/produk/{{$product->id}}" class="btn btn-primary">Details</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
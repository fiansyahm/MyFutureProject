@extends('layouts/admin')

@section('head')

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>checkout</title>
</head>
@endsection


@section('isi')





<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
 -->
@endsection









<!-- <div class="container justify-content-center text-center">
    <div class="row justify-content-center text-center">
        @foreach($products as $product)
        <div class="col md-3 my-3">
            <div class="card" style="width: 18rem;">
                <img src="https://i0.wp.com/herbalisterpercaya.com/wp-content/uploads/2021/03/madu-zuriat.jpg?resize=328%2C330&ssl=1" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$product->nama}}</h5>
                    <p class="card-text">Rp {{$product->harga}}</p>
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
</div> -->

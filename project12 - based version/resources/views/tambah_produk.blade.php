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

<div class="container justify-content-center my-3">
    <form class="ps-checkout__form" action="/produk/create" method="post">
        @csrf
        <div class="form-group form-inline">
            <label for="nama" class="mx-3">Nama</label>
            <input type="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="nama" name="nama" value="{{old('nama')}}">
            @error('nama')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group form-inline">
            <label for="harga" class="mx-3">Harga</label>
            <input type="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="harga" name="harga" value="{{old('harga')}}">
            @error('harga')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group form-inline">
            <label for="link" class="mx-3">Link</label>
            <input type="link" class="form-control @error('link') is-invalid @enderror" id="link" placeholder="link" name="link" value="{{old('link')}}">
            @error('link')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group form-inline">
            <label for="stok" class="mx-3">Stok</label>
            <input type="stok" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="stok" name="stok" value="{{old('stok')}}">
            @error('stok')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group form-inline">
            <label for="keterangan" class="mx-3">Keterangan</label>
            <input type="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="keterangan" name="keterangan" value="{{old('keterangan')}}">
            @error('keterangan')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


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
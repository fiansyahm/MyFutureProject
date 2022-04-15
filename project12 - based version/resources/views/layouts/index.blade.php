<!--yield= head,isi -->

@extends('layouts/main')
@section('navbar')
<li class="nav-item active">
    <a class="nav-link" href="/dashboard">Home <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/produk">Produk</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/checkout">CheckOut</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/pemesanan">Pemesanan</a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Profile
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item bg-primary text-white" href="#">{{ Auth::user()->name }}</a>
        <a class="dropdown-item bg-primary text-white" href="#">{{ Auth::user()->email }}</a>
        <a class="dropdown-item bg-primary text-white" href="">@include('layouts.navigation')</a>
    </div>
</li>
@endsection
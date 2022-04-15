@extends('layouts/index')

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
@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
<div class="container">

    @foreach ($orders as $order)

    @if ($order->id_pengguna == $user->id)
    <!-- <div class="card ml-3 mt-3">
        <div class="card-header">
            Order# {{$order->id}}
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <p><b>Pelanggan</b></p>
                            </div>
                            <div class="col">
                                <p>{{$user->name}}</p>
                            </div>
                            <div class="col">
                                <p><b>Telp</b></p>
                            </div>
                            <div class="col">
                                <p>-</p>
                            </div>
                            <div class="col">
                                <p><b>No Ref Pelanggan</b></p>
                            </div>
                            <div class="col">
                                <p>-</p>
                            </div>
                            <div class="col">
                                <p><b>Sumber</b></p>
                            </div>
                            <div class="col">
                                <p>-</p>
                            </div>
                            <div class="col">
                                <p><b>Catatan</b></p>
                            </div>
                            <div class="col">
                                <p>-</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="col">
                                <p><b>Item</b></p>
                            </div>
                            <div class="col">
                                <p>{{$order->nama_order}}</p>
                            </div>
                            <div class="col">
                                <p><b>Kurir</b></p>
                            </div>
                            <div class="col">
                                <p>{{$order->nama_kurir}}</p>
                            </div>
                            <div class="col">
                                <p><b>No Resi</b></p>
                            </div>
                            <div class="col">
                                <p>{{$order->resi}}</p>
                            </div>
                            <div class="col">
                                <p><b>Total</b></p>
                            </div>
                            <div class="col">
                                <p>{{$order->Totalan_order}}</p>
                            </div>
                            <div class="col">
                                <p><b>Catatan</b></p>
                            </div>
                            <div class="col">
                                <p>-</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <p><b>Status Pembayaran</b></p>
                            </div>
                            <div class="row">
                                <p>{{$order->status_pembayaran}}</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <p><b>Status Pengiriman</b></p>
                            </div>
                            <div class="row">
                                <p>{{$order->status_pengiriman}}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            Sukses Adalah Perjuangan
        </div>
    </div> -->
    @include('templatekomponen/pesanan')
    @endif

    @endforeach
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
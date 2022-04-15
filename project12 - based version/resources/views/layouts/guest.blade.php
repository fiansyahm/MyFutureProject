<!-- sisa yield=isi-->
@extends('layouts/main')

@section('head')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
@endsection

@section('navbar')
@if (Route::has('login'))
@auth
<li class="nav-item active">
    <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard <span class="sr-only">(current)</span></a>
</li>
@else
<li class="nav-item">
    <a class="nav-link text-light" href="{{ route('login') }}">Log In</a>
</li>
@if (Route::has('register'))
<li class="nav-item">
    <a class="nav-link text-light" href="{{ route('register') }}">Register</a>
</li>
@endif
@endauth
@endif
@endsection


<!-- @section('isi')
<div class="font-sans text-gray-900 antialiased">
    {{ $slot }}
</div>
@endsection -->

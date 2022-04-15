<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@yield('head')

<body>
    @if ($id_1 == $user->id || $id_2 == $user->id)
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="/admin">TrivianCourier</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto" style="margin-right: 100px;">
                <li class="nav-item active">
                    <a class="nav-link" href="/admin">Admin Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/kelola_produk">Kelola Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/kelola_pemesanan">Kelola Pemesanan</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profile
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item bg-primary text-white" href="#">{{ Auth::user()->name }}</a>
                        <a class="dropdown-item bg-primary text-white" href="#">{{ Auth::user()->email }}</a>
                        <a class="dropdown-item bg-primary text-black" href="#">Login Sebagai Admin</a>
                        <a class="dropdown-item bg-primary text-white" href="">@include('layouts.navigation')</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- sampahnya tak taruh di index.blade.php,sampah 2 -->

    @yield('isi')
    @endif
</body>

</html>
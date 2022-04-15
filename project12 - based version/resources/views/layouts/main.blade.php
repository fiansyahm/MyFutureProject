<!--yield= head,navbar,isi -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@yield('head')

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="/">TrivianCourier</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto" style="margin-right: 100px;">
                @yield('navbar')
            </ul>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- sampahnya tak taruh di index.blade.php,sampah 2 -->

    @yield('isi')
</body>

</html>
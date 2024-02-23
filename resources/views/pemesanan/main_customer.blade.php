<!-- resources/views/layouts/customer_layout.blade.php -->

<!doctype html>

<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') - Pariwisata</title>
    <meta name="description" content="Perpustakaan">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('style/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{ asset('style/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    @yield('additional_styles') <!-- Additional styles for customer layout -->

</head>

<body>

    <div class="">
        <header class="">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">E Pariwisata</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div style="width: 800px;  margin-left: 100px; font-size: 18px;" class="navbar-nav mr-5 d-flex justify-content-between">
                            <a class="nav-link" href="">Home</a>
                            <a class="nav-link" href="#">Tentang Kami</a>
                                <a class="nav-link" href="{{ route('pemesanan.index') }}">Wisata</a>
                                <a class="nav-link" href="{{ route('pemesanan.order') }}">Pesanan</a>
                                <a class="nav-link" href="{{ route('riwayat_pembayaran') }}">Pembayaran</a>
                                <a class="nav-link" href="#">Kontak Kami</a>
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        @yield('content')
    </div>




    <script src="{{ asset('style/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('style/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('style/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('style/assets/js/main.js')}}"></script>

    <script src="{{ asset('style/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('style/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('style/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('style/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('style/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{ asset('style/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset('style/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{ asset('style/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('style/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('style/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('style/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>

    @yield('additional_scripts') <!-- Additional scripts for customer layout -->
</body>

</html>

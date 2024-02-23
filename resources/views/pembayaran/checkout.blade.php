@extends('pemesanan.main_customer')
@section('title', 'Dashboard')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Data table</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content">
        <div class="animated fadeIn">
            <div class="row mb-5">
                <div class="col-md-6 offset-3">
                    @if(session('success'))
                        <div class="d-flex justify-content-between alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="mb-5">
                                    <a href="{{ route('pemesanan.index') }}" class="btn btn-primary btn-lg rounded">Kembali</a>
                                </div>
                                <div class="card p-4 rounded shadow-md">
                                    <h2 class="mb-3">Data Pesanan</h2>
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="p-3" style="width: 400px;">
                                            <h2 class="h5">ID Pemesanan Anda: {{ $pemesanan->id_pemesanan }}</h2>
                                            <h6>Rincian Pesanan:</h6>
                                            <ul class="list-unstyled">
                                                @foreach ($pemesanan->detail_pemesanan as $paketWisata)
                                                    <li>Nama Wisata: {{ $paketWisata->wisata->nama_wisata }}</li>
                                                    <li>Gambar Wisata: <img src="{{ asset('storage/photo-wisata/'.$paketWisata->wisata->gambar_wisata) }}" class="card-img-top" alt="{{ $paketWisata->wisata->nama_wisata }}" style="width: 180px;"></li>
                                                @endforeach
                                            </ul>

                                            <!-- Informasi Pelanggan -->
                                            <h6 class="mt-4">Informasi Pelanggan:</h6>
                                            <ul class="list-unstyled">
                                                <li>Nama: {{ $pemesanan->customer->nama_customer }}</li>
                                                <li>Email: {{ $pemesanan->customer->email }}</li>
                                                <li>Nomor Telepon: {{ $pemesanan->customer->telp }}</li>
                                                <li>Alamat: {{ $pemesanan->customer->alamat }}</li>
                                            </ul>

                                            <!-- Opsi Tambahan -->
                                            <h6 class="mt-4">Opsi Tambahan:</h6>
                                            <ul class="list-unstyled">
                                                @if($pemesanan->pemesanan_pemandu->isNotEmpty())
                                                    <li>Pemandu Wisata: Ya</li>
                                                    <li>Nama Pemandu Wisata: {{ $pemesanan->pemesanan_pemandu->first()->pemandu->nama_pemandu }}</li>
                                                    <li>No Telepon Pemandu: {{ $pemesanan->pemesanan_pemandu->first()->pemandu->telp }}</li>
                                                @else
                                                    <li>Pemandu Wisata: Tidak</li>
                                                @endif
                                            </ul>
                                            <ul class="list-unstyled">
                                                @if($pemesanan->pemesanan_rumah_makan->isNotEmpty())
                                                    <li>Rumah Makan: Ya</li>
                                                    <li>Nama Rumah Makan: {{ $pemesanan->pemesanan_rumah_makan->first()->rumah_makan->nama_rumah_makan }}</li>
                                                    <li>Service Makan berapa kali: {{ session('jumlah_makan'); }}</li>
                                                @else
                                                    <li>Rumah Makan: Tidak</li>
                                                @endif
                                            </ul>

                                            <!-- Total Harga -->
                                            <h6 class="mt-4">Total Harga:</h6>
                                            <p class="mb-0">Rp {{ number_format($pemesanan->total_harga, 0, '.', ',') }}</p>

                                            <button class="btn btn-primary rounded mt-3" type="submit">Lanjut ke proses pembayaran</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

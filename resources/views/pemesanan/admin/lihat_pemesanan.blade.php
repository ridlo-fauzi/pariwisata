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
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="mb-5">
                                    <a href="{{ route('admin.pemesanan') }}" class="btn btn-primary btn-lg rounded"></i> Kembali</a> 
                                </div>
                                <div class="card p-4 rounded shadow-md">
                                    <div class="container">
                                        <h3 class="mb-3">Detail Pemesanan</h3>
                                        <p>Nama Customer: {{ $pesanan->customer->nama_customer }}</p>
                                        <p>Tujuan Wisata:</p>
                                        <ol>
                                            @foreach ($pesanan->detail_pemesanan as $pesan)
                                                <li>{{ $pesan->wisata->nama_wisata }}</li>
                                            @endforeach
                                        </ol>
                                        <p>Deskripsi Paket: {{ $pesanan->deskripsi_paket }}</p>
                                        <!-- Tambahkan informasi pemesanan lainnya sesuai kebutuhan -->
                                        <!-- Contoh: Jumlah Rombongan, Tanggal Keberangkatan, Total Harga, dll. -->
                                        <p>Jumlah Rombongan: {{ $pesanan->jumlah_rombongan }} Orang</p>
                                        <p>Tanggal Keberangkatan: {{ $pesanan->tanggal_keberangkatan }}</p>
                                        <p>Total Harga: Rp. {{ number_format($pesanan->total_harga, 0, '.', '.') }}</p>
                                        <p>Status: {{ $pesanan->status }}</p>
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
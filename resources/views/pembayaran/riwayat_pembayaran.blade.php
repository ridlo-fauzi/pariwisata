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
                                    <h2 class="mb-3">Data Riwayat Pembayaran</h2>
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <!-- Nota Pembayaran -->
                                        <div>
                                            @foreach ($pembayaran as $bayar)
                                            <h3>Nota Pembayaran</h3>
                                            <p>ID Pemesanan: {{ $bayar->id_pemesanan }}</p>
                                            <p>Status: {{ $bayar->status }}</p>
                                            <p>Metode Pembayaran: {{ $bayar->metode }}</p>
                                            <p>Tanggal Pembayaran: {{ $bayar->tanggal_pembayaran }}</p>
                                            <p>Jumlah Pembayaran: Rp {{ number_format($bayar->jumlah_pembayaran, 0, '.', ',') }}</p>
                                            <p>Kembalian: Rp {{ number_format($bayar->jumlah_pembayaran - $bayar->pemesanan->total_harga, 0, '.', ',') }}</p>
                                            @endforeach
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

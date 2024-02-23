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
                        <li><a href="/">Dashboard</a></li>
                        <li class="active">Data Tempat Wisata</li>
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
            <div class="col-md-10 offset-1">
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
        <!-- first row -->
        <div class="flex mx-5">
            @forelse($dataWisata as $wisata)
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/photo-wisata/'.$wisata->gambar_wisata) }}" class="card-img-top" alt="{{ $wisata->nama_wisata }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $wisata->nama_wisata }}</h5>
                        <p class="card-text">Lokasi: {{ $wisata->lokasi }}</p>
                        <p class="card-text">Deskripsi: {{ Str::limit($wisata->deskripsi, 100, '...') }}</p>
                        <p class="card-text">Harga: Rp {{ number_format($wisata->harga_wisata, 0, '.', '.') }}</p>
                        <div class="text-center">
                            <a href="{{ route('tempatWisata.edit', $wisata->id_wisata) }}" class="btn btn-primary btn-sm rounded"><i class="fa fa-eye"></i> Lihat Detail</a>
                            <a href="{{ route('pemesanan.create', $wisata->id_wisata) }}" class="btn btn-success btn-sm rounded"><i class="fa fa-cart"></i> Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        No Record Found!
                    </div>
                </div>
            </div>
            @endforelse
        </div>
        <!-- End row -->
    </div>
</div>
@endsection

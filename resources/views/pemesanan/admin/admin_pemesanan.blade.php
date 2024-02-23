@extends('main')

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
                            <li class="active">Data Pemesanan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <!-- first row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Pemesanan</strong>
                        <a href="{{ route('pemandu.create') }}" class="btn btn-outline-primary float-right"><i class="fa fa-plus"></i>&nbsp; pemandu</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Nama Customer</th>
                                    <th>Tujuan Wisata</th>
                                    <th>Jumlah Rombongan</th>
                                    <th>Tanggal Keberangkatan</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dataPemesanan as $pemesanan)
                                <tr>
                                    <td>{{ $pemesanan->customer->nama_customer }}</td>
                                    <td>
                                            @foreach ($pemesanan->detail_pemesanan as $pesanan)
                                                <p>{{ $pesanan->wisata->nama_wisata }}</p>
                                            @endforeach
                                    </td>
                                    <td>{{ $pemesanan->jumlah_rombongan }}</td>
                                    <td>{{ $pemesanan->tanggal_keberangkatan }}</td>
                                    <td>Rp. {{ number_format($pemesanan->total_harga, 0, '.', '.') }}</td>
                                    <td>{{ $pemesanan->status }}</td>
                                    <td>
                                        <a href="{{ route('pemesanan.show', $pemesanan->id_pemesanan) }}" class="btn btn-primary btn-sm rounded"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7">
                                        No Record Found!
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
</div>
@endsection

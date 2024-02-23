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
                            <li class="active">Data Tempat Wisata</li>
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
                        <strong class="card-title">Data Tempat Wisata</strong>
                        <a href="{{ route('tempatWisata.create') }}" class="btn btn-outline-primary float-right"><i class="fa fa-plus"></i>&nbsp; wisata</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Wisata</th>
                                    <th>Lokasi</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar Wisata</th>
                                    <th>Harga Wisata</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dataWisata as $wisata)
                                <tr>
                                    <td>{{ $wisata->nama_wisata }}</td>
                                    <td>{{ $wisata->lokasi }}</td>
                                    <td>{{ $wisata->deskripsi }}</td>
                                    <td><img src="{{ asset('storage/photo-wisata/'.$wisata->gambar_wisata) }}" alt="{{ $wisata->nama_wisata }}" class="w-full h-40 object-cover"></td>
                                    <td>{{ $wisata->harga_wisata }}</td>
                                    <td>
                                        <a href="{{ route('tempatWisata.edit', $wisata->id_wisata) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>

                                        <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault();if (confirm('Are you sure you want to delete this?')) {document.getElementById('delete-row-{{ $wisata->id_wisata }}').submit();}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form id="delete-row-{{ $wisata->id_wisata }}" action="{{ route('tempatWisata.destroy',$wisata->id_wisata) }}"method="POST">
                                            @method('DELETE')
                                            @csrf
                                        </form>
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

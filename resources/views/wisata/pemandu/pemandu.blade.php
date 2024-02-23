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
                            <li class="active">Data Pemandu</li>
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
                        <strong class="card-title">Data Pemandu</strong>
                        <a href="{{ route('pemandu.create') }}" class="btn btn-outline-primary float-right"><i class="fa fa-plus"></i>&nbsp; pemandu</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Pemandu</th>
                                    <th>No Telepon</th>
                                    <th>Tanggal Keberangkatan</th>
                                    <th>Harga Pemandu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dataPemandu as $pemandu)
                                <tr>
                                    <td>{{ $pemandu->nama_pemandu }}</td>
                                    <td>{{ $pemandu->telp }}</td>
                                    <td>{{ $pemandu->tanggal_keberangkatan }}</td>
                                    <td>{{ $pemandu->harga_pemandu }}</td>
                                    <td>
                                        <a href="{{ route('pemandu.edit', $pemandu->id_pemandu) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>

                                        <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault();if (confirm('Are you sure you want to delete this?')) {document.getElementById('delete-row-{{ $pemandu->id_pemandu }}').submit();}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form id="delete-row-{{ $pemandu->id_pemandu }}" action="{{ route('pemandu.destroy',$pemandu->id_pemandu) }}"method="POST">
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

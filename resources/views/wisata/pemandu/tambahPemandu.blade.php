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
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="my-5">
                        <a href="{{ route('pemandu.index') }}" class="btn btn-primary btn-lg">Kembali</a> 
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Tambah Pemandu</strong>
                        </div>
                        <div class="card-body">
                            <!-- Tambahkan formulir di sini -->
                            <form method="post" action="{{ route('pemandu.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_pemandu">Nama Pemandu</label>
                                    <input type="text" id="nama_pemandu" name="nama_pemandu" class="form-control">
                                    @error('nama_pemandu')
                                        <small id="nama_pemandu" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="telp">No Telepon</label>
                                    <input type="text" id="telp" name="telp" class="form-control">
                                    @error('telp')
                                        <small id="telp" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="tanggal_keberangkatan">Tanggal Keberangkatan</label>
                                    <input type="date" id="tanggal_keberangkatan" name="tanggal_keberangkatan" class="form-control">
                                    @error('tanggal_keberangkatan')
                                        <small id="tanggal_keberangkatan" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="harga_pemandu">Harga Pemandu</label>
                                    <input type="number" id="harga_pemandu" name="harga_pemandu" class="form-control">
                                    @error('harga_pemandu')
                                        <small id="harga_pemandu" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Tambahkan field lainnya sesuai kebutuhan -->
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
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
                        <a href="{{ route('rumahMakan.index') }}" class="btn btn-primary btn-lg">Kembali</a> 
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Tambah Rumah Makan</strong>
                        </div>
                        <div class="card-body">
                            <!-- Tambahkan formulir di sini -->
                            <form method="post" action="{{ route('rumahMakan.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_rumah_makan">Nama Rumah Makan</label>
                                    <input type="text" id="nama_rumah_makan" name="nama_rumah_makan" class="form-control">
                                    @error('nama_rumah_makan')
                                        <small id="nama_rumah_makan" class="form-text text-muted">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text" id="lokasi" name="lokasi" class="form-control">
                                    @error('lokasi')
                                        <small id="lokasi" class="form-text text-muted">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10"></textarea>
                                    @error('deskripsi')
                                        <small id="deskripsi" class="form-text text-muted">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="harga_service_makan">Harga Service Makan</label>
                                    <textarea name="harga_service_makan" id="harga_service_makan" class="form-control" cols="30" rows="10"></textarea>
                                    @error('harga_service_makan')
                                        <small id="harga_service_makan" class="form-text text-muted">{{ $message }}</small>
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
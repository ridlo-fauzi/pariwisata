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
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-flat-color-1">
                <div class="card-body">
                    <div class="h1 mb-0 text-light">
                        <div class="text-right"><i class="fa fa-book text-light"></i></div>
                        <span class="count">875</span>
                    </div>

                    <a href=""><small class="text-uppercase font-weight-bold text-light">jumlah judul buku ></small></a>    
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-flat-color-2">
                <div class="card-body">
                    <div class="h1 mb-0 text-light">
                        <div class="text-right"><i class="fa fa-users text-light"></i></div>
                        <span class="count">566</span>   
                    </div>

                    <a href=""><small class="text-uppercase font-weight-bold text-light">jumlah Petugas ></small></a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-flat-color-3">
                <div class="card-body">
                    <div class="h1 mb-0 text-light">
                        <div class="text-right"><i class="fa fa-users text-light"></i></div>
                        <span class="count">875</span>
                    </div>

                    <a href=""><small class="text-uppercase font-weight-bold text-light">jumlah Anggota ></small></a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-flat-color-4">
                <div class="card-body">
                    <div class="h1 mb-0 text-light">
                        <div class="text-right"><i class="fa fa-puzzle-piece text-light"></i></div>
                        <span class="count">875</span>
                    </div>

                    <a href=""><small class="text-uppercase font-weight-bold text-light">jumlah Buku dipinjam ></small></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

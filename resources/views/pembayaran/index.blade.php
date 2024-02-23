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
                                        <div class="p-3" style="width: 600px;">
                                            @forelse ($pemesananSemua as $pemesanan)
                                                <h2 class="h5">ID Pemesanan Anda: {{ $pemesanan->id_pemesanan }}</h2>
                                                <h6>Rincian Pesanan:</h6>
                                                <div class="row">
                                                    @foreach ($pemesanan->detail_pemesanan as $paketWisata)
                                                        <div class="col-md-6 mb-3">
                                                            <div style="max-width: 100%;">
                                                                <p class="fw-bold">Nama Wisata: {{ $paketWisata->wisata->nama_wisata }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <div max-width: 100%;>
                                                                <p class="fw-bold">Gambar Wisata:</p>
                                                                <img src="{{ asset('storage/photo-wisata/'.$paketWisata->wisata->gambar_wisata) }}" class="card-img-top" alt="{{ $paketWisata->wisata->nama_wisata }}" style="width: 100%;">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="container d-flex align-items-center justify-content-center vh-100">
                                                    <div class="m-auto text-start">
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
                                                                <li>Service Makan berapa kali: {{ $pemesanan->pemesanan_rumah_makan->first()->jumlah_makan; }}</li>
                                                            @else
                                                                <li>Rumah Makan: Tidak</li>
                                                            @endif
                                                        </ul>
                                                        <h6>Rincian Biaya:</h6>
                                                        
                                                        <!-- Harga Wisata -->
                                                        @foreach ($pemesanan->detail_pemesanan as $paketWisata)
                                                            <h6 class="mt-4">Harga Wisata:</h6>
                                                            <p class="mb-0">Rp {{ number_format($paketWisata->wisata->harga_wisata, 0, '.', ',') }} x {{ $pemesanan->jumlah_rombongan }} orang = Rp Rp {{ number_format($paketWisata->wisata->harga_wisata * $pemesanan->jumlah_rombongan, 0, '.', ',') }}</p>
                                                        @endforeach

                                                        <!-- Harga Pemandu -->
                                                        <h6 class="mt-4">Harga Pemandu:</h6>
                                                        <p class="mb-0">Rp {{ number_format($pemesanan->pemesanan_pemandu->first()->pemandu->harga_pemandu, 0, '.', ',') }}</p>

                                                        <!-- Harga Rumah Makan -->
                                                        <h6 class="mt-4">Harga Rumah Makan:</h6>
                                                        <p class="mb-0">Rp {{ number_format($pemesanan->pemesanan_rumah_makan->first()->rumah_makan->harga_service_makan, 0, '.', ',') }} x {{ $pemesanan->pemesanan_rumah_makan->first()->jumlah_makan }} kali service makan x {{  $pemesanan->jumlah_rombongan }} orang = Rp {{ number_format($pemesanan->pemesanan_rumah_makan->first()->rumah_makan->harga_service_makan * $pemesanan->pemesanan_rumah_makan->first()->jumlah_makan * $pemesanan->jumlah_rombongan, 0, '.', ',') }}
</p>

                                                        <!-- Total Harga -->
                                                        <h6 class="mt-4">Total Harga:</h6>
                                                        <p class="mb-0">Rp {{ number_format($pemesanan->total_harga, 0, '.', ',') }}</p>


                                                        <form action="{{ route('bayar', $pemesanan->id_pemesanan) }}" class="my-5" method="post">
                                                            @csrf
                                                            <!-- Informasi Pembayaran -->
                                                            <h6 class="mt-4">Informasi Pembayaran:</h6>

                                                            <!-- Pilih Metode Pembayaran -->
                                                            <div class="mb-3">
                                                                <label for="metode_pembayaran" class="form-label">Metode Pembayaran:</label>
                                                                <select class="form-control" id="metode_pembayaran" name="metode_pembayaran" required>
                                                                    <option value="kredit">Kartu Kredit</option>
                                                                    <option value="transfer">Transfer Bank</option>
                                                                    <option value="mobile_bangking">Mobile Banking</option>
                                                                </select>
                                                                @error('metode_pembayaran')
                                                                    <small id="metode_pembayaran" class="form-text text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>

                                                            <!-- Tanggal Kadaluarsa -->
                                                            <div class="mb-3">
                                                                <label for="tanggal_pembayaran" class="form-label">Tanggal pembayaran:</label>
                                                                <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran" required>
                                                                @error('tanggal_pembayaran')
                                                                    <small id="tanggal_pembayaran" class="form-text text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>

                                                            <!-- Kode Keamanan -->
                                                            <div class="mb-3">
                                                                <label for="jumlah_pembayaran" class="form-label">Jumlah Pembayaran:</label>
                                                                <input type="number" class="form-control" id="jumlah_pembayaran" name="jumlah_pembayaran" required>
                                                                @error('jumlah_pembayaran')
                                                                    <small id="jumlah_pembayaran" class="form-text text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>

                                                            <!-- Tombol Lanjut -->
                                                            <button class="btn btn-primary rounded mt-3" type="submit">Bayar</button>
                                                        </form>
                                                        @empty
                                                            <p>Tidak ada pesanan</p>
                                                    </div>
                                                </div>
                                            @endforelse
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

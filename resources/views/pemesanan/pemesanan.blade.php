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
                            <div class="col-md-8">
                                <div class="mb-5">
                                    <a href="{{ route('pemesanan.index') }}" class="btn btn-primary btn-lg rounded"></i> Kembali</a> 
                                </div>
                                <div class="card p-4 rounded shadow-md">
                                    <h2 class="mb-3">Daftar Pesanan</h2>
                                        @forelse ($pesananWisata as $pesanan)
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <img src="{{ asset('storage/photo-wisata/'.$pesanan->wisata->gambar_wisata) }}" alt="{{ $pesanan->wisata->nama_wisata }}" class="img-thumbnail" style="width: 180px;">

                                                <div class="p-3" style="width: 400px;">
                                                    <h2 class="h5">{{ $pesanan->wisata->nama_wisata }}</h2>
                                                    <p class="mb-0">Harga: Rp {{ number_format($pesanan->wisata->harga_wisata, 0, '.', '.') }}</p>
                                                </div>
                                                <a href="#" class="btn btn-danger btn-md rounded" onclick="event.preventDefault();if (confirm('Apakah anda ingin menghapus pesanan ini?')) {document.getElementById('delete-row-{{ $pesanan->id_detail_pemesanan }}').submit();}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
    
                                                <form id="delete-row-{{ $pesanan->id_detail_pemesanan }}" action="{{ route('pesananWisata.destroy',$pesanan->id_detail_pemesanan) }}"method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </div>


                                        @empty
                                            <p>Tidak ada data pesanan.</p>
                                        @endforelse

                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card rounded">
                        <div class="card-header">
                            <strong class="card-title">Form Pemesanan</strong>
                        </div>
                        <div class="card-body">
                            <!-- Tambahkan formulir di sini -->
                            @if ($pemesanan == null)
                                <div>Silahkan memesan terlebih dahulu</div>
                            @else
                                
                            <form action="{{ route('pemesanan.wisata', $pemesanan->id_pemesanan) }}" method="post">
                                @csrf

                                <h2>Formulir Pemesanan Piknik</h2>

                                <!-- Informasi Customer -->
                                <div class="form-group">
                                    <label for="nama_customer">Nama Customer</label>
                                    <input type="text" id="nama_customer" name="nama_customer" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email Customer</label>
                                    <input type="email" id="email" name="email" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="telp">Nomor Telepon</label>
                                    <input type="tel" id="telp" name="telp" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" id="alamat" name="alamat" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label for="deskripsi_paket">Deskripsi Pemesanan</label>
                                    <input type="text" id="deskripsi_paket" name="deskripsi_paket" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_keberangkatan">Tanggal Keberangkatan</label>
                                    <input type="date" id="tanggal_keberangkatan" name="tanggal_keberangkatan" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label for="jumlah_rombongan">Jumlah Rombongan</label>
                                    <input type="number" id="jumlah_rombongan" name="jumlah_rombongan" class="form-control">
                                </div>

                                <!-- Pilihan Pemandu -->
                                <div class="mt-3">
                                    <label>Mampir Rumah Makan?</label>
                                    <div class="form-check">
                                        <input type="checkbox" id="rumah_makan" name="rumah_makan" value="Y" class="form-check-input">
                                        <label for="rumah_makan" class="form-check-label">Ya</label>
                                    </div>
                                </div>

                                <!-- Input Jumlah Makanan (ditampilkan hanya jika rumah makan dicentang) -->
                                <div class="mt-3" id="jumlah_makanan_container" style="display: none;">
                                    <label for="jumlah_makanan">Berapa kali</label>
                                    <input type="number" id="jumlah_makanan" name="jumlah_makanan" min="1" class="form-control">
                                </div>

                                <!-- Pilihan Rumah Makan -->
                                <div class="mt-3" id="pilih_rumah_makan" style="display: none;">
                                    <label for="rumah_makan_id">Pilih Rumah Makan</label>
                                    <div id="rumah_makan_inputs">
                                        <select id="rumah_makan_id" name="rumah_makan_id" class="form-control">
                                            <option value="" disabled selected>-- Pilih Rumah Makan --</option>
                                            @foreach ($rumahMakan as $rumah)
                                                <option value="{{ $rumah->id_rumah_makan }}">{{ $rumah->nama_rumah_makan }} ({{ $rumah->lokasi }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Pilihan Pemandu -->
                                <div class="mt-3">
                                    <label>Pakai Pemandu?</label>
                                    <div class="form-check">
                                        <input type="checkbox" id="pemandu" name="pemandu" value="Y" class="form-check-input">
                                        <label for="pemandu" class="form-check-label">Ya</label>
                                    </div>
                                </div>

                                <!-- Pilihan Toko Oleh-oleh -->
                                <div class="mt-3">
                                    <label for="toko_oleh_oleh" class="form-check-label">Mampir Toko Oleh-oleh?</label>
                                    <div class="form-check">
                                        <input type="checkbox" id="toko_oleh_oleh" name="toko_oleh_oleh" value="Y" class="form-check-input">
                                        <label for="toko_oleh_oleh" class="form-check-label">Ya</label>
                                    </div>
                                </div>

                                <!-- Tombol Submit -->
                                <button class="btn btn-primary rounded mt-3" type="submit">Proses Pemesanan</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    var rumahMakanCheckbox = document.getElementById('rumah_makan');
    var jumlahMakananInput = document.getElementById('jumlah_makanan');
    var pilihRumahMakanContainer = document.getElementById('pilih_rumah_makan');
    var tokoOlehCheckbox = document.getElementById('toko_oleh_oleh');
    var pilihTokoContainer = document.getElementById('pilih_toko');

    rumahMakanCheckbox.addEventListener('change', function () {
        // Menentukan apakah checkbox dicentang atau tidak
        var isChecked = this.checked;

        // Menetapkan nilai default dan menampilkan atau menyembunyikan input jumlah_makanan berdasarkan status checkbox
        jumlahMakananInput.value = isChecked ? '1' : '';
        document.getElementById('jumlah_makanan_container').style.display = isChecked ? 'block' : 'none';

        // Menampilkan atau menyembunyikan container pilih rumah makan berdasarkan nilai checkbox
        pilihRumahMakanContainer.style.display = isChecked ? 'block' : 'none';
    });

    jumlahMakananInput.addEventListener('input', function () {
        if (parseInt(jumlahMakananInput.value) < 1) {
                jumlahMakananInput.value = '';
            }

        // Sembunyikan atau tampilkan container pilih rumah makan berdasarkan nilai jumlah makanan
        pilihRumahMakanContainer.style.display = jumlahMakanan > 0 ? 'block' : 'none';
    }); 
    </script>
@endsection
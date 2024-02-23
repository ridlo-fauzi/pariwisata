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
                        <a href="{{ route('tempatWisata.index') }}" class="btn btn-primary btn-lg">Kembali</a> 
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Edit Wisata</strong>
                        </div>
                        <div class="card-body">
                            <!-- Tambahkan formulir di sini -->
                            <form method="post" action="{{ route('tempatWisata.update', $wisata->id_wisata) }}" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="nama_wisata">Nama Wisata</label>
                                    <input type="text" id="nama_wisata" name="nama_wisata" value="{{ old('nama_wisata', $wisata->nama_wisata) }}" class="form-control">
                                    @error('nama_wisata')
                                        <small id="nama_wisata" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi', $wisata->lokasi) }}" class="form-control">
                                    @error('lokasi')
                                        <small id="lokasi" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi">deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10">{{ old('deskripsi', $wisata->deskripsi) }}</textarea>
                                    @error('deskripsi')
                                        <small id="deskripsi" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="gambar_wisata" class="form-label">Unggah Gambar</label>
                                    <input type="hidden" name="oldImage" id="oldImage" value="{{ $wisata->gambar_wisata }}">
                                    <input type="file" class="form-control" id="gambar_wisata" name="gambar_wisata">
                                    <div id="image-preview" class="mt-2">
                                        @if ($wisata->gambar_wisata)
                                            <img id="preview-image" src="{{ asset('storage/photo-wisata/' . $wisata->gambar_wisata) }}" alt="{{ $wisata->nama_wisata }}" class="w-full h-full object-cover">
                                        @endif
                                    </div>
                                    <small class="text-muted">Gambar maksimal 2MB</small>
                                    @error('gambar_wisata')
                                    <small id="gambar_wisata" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="harga_wisata">Harga</label>
                                    <input type="number" id="harga_wisata" name="harga_wisata" value="{{ old('harga_wisata', $wisata->harga_wisata) }}" class="form-control">
                                    @error('harga_wisata')
                                        <small id="harga_wisata" class="form-text text-danger">{{ $message }}</small>
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
    <script>
    const imageInput = document.getElementById('gambar_wisata');
    const imagePreview = document.getElementById('image-preview');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                const img = document.createElement('img');
                img.src = this.result;
                img.className = 'mt-2 object-contain h-32';
                imagePreview.innerHTML = '';
                imagePreview.appendChild(img);
            });

            reader.readAsDataURL(file);
        } else {
            imagePreview.innerHTML = '';
        }
    });
</script>
@endsection
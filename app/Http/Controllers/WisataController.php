<?php

namespace App\Http\Controllers;

use App\Models\Pemandu;
use App\Models\RumahMakan;
use App\Models\Wisata;
use App\Models\Toko;

use App\Http\Requests\StoreRumahMakanRequest;
use App\Http\Requests\StorePemanduRequest;
use App\Http\Requests\StoreTokoRequest;
use App\Http\Requests\StoreWisataRequest;
use App\Http\Requests\UpdateRumahMakanRequest;
use App\Http\Requests\UpdatePemanduRequest;
use App\Http\Requests\UpdateTokoRequest;
use App\Http\Requests\UpdateWisataRequest;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function wisataIndex()
    {
        $dataWisata = Wisata::all();
        return view('wisata.tempat-wisata.wisata', compact('dataWisata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function wisataCreate()
    {
        return view('wisata.tempat-wisata.tambahWisata');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function wisataStore(StoreWisataRequest $request)
    {
        $validatedData = $request->validated();

        $photo = $request->file('gambar_wisata');

        $gambarName = date('Y-m-d') . '-' . uniqid() . '.' . $photo->getClientOriginalExtension();
        $path = 'photo-wisata/' . $gambarName;

        Storage::disk('public')->put($path, file_get_contents($photo));

        $validatedData['gambar_wisata'] = $gambarName;

        $wisata = Wisata::create($validatedData);

        if ($wisata) {
            return redirect(route('tempatWisata.index'))->with('success', 'Data wisata Berhasil Ditambahkan');
        } else {
            return redirect(route('tempatWisata.index'))->with('error', 'Data wisata Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function wisataShow(Wisata $wisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function wisataEdit(string $id)
    {
        $wisata = Wisata::where('id_wisata', $id)->firstOrFail();
        return view('wisata.tempat-wisata.editWisata', compact('wisata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function wisataUpdate(UpdateWisataRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $photo = $request->oldImage;
        // Cek apakah ada gambar baru yang diupload
        if ($request->file('gambar_wisata')) {
            // Hapus gambar lama (jika ada) sebelum menyimpan yang baru
            if ($request->oldImage) {
                Storage::disk('public')->delete('photo-wisata/' . $request->oldImage);
            }

            // Simpan gambar baru
            $photo = $request->file('gambar_wisata');
            $gambarName = date('Y-m-d') . '-' . uniqid() . '.' . $photo->getClientOriginalExtension();
            $path = 'photo-wisata/' . $gambarName;

            Storage::disk('public')->put($path, file_get_contents($photo));

            $validatedData['gambar_wisata'] = $gambarName;
        }

        $affected = DB::table('wisata')
            ->where('id_wisata', $id)
            ->update($validatedData);

        if ($affected) {
            return redirect(route('tempatWisata.index'))->with('success', 'Data wisata Berhasil Diubah');
        } else {
            return redirect(route('tempatWisata.index'))->with('error', 'Data wisata Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function wisataDestroy(string $id)
    {
        $wisata = Wisata::find($id);

        Storage::disk('public')->delete('photo-wisata/' . $wisata->gambar_wisata);

        $deleted = DB::table('wisata')
            ->where('id_wisata', $id)
            ->delete();

        if ($deleted) {
            return redirect(route('tempatWisata.index'))->with('success', 'Data wisata Berhasil Dihapus');
        } else {
            return redirect(route('tempatWisata.index'))->with('error', 'Data wisata Gagal Dihapus');
        }
    }

    public function pemanduIndex()
    {
        $dataPemandu = Pemandu::all();

        return view('wisata.pemandu.pemandu', compact('dataPemandu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function pemanduCreate()
    {
        return view('wisata.pemandu.tambahPemandu');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function pemanduStore(StorePemanduRequest $request)
    {
        $validatedData = $request->validated();
        $pemandu = Pemandu::create($validatedData);

        if ($pemandu) {
            return redirect(route('pemandu.index'))->with('success', 'Data pemandu Berhasil Ditambahkan');
        } else {
            return redirect(route('pemandu.index'))->with('error', 'Data pemandu Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function pemanduShow(Pemandu $pemandu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function pemanduEdit(string $id)
    {
        $pemandu = Pemandu::where('id_pemandu', $id)->firstOrFail();
        return view('wisata.pemandu.editPemandu', compact('pemandu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function pemanduUpdate(UpdatePemanduRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $affected = DB::table('pemandu')
            ->where('id_pemandu', $id)
            ->update($validatedData);

        if ($affected) {
            return redirect(route('pemandu.index'))->with('success', 'Data pemandu Berhasil Diubah');
        } else {
            return redirect(route('pemandu.index'))->with('error', 'Data pemandu Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function pemanduDestroy(string $id)
    {
        $deleted = DB::table('pemandu')
            ->where('id_pemandu', $id)
            ->delete();

        if ($deleted) {
            return redirect(route('pemandu.index'))->with('success', 'Data pemandu Berhasil Dihapus');
        } else {
            return redirect(route('pemandu.index'))->with('error', 'Data pemandu Gagal Dihapus');
        }
    }

    public function rumahMakanIndex()
    {
        $dataRumahMakan = RumahMakan::all();
        return view('wisata.rumah-makan.rumahMakan', compact('dataRumahMakan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function rumahMakanCreate()
    {
        return view('wisata.rumah-makan.tambahRumahMakan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function rumahMakanStore(StoreRumahMakanRequest $request)
    {
        $validatedData = $request->validated();
        $rumahMakan = RumahMakan::create($validatedData);

        if ($rumahMakan) {
            return redirect(route('rumahMakan.index'))->with('success', 'Data Rumah Makan Berhasil Ditambahkan');
        } else {
            return redirect(route('rumahMakan.index'))->with('error', 'Data Rumah Makan Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function rumahMakanShow(RumahMakan $rumahMakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function rumahMakanEdit(string $id)
    {
        $rumahMakan = RumahMakan::where('id_rumah_makan', $id)->firstOrFail();
        return view('wisata.rumah-makan.editRumahMakan', compact('rumahMakan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function rumahMakanUpdate(UpdateRumahMakanRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $affected = DB::table('rumah_makan')
            ->where('id_rumah_makan', $id)
            ->update($validatedData);

        if ($affected) {
            return redirect(route('rumahMakan.index'))->with('success', 'Data Rumah Makan Berhasil Diubah');
        } else {
            return redirect(route('rumahMakan.index'))->with('error', 'Data Rumah Makan Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function rumahMakanDestroy(string $id)
    {
        $deleted = DB::table('rumah_makan')
            ->where('id_rumah_makan', $id)
            ->delete();

        if ($deleted) {
            return redirect(route('rumahMakan.index'))->with('success', 'Data Rumah Makan Berhasil Dihapus');
        } else {
            return redirect(route('rumahMakan.index'))->with('error', 'Data Rumah Makan Gagal Dihapus');
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function tokoOlehOlehIndex()
    {
        $dataToko = Toko::all();
        return view('wisata.toko.toko', compact('dataToko'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tokoOlehOlehCreate()
    {
        return view('wisata.toko.tambahToko');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function tokoOlehOlehStore(StoreTokoRequest $request)
    {
        $validatedData = $request->validated();
        $toko = Toko::create($validatedData);

        if ($toko) {
            return redirect(route('toko.index'))->with('success', 'Data Toko Berhasil Ditambahkan');
        } else {
            return redirect(route('toko.index'))->with('error', 'Data Toko Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function tokoOlehOlehShow(Toko $toko)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function tokoOlehOlehEdit(string $id)
    {
        $toko = Toko::where('id_toko', $id)->firstOrFail();
        return view('wisata.toko.editToko', compact('toko'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function tokoOlehOlehUpdate(UpdateTokoRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $affected = DB::table('toko')
            ->where('id_toko', $id)
            ->update($validatedData);

        if ($affected) {
            return redirect(route('toko.index'))->with('success', 'Data Toko Berhasil Diubah');
        } else {
            return redirect(route('toko.index'))->with('error', 'Data Toko Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function tokoOlehOlehDestroy(string $id)
    {
        $deleted = DB::table('toko')
            ->where('id_toko', $id)
            ->delete();

        if ($deleted) {
            return redirect(route('toko.index'))->with('success', 'Data Toko Berhasil Dihapus');
        } else {
            return redirect(route('toko.index'))->with('error', 'Data Toko Gagal Dihapus');
        }
    }
}

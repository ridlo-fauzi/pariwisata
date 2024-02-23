<?php

namespace App\Http\Controllers;

use App\Http\Requests\PesananRequest;
use App\Models\Pemesanan;
use App\Http\Requests\StorePemesananRequest;
use App\Http\Requests\UpdatePemesananRequest;
use App\Models\Customer;
use App\Models\DetailPemesanan;
use App\Models\Pemandu;
use App\Models\PemesananPemandu;
use App\Models\PemesananRumahMakan;
use App\Models\RumahMakan;
use App\Models\Toko;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function pemesananIndex()
    {
        $dataWisata = Wisata::all();
        return view('pemesanan.dashboard_pemesanan', compact('dataWisata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function pemesananCreate(Request $request, $id)
    {
        $pesanWisata = Wisata::find($id);

        $pesanan = Pemesanan::where('id_customer', null)->first();

        if (!$pesanan) {
            $pesanan = new Pemesanan();
            $pesanan->id_customer = null;
            $pesanan->id_toko = null;
            $pesanan->deskripsi_paket = '';
            $pesanan->tanggal_keberangkatan = now();
            $pesanan->jumlah_rombongan = 0;
            $pesanan->total_harga = 0;
            $pesanan->status = 'diproses';
            $pesanan->save();
        }

        $pesanan_detail = new DetailPemesanan();
        $pesanan_detail->id_pemesanan = $pesanan->id_pemesanan;
        $pesanan_detail->id_wisata = $pesanWisata->id_wisata;
        $pesanan_detail->harga = $pesanWisata->harga_wisata;
        $pesanan_detail->save();

        return redirect()->route('pemesanan.index')->with('success', 'Berhasil menambah ke Pesanan, silahkan menuju halaman Pesanan jika ingin melihat data pesanan!');
    }

    public function pemesananOrder()
    {
        $pesananWisata = DetailPemesanan::whereHas('pemesanan', function ($query) {
            $query->whereNull('id_customer');
        })->with('wisata')->get();

        $pemesanan = Pemesanan::whereNull('id_customer')->first();
        $rumahMakan = RumahMakan::all();
        $tokoOleh = Toko::all();

        return view('pemesanan.pemesanan', compact('pesananWisata', 'pemesanan', 'rumahMakan', 'tokoOleh'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function pesananWisataDestroy(string $id)
    {
        $deleted = DB::table('detail_pemesanan')
            ->where('id_detail_pemesanan', $id)
            ->delete();

        if ($deleted) {
            return redirect(route('pemesanan.order'))->with('success', 'Data Pesanan Berhasil Dihapus');
        } else {
            return redirect(route('pemesanan.order'))->with('error', 'Data Pesanan Gagal Dihapus');
        }
    }

    /**
     * Display the specified resource.
     */
    public function pemesananWisata(PesananRequest $request, $id)
    {
        $validatedData = $request->validated();
        $pemesanan = Pemesanan::find($id);
        $pesanan = Pemesanan::find($id);

        $totalHarga = 0;

        foreach ($pemesanan->detail_pemesanan as $detailPemesanan) {
            $totalHarga += $detailPemesanan->wisata->harga_wisata * $validatedData['jumlah_rombongan'];
        }

        if ($request->rumah_makan == 'Y') {
            $pesanMakan = new PemesananRumahMakan();
            $pesanRumahMakan = RumahMakan::where('id_rumah_makan', $request->rumah_makan_id)->first();

            $totalHarga += $pesanRumahMakan->harga_service_makan * $request->jumlah_makanan * $validatedData['jumlah_rombongan'];
            $pesanMakan->id_pemesanan = $id;
            $pesanMakan->id_rumah_makan = $request->rumah_makan_id;
            $pesanMakan->jumlah_makan = $request->jumlah_makanan;

            $pesanMakan->save();
        }

        $tanggalKeberangkatanPemesanan = $validatedData['tanggal_keberangkatan'];
        $pemandu = null;
        if ($request->pemandu == 'Y') {
            $pemandu = Pemandu::whereDoesntHave('pemesanan', function ($query) use ($tanggalKeberangkatanPemesanan) {
                $query->whereHas('pemesanan_pemandu', function ($subQuery) use ($tanggalKeberangkatanPemesanan) {
                    $subQuery->where('pemesanan.tanggal_keberangkatan', $tanggalKeberangkatanPemesanan);
                });
            })->inRandomOrder()->first();
            $hargaPemandu = $pemandu->harga_pemandu;
            $totalHarga += $hargaPemandu;
            $pesanPemandu = new PemesananPemandu();
            $pesanPemandu->id_pemesanan = $id;
            $pesanPemandu->id_pemandu = $pemandu->id_pemandu;
            $pesanPemandu->save();
        }

        $idToko = null;
        if ($request->toko_oleh_oleh == 'Y') {
            $idToko = null;
            foreach ($pemesanan->detail_pemesanan as $detailPemesanan) {
                $lokasiWisata = $detailPemesanan->wisata->lokasi;

                // Mengasumsikan Anda memilih Toko pertama dengan lokasi yang sesuai
                $toko = Toko::where('lokasi', $lokasiWisata)->first();

                if ($toko) {
                    $idToko = $toko->id_toko;
                    break; // Keluar dari loop begitu menemukan Toko yang sesuai pertama
                }
            }
        }

        // simpan data customer
        $customer = new Customer();
        $customer->nama_customer = $validatedData['nama_customer'];
        $customer->email = $validatedData['email'];
        $customer->telp = $validatedData['telp'];
        $customer->alamat = $validatedData['alamat'];
        $customer->save();


        $pesanan->id_customer = $customer->id_customer;
        $pesanan->id_toko = $idToko;
        $pesanan->deskripsi_paket = $validatedData['deskripsi_paket'];
        $pesanan->tanggal_keberangkatan = $validatedData['tanggal_keberangkatan'];
        $pesanan->jumlah_rombongan = $validatedData['jumlah_rombongan'];
        $pesanan->total_harga = $totalHarga;
        $pesanan->save();

        return redirect()->route('checkout', $id)->with('success', 'Berhasil memesan paket wisata');
    }

    public function admin_pemesanan()
    {
        $dataPemesanan = Pemesanan::all();
        return view('pemesanan.admin.admin_pemesanan', compact('dataPemesanan'));
    }

    public function pemesananShow(string $id)
    {
        $pesanan = Pemesanan::find($id);
        return view('pemesanan.admin.lihat_pemesanan', compact('pesanan'));
    }
}

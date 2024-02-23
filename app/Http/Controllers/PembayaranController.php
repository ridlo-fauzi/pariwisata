<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function checkoutIndex()
    {
        $pemesananSemua = Pemesanan::where('status', 'diproses')->get();
        return view('pembayaran.index', compact('pemesananSemua'));
    }

    public function bayar(Request $request, string $id)
    {
        $pemesanan = Pemesanan::find($id);

        $validatedData = $request->validate([
            'metode_pembayaran' => 'required',
            'tanggal_pembayaran' => 'required',
            'jumlah_pembayaran' => ['required', 'numeric', 'gte:' . $pemesanan->total_harga],
        ], [
            'jumlah_pembayaran.gte' => 'Jumlah pembayaran kurang dari total harga pesanan.',
        ]);

        $pemesanan->status = 'terbayar';
        $pemesanan->save();

        // Simpan data pembayaran
        $pembayaran = new Pembayaran();
        $pembayaran->id_pemesanan = $id;
        $pembayaran->metode = $validatedData['metode_pembayaran'];
        $pembayaran->jumlah_pembayaran = $validatedData['jumlah_pembayaran'];
        $pembayaran->tanggal_pembayaran = $validatedData['tanggal_pembayaran'];
        $pembayaran->status = 'terbayar';
        $pembayaran->save();

        // Tambahkan logika atau proses lainnya yang perlu dilakukan setelah pembayaran berhasil

        // Redirect ke halaman sukses pembayaran
        return redirect()->route('riwayat_pembayaran')->with('success', 'Pembayaran berhasil!');
    }


    public function riwayatBayar()
    {
        $pembayaran = Pembayaran::all();
        return view('pembayaran.riwayat_pembayaran', compact('pembayaran'));
    }
}

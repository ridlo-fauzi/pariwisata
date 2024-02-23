<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';

    protected $primaryKey = 'id_pemesanan';

    protected $fillable = [
        'id_customer',
        'deskripsi_paket',
        'tanggal_keberangkatan',
        'jumlah_rombongan',
        'total_harga',
        'status'
    ];

    // Relasi One-to-Many dengan DetailPemesanan
    public function detail_pemesanan()
    {
        return $this->hasMany(DetailPemesanan::class, 'id_pemesanan', 'id_pemesanan');
    }

    public function pemesanan_pemandu()
    {
        return $this->hasMany(PemesananPemandu::class, 'id_pemesanan', 'id_pemesanan');
    }

    public function pemesanan_rumah_makan()
    {
        return $this->hasMany(PemesananRumahMakan::class, 'id_pemesanan', 'id_pemesanan');
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko', 'id_toko');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id_customer');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_pemesanan', 'id_pemesanan');
    }
}

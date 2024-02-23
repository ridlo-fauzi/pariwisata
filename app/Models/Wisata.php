<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $table = 'wisata';

    protected $primaryKey = 'id_wisata';

    protected $fillable = [
        'nama_wisata',
        'lokasi',
        'deskripsi',
        'gambar_wisata',
        'harga_wisata'
    ];

    public function detailPemesanan()
    {
        return $this->hasMany(DetailPemesanan::class, 'id_detail_pemesanan', 'id_detail_pemesanan');
    }
}

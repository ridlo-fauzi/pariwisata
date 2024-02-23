<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahMakan extends Model
{
    use HasFactory;

    protected $table = 'rumah_makan';

    protected $primaryKey = 'id_rumah_makan';

    protected $fillable = [
        'nama_rumah_makan',
        'lokasi',
        'deskripsi',
        'harga_service_makan'
    ];

    public function pemesanan_rumah_makan()
    {
        return $this->hasMany(PemesananRumahMakan::class, 'id_rumah_makan', 'id_rumah_makan');
    }
}

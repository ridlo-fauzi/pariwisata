<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananRumahMakan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan_rumah_makan';

    protected $primaryKey = 'id_pemesanan_rumah_makan';

    protected $fillable = [
        'id_pemesanan',
        'id_rumah_makan'
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan', 'id_pemesanan');
    }

    public function rumah_makan()
    {
        return $this->belongsTo(RumahMakan::class, 'id_rumah_makan', 'id_rumah_makan');
    }
}

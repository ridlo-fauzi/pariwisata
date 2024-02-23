<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id_pemesanan',
        'metode',
        'jumlah_pembayaran',
        'tanggal_pembayaran',
        'status'
    ];

    public function pemesanan()
    {
        return $this->hasOne(Pemesanan::class, 'id_pemesanan', 'id_pemesanan');
    }
}

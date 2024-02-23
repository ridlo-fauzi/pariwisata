<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemandu extends Model
{
    use HasFactory;

    protected $table = 'pemandu';

    protected $primaryKey = 'id_pemandu';

    protected $fillable = [
        'nama_pemandu',
        'telp',
        'tanggal_keberangkatan',
        'harga_pemandu'
    ];

    public function pemesanan_pemandu()
    {
        return $this->hasMany(PemesananPemandu::class, 'id_pemandu', 'id_pemandu');
    }

    public function pemesanan()
    {
        return $this->hasManyThrough(
            Pemesanan::class,
            PemesananPemandu::class,
            'id_pemandu',
            'id_pemesanan',
            'id_pemandu',
            'id_pemesanan'
        );
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananPemandu extends Model
{
    use HasFactory;

    protected $table = 'pemesanan_pemandu';

    protected $primaryKey = 'id_pemesanan_pemandu';

    protected $fillable = [
        'id_pemesanan',
        'id_pemandu'
    ];

    public function pemandu()
    {
        return $this->belongsTo(Pemandu::class, 'id_pemandu', 'id_pemandu');
    }

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesaanan', 'id_pemesaanan');
    }
}

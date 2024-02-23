<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::Table('wisata')->insert([
            [
                'nama_wisata' => 'Candi Sukuh',
                'lokasi' => 'Ngargoyoso',
                'deskripsi' => 'Candi Sukuh adalah sebuah kompleks candi Hindu yang secara administrasi terletak di wilayah Desa Berjo, Kecamatan Ngargoyoso, Kabupaten Karanganyar, Jawa Tengah.',
                'gambar_wisata' => '',
                'harga_wisata' => 80000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_wisata' => 'Grojogan Sewu',
                'lokasi' => 'Tawangmangu',
                'deskripsi' => 'Grojogan Sewu merupakan air terjun yang berada di Provinsi Jawa Tengah.Terletak di Kecamatan Tawangmangu, Kabupaten Karanganyar, Jawa Tengah.',
                'gambar_wisata' => '',
                'harga_wisata' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_wisata' => 'Pantai Parangtritis',
                'lokasi' => 'Bantul',
                'deskripsi' => 'Pantai Parangtritis adalah tempat wisata yang terletak di Kalurahan Parangtritis, Kapanéwon Kretek, Kabupaten Bantul, Daerah Istimewa Yogyakarta. Jaraknya kurang lebih 27 km dari pusat kota. Pantai ini menjadi salah satu destinasi wisata terkenal di Yogyakarta dan telah menjadi ikon pariwisata di Yogyakarta.',
                'gambar_wisata' => '',
                'harga_wisata' => 250000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_wisata' => 'Tebing Breksi',
                'lokasi' => 'Sleman',
                'deskripsi' => 'Tebing Breksi merupakan tempat wisata yang berada di wilayah Kabupaten Sleman. Lokasinya berada di sebelah selatan Candi Prambanan dan berdekatan dengan Candi Ijo serta Kompleks Keraton Boko.',
                'gambar_wisata' => '',
                'harga_wisata' => 180000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

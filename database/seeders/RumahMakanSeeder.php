<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RumahMakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::Table('rumah_makan')->insert([
            [
                'nama_rumah_makan' => 'RM Candisari',
                'lokasi' => 'Kebumen',
                'deskripsi' => 'Candisari merupakan restauran dengan fasilitas yang cukup lengkap. Bisa dikatakan sebagai rest area yang recomanded. Jl. Raya Timur No.KM. 2, Ketugon, Purwodeso, Kec. Karanganyar, Kabupaten Kebumen, Jawa Tengah 54362',
                'harga_service_makan' => 12000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_rumah_makan' => 'RM Sari Rasa',
                'lokasi' => 'Surakarta',
                'deskripsi' => 'RM. Sari Rasa merupakan usaha yang menjual masakan khas minang. Usaha ini telah berdiri sejak tahun 2007.',
                'harga_service_makan' => 15000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

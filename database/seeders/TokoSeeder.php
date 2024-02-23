<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::Table('toko')->insert([
            [
                'nama_toko' => 'Pusat Oleh Oleh Madukoro52',
                'lokasi' => 'Semarang',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

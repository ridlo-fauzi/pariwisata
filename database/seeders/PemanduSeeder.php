<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemanduSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::Table('pemandu')->insert([
            [
                'nama_pemandu' => 'pemandu1',
                'telp' => '0893252324',
                'tanggal_keberangkatan' =>  NULL,
                'harga_pemandu' => 230000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pemandu' => 'pemandu2',
                'telp' => '0853732923',
                'tanggal_keberangkatan' => NULL,
                'harga_pemandu' => 120000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

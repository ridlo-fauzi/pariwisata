<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::Table('customer')->insert([
        //     [
        //         'nama_customer' => 'customer1',
        //         'email' => 'customer1@gmail.com',
        //         'telp' => '08567459332',
        //         'alamat' => 'Jogja',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'nama_customer' => 'customer2',
        //         'email' => 'customer2@gmail.com',
        //         'telp' => '0852953332',
        //         'alamat' => 'Semarang',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]
        // ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Toko;

class TokoSeeder extends Seeder
{
    public function run()
    {
        Toko::create([
            'name' => 'Bintang Mandiri',
            'address' => 'Tengku Iskandari (Blang Bintang Lama)',
            'phone' => '+6281360084071',
        ]);

        Toko::create([
            'name' => 'Mandiri Baru',
            'address' => 'T Iskandar 4 Lamglumpang',
            'phone' => '+6282367676579',
        ]);
    }
}

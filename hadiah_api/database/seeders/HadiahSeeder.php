<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hadiah;
use App\Models\Toko;

class HadiahSeeder extends Seeder
{
    public function run()
    {
        $toko1 = Toko::where('name', 'Bintang Mandiri')->first();
        $toko2 = Toko::where('name', 'Mandiri Baru')->first();

        Hadiah::create([
            'toko_id' => $toko1->id,
            'doc_number' => 'TTOL-00A-2306-90081',
            'received' => false,
        ]);

        Hadiah::create([
            'toko_id' => $toko1->id,
            'doc_number' => 'TTOL-00A-2306-90082',
            'received' => false,
        ]);

        Hadiah::create([
            'toko_id' => $toko2->id,
            'doc_number' => 'TTOL-00A-2306-90086',
            'received' => false,
        ]);
    }
}

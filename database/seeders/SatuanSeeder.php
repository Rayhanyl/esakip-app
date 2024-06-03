<?php

namespace Database\Seeders;

use App\Models\Satuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $satuans = [
            [
                'satuan' => 'Persen'
            ],
            [
                'satuan' => 'Poin'
            ],
            [
                'satuan' => 'Nilai'
            ],
            [
                'satuan' => 'Opini'
            ],
            [
                'satuan' => 'Kunjungan'
            ],
            [
                'satuan' => 'Unit'
            ],
            [
                'satuan' => 'Desa'
            ],
        ];

        foreach ($satuans as $satuan) {
            Satuan::create($satuan);
        };
    }
}

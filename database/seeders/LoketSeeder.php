<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Loket;

class LoketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'loket' => 'Loket 1',
                'keterangan' => 'Pelayanan Umum',
                'is_active' => false,
            ],
            [
                'loket' => 'Loket 2',
                'keterangan' => 'Pelayanan Khusus',
                'is_active' => false,
            ],
            [
                'loket' => 'Loket 3',
                'keterangan' => 'Pelayanan Prioritas',
                'is_active' => false,
            ],
        ];

        foreach ($data as $item) {
            Loket::create($item);
        }
    }
}

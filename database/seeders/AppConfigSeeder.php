<?php

namespace Database\Seeders;

use App\Models\AppConfig;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class AppConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AppConfig::updateOrCreate(
            ['id' => 1],
            [
                'instansi_name'          => 'Dinas Kependudukan dan Pencatatan Sipil Kab. Maros',
                'instansi_address'        => 'Jl. Jend. Sudirman No. 2, Maros, Sulawesi Selatan 90511',
                'instansi_phone'          => '0411-371234',
                'instansi_email'          => 'disdukcapil@maroskab.go.id',
                'logo'                    => null,
                'active_theme'            => 'default',
                'footer_text'             => 'Selamat datang di Disdukcapil Kab. Maros | Jam operasional: Senin - Kamis (08:00 - 16:00) | Jumat (08:00 - 11:30) | Mohon menunggu nomor antrian Anda dipanggil | Terima kasih atas kesabaran Anda',
                'social_media_facebook'   => 'https://facebook.com/disdukcapilmaros',
                'social_media_instagram'  => 'https://instagram.com/disdukcapilmaros',
                'social_media_twitter'    => 'https://x.com/disdukcapilmrs',
            ]
        );

        // Clear cached config so fresh data is loaded
        Cache::forget('app_config');

        $this->command->info('AppConfig seeded successfully.');
    }
}


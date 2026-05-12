<?php

namespace Database\Seeders;

use App\Models\campaign;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        campaign::created([
            'title' => 'Bantu Korban Banjir',
            'description' => 'Pendidikan untuk korban banjir',
            'target_donation' => 1000000,
            'collection_donation' => 25000000,
            'deadline' => '2026-11-30'
        ]);

        campaign::created([
            'title' => 'Beasiswa Anak Yatim',
            'description' => 'Pendidikan untuk anak yatim',
            'terget_donation' => 2000000,
            'collected_donation' => 5000000,
            'deadline' => '2026-11-30'
        ]);
    }
}

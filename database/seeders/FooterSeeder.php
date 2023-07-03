<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('footers')->insert([
            'logo' => 'logo/footer/logo.png',
            'copyright' => 'SRoyWEBstudio | All Rights Reserved',
            'desc' => 'Professionally redefine transparent ROI through low-risk
            high-yield imperatives. Progressively create empowered. cost effective users via
            team driven.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}

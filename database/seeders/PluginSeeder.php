<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PluginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plugins')->insert([
            'is_whatsapp' => 1,
            'wh_number' => '7872289842',
            'is_tawk' => 1,
            'tawk_src' => 'https://embed.tawk.to/6252ab7db0d10b6f3e6c9a77/1g09erpjc',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('headers')->insert([
            'phone' => '7872289842',
            'email' => 'contact@sroywebstudio.com',
            'logo' => 'logo/header/logo.png',
            'mlogo' => 'logo/header/logo.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}

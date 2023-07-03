<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CallToActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('call_to_actions')->insert([
            'title' => 'Need Any Solution For Education and Carrer',
            'subtitle' => 'CONTACT US',
            'button' => 'GET IN TOUCH',
            'btnurl' => 'https://www.facebook.com',
            'image' => 'home/calltoaction/image.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}

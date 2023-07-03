<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutWelcomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_welcomes')->insert([
            'title' => 'Relation Between Students & Their Carrer',
            'subtitle' => 'Read About Adhyayan Career',
            'desc' => 'Synergistically incentivize effective imperatives through fully researched intellectual capital. Appropriately fashion client-based.',
            'image' => 'about/welcome/image.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}

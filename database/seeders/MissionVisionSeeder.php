<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MissionVisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mission_visions')->insert([
            'title' => 'Our Mission',
            'desc' => 'Monotonically matrix extensible applications and go forward communities. Synergistically extend client-based manufactured..Synergistically incentivize effective imperatives through fully researched intellectual capital. Appropriately fashion client-based.',
            'image' => 'about/mission/image.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('mission_visions')->insert([
            'title' => 'Our Vision',
            'desc' => 'Synergistically incentivize effective imperatives through fully researched intellectual capital. Appropriately fashion client-based. Monotonically matrix extensible applications and go forward communities. Synergistically extend client-based manufactured.',
            'image' => 'about/mission/image.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}

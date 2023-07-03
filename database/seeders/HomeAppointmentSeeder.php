<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HomeAppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_appointments')->insert([
            'title' => 'We are Ready To Talk About Your Opportunitiesr',
            'subtitle' => ' GET APPOINTMENT NOW',
            'desc' => 'Progressively morph principle-centered e-markets without an expanded array of opportunities. Conveniently incubate e-tailers for extensive leadership skills. Holisticly extend leading-edge vortals vis-a-vis 24/7 e-markets. Appropriately evolve efficient functionalities with installed base relationships.',
            'phone' => '7872289842',
            'email' => 'contact@sroywebstudio.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}

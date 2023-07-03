<?php

namespace App\Http\Livewire;

use App\Models\AboutWelcome;
use App\Models\MissionVision;
use App\Models\WorkProcess;
use Livewire\Component;

class FrontAbout extends Component
{
    public function render()
    {
        $welcome = AboutWelcome::find(1);
        $missions = MissionVision::all();
        $works = WorkProcess::all();

        return view('livewire.front-about', [
            'welcome' => $welcome,
            'missions' => $missions,
            'works' => $works,
        ]);
    }
}

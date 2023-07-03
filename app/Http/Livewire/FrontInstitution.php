<?php

namespace App\Http\Livewire;

use App\Models\Institution;
use Livewire\Component;

class FrontInstitution extends Component
{
    public function render()
    {
        $institutions = Institution::where('status', 1)->get();

        return view('livewire.front-institution', [
            'institutions' => $institutions,
        ]);
    }
}

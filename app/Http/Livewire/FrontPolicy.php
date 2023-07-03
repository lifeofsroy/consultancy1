<?php

namespace App\Http\Livewire;

use App\Models\PrivacyPolicy;
use Livewire\Component;

class FrontPolicy extends Component
{
    public function render()
    {
        $privacy = PrivacyPolicy::find(1);

        return view('livewire.front-policy', [
            'privacy' => $privacy,
        ]);
    }
}

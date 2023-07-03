<?php

namespace App\Http\Livewire;

use App\Models\CookiePolicy;
use Livewire\Component;

class FrontCookie extends Component
{
    public function render()
    {
        $cookie = CookiePolicy::find(1);

        return view('livewire.front-cookie', [
            'cookie' => $cookie,
        ]);
    }
}

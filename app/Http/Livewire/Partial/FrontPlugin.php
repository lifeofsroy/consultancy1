<?php

namespace App\Http\Livewire\Partial;

use App\Models\Plugin;
use Livewire\Component;

class FrontPlugin extends Component
{
    public function render()
    {
        $plugin = Plugin::find(1);

        return view('livewire.partial.front-plugin', [
            'plugin' => $plugin,
        ]);
    }
}

<?php

namespace App\Http\Livewire\Partial;

use App\Models\Notice;
use Livewire\Component;

class FrontNotice extends Component
{
    public function render()
    {
        $notices = Notice::where('header', 1)->latest()->get();
        
        return view('livewire.partial.front-notice', [
            'notices' => $notices,
        ]);
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\TermCondition;
use Livewire\Component;

class FrontTerm extends Component
{
    public function render()
    {
        $term = TermCondition::find(1);

        return view('livewire.front-term', [
            'term' => $term,
        ]);
    }
}

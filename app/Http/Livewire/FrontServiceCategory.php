<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ServiceCategory;

class FrontServiceCategory extends Component
{
    use WithPagination;
    
    public function render()
    {
        $categories = ServiceCategory::where('status', 1)->get();

        return view('livewire.front-service-category', [
            'categories' => $categories,
        ]);
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ServiceCategory;

class FrontServiceByCategory extends Component
{
    public $servicecat_slug;

    public function mount($servicecat_slug)
    {
        $this->servicecat_slug = $servicecat_slug;
    }

    public function render()
    {
        $category = ServiceCategory::where('slug', $this->servicecat_slug)->first();
        $servicecats = ServiceCategory::where('status', 1)->get();

        return view('livewire.front-service-by-category', [
            'category' => $category,
            'servicecats' => $servicecats,
        ]);
    }
}

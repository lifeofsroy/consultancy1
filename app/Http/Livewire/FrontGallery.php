<?php

namespace App\Http\Livewire;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithPagination;

class FrontGallery extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $galleries = Gallery::where('status', 1)->paginate(12);

        return view('livewire.front-gallery', [
            'galleries' => $galleries,
        ]);
    }
}

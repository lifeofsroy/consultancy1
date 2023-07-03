<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CourseCategory;

class FrontCourseByCategory extends Component
{
    public $coursecat_slug;

    public function mount($coursecat_slug)
    {
        $this->coursecat_slug = $coursecat_slug;
    }

    public function render()
    {
        $coursecat = CourseCategory::where('slug', $this->coursecat_slug)->first();
        $categories = CourseCategory::where('status', 1)->get();
        
        return view('livewire.front-course-by-category', [
            'coursecat' => $coursecat,
            'categories' => $categories,
        ]);
    }
}

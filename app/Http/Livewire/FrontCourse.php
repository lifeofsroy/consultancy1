<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CourseCategory;
use App\Models\Institution;
use App\Models\Service;

class FrontCourse extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $searchTerm = null;

    public function render()
    {
        $categories = CourseCategory::where('status', 1)->get();
        $courses = Course::query()
            ->where('status', 1)
            ->where('title', 'like', '%' . $this->searchTerm . '%')
            ->latest()->paginate(8);

        $services = Service::where('status', 1)->inRandomOrder()->take(3)->get();
        $institutions = Institution::where('status', 1)->inRandomOrder()->take(3)->get();

        return view('livewire.front-course', [
            'categories' => $categories,
            'courses' => $courses,
            'services' => $services,
            'institutions' => $institutions,
        ]);
    }
}

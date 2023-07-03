<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use App\Models\CourseCategory;
use App\Models\CourseComment;
use Illuminate\Support\Facades\Storage;

class FrontCourseDetail extends Component
{
    public $course_slug;

    public function mount($course_slug)
    {
        $this->course_slug = $course_slug;
    }

    public function export()
    {
        $file = Course::where('slug', $this->course_slug)->first();
        return Storage::disk('public')->download($file->doc);
    }

    public $user_id;
    public $course_id;
    public $desc;
    public $rating;

    public function resetInput()
    {
        $this->desc = null;
        $this->rating = null;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'rating' => 'required',
            'desc' => 'required|max:200',
        ]);
    }

    public function commentForm()
    {
        $this->validate([
            'rating' => 'required',
            'desc' => 'required|max:200',
        ]);

        $course = Course::where('slug', $this->course_slug)->first();

        $query = new CourseComment();
        $query->user_id = auth()->user()->id;
        $query->course_id = $course->id;
        $query->rating = $this->rating;
        $query->desc = $this->desc;

        $query->save();

        $this->resetInput();
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('added', ['message' => 'Comment Submitted Successfully']);
    }

    protected $messages = [
        'rating.required' => 'Rating is Required',
        'desc.required' => 'Cannot send blank Comment',
        'desc.max' => 'Not more than 200 characters',
    ];

    public function render()
    {
        $course = Course::where('slug', $this->course_slug)->first();
        $categories = CourseCategory::where('status', 1)->get();

        $courseComments = CourseComment::where([['course_id', $course->id],['status', 1]])->get();

        return view('livewire.front-course-detail', [
            'course' => $course,
            'categories' => $categories,
            'courseComments' => $courseComments,
        ]);
    }
}

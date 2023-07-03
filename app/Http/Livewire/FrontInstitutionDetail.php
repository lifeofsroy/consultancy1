<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Institution;
use App\Models\InstitutionComment;
use Illuminate\Support\Facades\Storage;

class FrontInstitutionDetail extends Component
{
    public $institution_slug;

    public function mount($institution_slug)
    {
        $this->institution_slug = $institution_slug;
    }

    public function export()
    {
        $file = Institution::where('slug', $this->institution_slug)->first();
        return Storage::disk('public')->download($file->doc);
    }

    public $user_id;
    public $institution_id;
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

        $institution = Institution::where('slug', $this->institution_slug)->first();

        $query = new InstitutionComment();
        $query->user_id = auth()->user()->id;
        $query->institution_id = $institution->id;
        $query->rating = $this->rating;
        $query->desc = $this->desc;

        $query->save();

        $this->resetInput();
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('added', ['message' => 'Comment Submitted Successfully']);
    }

    protected $messages = [
        'category.required' => 'Category is Required',
        'question.required' => 'Cannot send blank query',
        'question.max' => 'Not more than 500 characters',
    ];

    public function render()
    {
        $institution = Institution::where('slug', $this->institution_slug)->first();

        $institutionComments = InstitutionComment::where([['institution_id', $institution->id],['status', 1]])->get();

        return view('livewire.front-institution-detail', [
            'institution' => $institution,
            'institutionComments' => $institutionComments,
        ]);
    }
}

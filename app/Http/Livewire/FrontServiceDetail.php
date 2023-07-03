<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\ServiceComment;
use Illuminate\Support\Facades\Storage;

class FrontServiceDetail extends Component
{
    public $service_slug;

    public function mount($service_slug)
    {
        $this->service_slug = $service_slug;
    }

    public function export()
    {
        $file = Service::where('slug', $this->service_slug)->first();
        return Storage::disk('public')->download($file->doc);
    }

    public $user_id;
    public $service_id;
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

        $service = Service::where('slug', $this->service_slug)->first();

        $query = new ServiceComment();
        $query->user_id = auth()->user()->id;
        $query->service_id = $service->id;
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
        $service = Service::where('slug', $this->service_slug)->first();
        $categories = ServiceCategory::where('status', 1)->get();

        $serviceComments = ServiceComment::where([['service_id', $service->id],['status', 1]])->get();
        
        return view('livewire.front-service-detail', [
            'service' => $service,
            'categories' => $categories,
            'serviceComments' => $serviceComments,
        ]);
    }
}

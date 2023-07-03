<?php

namespace App\Http\Livewire;

use App\Models\Faq;
use App\Models\FaqForm;
use Livewire\Component;

class FrontFaq extends Component
{
    public $category;
    public $question;
    public $more;

    public function resetInput()
    {
        $this->category = null;
        $this->question = null;
        $this->more = null;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'category' => 'required',
            'question' => 'required|max:200',
        ]);
    }

    public function faqForm()
    {
        $this->validate([
            'category' => 'required',
            'question' => 'required|max:200',
        ]);

        $query = new FaqForm();
        $query->user_id = auth()->user()->id;
        $query->category = $this->category;
        $query->more = $this->more;
        $query->question = $this->question;

        $query->save();

        $this->resetInput();
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('added', ['message' => 'Question Submitted Successfully']);
    }

    protected $messages = [
        'category.required' => 'Category is Required',
        'question.required' => 'Cannot send blank query',
        'question.max' => 'Not more than 500 characters',
    ];

    public function render()
    {
        $faqs = Faq::where('status', 1)->get();
        
        return view('livewire.front-faq', [
            'faqs' => $faqs,
        ]);
    }
}

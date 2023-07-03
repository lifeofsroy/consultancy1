<?php

namespace App\Http\Livewire\Partial;

use App\Models\Course;
use App\Models\Footer;
use App\Models\NewsLetter;
use App\Models\SocialLink;
use Livewire\Component;

class FrontFooter extends Component
{
    public $email;

    public function resetInput()
    {
        $this->email = null;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'email' => 'required|email:rfc,dns|unique:news_letters',
        ]);
    }

    public function newsForm()
    {
        $this->validate([
            'email' => 'required|email:rfc,dns|unique:news_letters',
        ]);

        $letter = new NewsLetter();
        $letter->email = $this->email;

        $letter->save();

        $this->resetInput();
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('added', ['message' => 'Thank You for Subcribing !']);
    }

    protected $messages = [
        'email.required' => 'Email is required',
        'email.email' => 'Invalid Email',
    ];

    public function render()
    {
        $footer = Footer::find(1);
        $socials = SocialLink::where('status', 1)->get();
        $courses = Course::where('status', 1)->latest()->take(2)->get();

        return view('livewire.partial.front-footer', [
            'footer' => $footer,
            'socials' => $socials,
            'courses' => $courses,
        ]);
    }
}

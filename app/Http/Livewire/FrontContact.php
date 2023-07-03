<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ContactForm;
use App\Models\ContactInfo;

class FrontContact extends Component
{
    public $name;
    public $email;
    public $phone;
    public $purpose;
    public $desc;

    public function resetInput()
    {
        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $this->purpose = null;
        $this->desc = null;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'purpose' => 'required',
            'desc' => 'required|max:500',
        ]);
    }

    public function queryForm()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'purpose' => 'required',
            'desc' => 'required|max:500',
        ]);

        $contact = new ContactForm();
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->phone = $this->phone;
        $contact->purpose = $this->purpose;
        $contact->desc = $this->desc;

        $contact->save();

        $this->resetInput();
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('added', ['message' => 'Message Sent']);
    }

    protected $messages = [
        'name.required' => 'Name cannot be empty',
        'email.required' => 'Email is required',
        'email.email' => 'Invalid Email',
        'phone.required' => 'Phone is Required',
        'phone.numeric' => 'Invalid Phone Number',
        'phone.digits' => 'Invalid Phone Number',
        'purpose.required' => 'Select Appointment Purpose',
        'datetime.after' => 'Date Not Available',
        'desc.required' => 'Cannot send blank message',
        'desc.max' => 'Not more than 500 characters',
    ];


    public function render()
    {
        $info = ContactInfo::find(1);

        return view('livewire.front-contact', [
            'info' => $info,
        ]);
    }
}

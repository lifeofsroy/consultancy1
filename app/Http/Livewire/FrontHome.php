<?php

namespace App\Http\Livewire;

use App\Models\Faq;
use App\Models\Course;
use App\Models\Notice;
use App\Models\Slider;
use App\Models\Partner;
use App\Models\Service;
use Livewire\Component;
use App\Models\HomeWelcome;
use App\Models\Institution;
use App\Models\Testimonial;
use App\Models\AppointmentForm;
use App\Models\CallToAction;
use App\Models\HomeAppointment;
use App\Models\HomeFaq;

class FrontHome extends Component
{
    public $name;
    public $email;
    public $phone;
    public $purpose;
    public $app_service;
    public $app_course;
    public $app_institution;
    public $datetime;
    public $desc;

    public function resetInput()
    {
        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $this->purpose = null;
        $this->app_service = null;
        $this->app_course = null;
        $this->app_institution = null;
        $this->datetime = null;
        $this->desc = null;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'purpose' => 'required',
            'app_service' => 'exclude_unless:purpose,Service|required',
            'app_course' => 'exclude_unless:purpose,Course|required',
            'app_institution' => 'exclude_unless:purpose,Institution|required',
            'datetime' => 'required|after:today',
            'desc' => 'nullable|max:300',
        ]);
    }

    public function appointment()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'purpose' => 'required',
            'app_service' => 'exclude_unless:purpose,Service|required',
            'app_course' => 'exclude_unless:purpose,Course|required',
            'app_institution' => 'exclude_unless:purpose,Institution|required',
            'datetime' => 'required|after:today',
            'desc' => 'nullable|max:300',
        ]);

        $appointment = new AppointmentForm();
        $appointment->name = $this->name;
        $appointment->email = $this->email;
        $appointment->phone = $this->phone;
        $appointment->purpose = $this->purpose;
        $appointment->service_id = $this->app_service;
        $appointment->course_id = $this->app_course;
        $appointment->institution_id = $this->app_institution;
        $appointment->datetime = $this->datetime;
        $appointment->desc = $this->desc;

        $appointment->save();

        $this->resetInput();
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('added', ['message' => 'Appointment Booked']);
    }

    protected $messages = [
        'name.required' => 'Name cannot be empty',
        'email.required' => 'Email is required',
        'email.email' => 'Invalid Email',
        'phone.required' => 'Phone is Required',
        'phone.numeric' => 'Invalid Phone Number',
        'phone.digits' => 'Invalid Phone Number',
        'purpose.required' => 'Select Appointment Purpose',
        'app_service.required' => 'Please Select Service',
        'app_course.required' => 'Please Select Course',
        'app_institution.required' => 'Please Select Institution',
        'datetime.required' => 'Date & Time are Required',
        'datetime.after' => 'Date Not Available',
        'desc.max' => 'Not more than 300 characters',
    ];

    public function render()
    {
        $sliders = Slider::where('status', 1)->get();
        $notices = Notice::where('status', 1)->latest()->get();
        $welcome = HomeWelcome::find(1);
        $services = Service::where('featured', 1)->get();
        $courses = Course::where('featured', 1)->get();
        $testis = Testimonial::where('status', 1)->get();
        $institutions = Institution::where('featured', 1)->get();
        $faqs = Faq::where('featured', 1)->take(3)->get();
        $partners = Partner::where('status', 1)->get();
        $appoint = HomeAppointment::find(1);
        $callaction = CallToAction::find(1);
        $homefaq = HomeFaq::find(1);

        return view('livewire.front-home', [
            'sliders' => $sliders,
            'notices' => $notices,
            'welcome' => $welcome,
            'services' => $services,
            'courses' => $courses,
            'testis' => $testis,
            'institutions' => $institutions,
            'faqs' => $faqs,
            'partners' => $partners,
            'appoint' => $appoint,
            'callaction' => $callaction,
            'homefaq' => $homefaq,
        ]);
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Header;
use Livewire\Component;
use App\Models\AdmissionForm;
use Livewire\WithFileUploads;
use App\Models\CourseCategory;
use Illuminate\Support\Carbon;

class FrontAdmission extends Component
{
    use WithFileUploads;

    public $first_name;
    public $middle_name;
    public $last_name;
    public $email;
    public $phone;
    public $alt_phone;
    public $dob;
    public $gender;
    public $father_name;
    public $mother_name;
    public $guar_name;
    public $guar_ph;
    public $parma_city;
    public $parma_po;
    public $parma_ps;
    public $parma_dist;
    public $parma_state;
    public $parma_pin;
    public $addr_same;
    public $corrent_city;
    public $corrent_po;
    public $corrent_ps;
    public $corrent_dist;
    public $corrent_state;
    public $corrent_pin;
    public $qualifi_name;
    public $qualifi_year;
    public $qualifi_coll;
    public $qualifi_mark;
    public $marksheet_img;
    public $user_img;
    public $course;
    public $category = null;
    public $courses = null;

    public function resetInput()
    {
        $this->first_name = null;
        $this->middle_name = null;
        $this->last_name = null;
        $this->email = null;
        $this->phone = null;
        $this->alt_phone = null;
        $this->dob = null;
        $this->gender = null;
        $this->father_name = null;
        $this->mother_name = null;
        $this->guar_name = null;
        $this->guar_ph = null;
        $this->parma_city = null;
        $this->parma_po = null;
        $this->parma_ps = null;
        $this->parma_dist = null;
        $this->parma_state = null;
        $this->parma_pin = null;
        $this->addr_same = false;
        $this->corrent_city = null;
        $this->corrent_po = null;
        $this->corrent_ps = null;
        $this->corrent_dist = null;
        $this->corrent_state = null;
        $this->corrent_pin = null;
        $this->course = null;
        $this->qualifi_name = null;
        $this->qualifi_mark = null;
        $this->qualifi_coll = null;
        $this->qualifi_year = null;
        $this->marksheet_img = null;
        $this->user_img = null;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'email' => 'required|email:rfc,dns|unique:admission_forms',
            'phone' => 'required|numeric|digits:10',
            'alt_phone' => 'nullable|numeric|digits:10|different:phone',
            'dob' => 'required|before:today',
            'gender' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'guar_name' => 'required',
            'guar_ph' => 'required|numeric|digits:10',
            'parma_city' => 'required',
            'parma_po' => 'required',
            'parma_ps' => 'required',
            'parma_dist' => 'required',
            'parma_state' => 'required',
            'parma_pin' => 'required|numeric|digits:6',
            'corrent_city' => 'exclude_if:addr_same,true|required',
            'corrent_po' => 'exclude_if:addr_same,true|required',
            'corrent_ps' => 'exclude_if:addr_same,true|required',
            'corrent_dist' => 'exclude_if:addr_same,true|required',
            'corrent_state' => 'exclude_if:addr_same,true|required',
            'corrent_pin' => 'exclude_if:addr_same,true|required|numeric|digits:6',
            'category' => 'required',
            'course' => 'required',
            'qualifi_name' => 'required',
            'qualifi_year' => 'required|numeric|digits:4',
            'qualifi_mark' => 'required|numeric|decimal:2',
            'qualifi_coll' => 'required',
            'marksheet_img' => 'required|image|mimes:png,jpg,jpeg|max:1024|dimensions:max_width=1000,max_height=1000,min_width=400,min_height=400',
            'user_img' => 'required|image|mimes:png,jpg,jpeg|max:1024|dimensions:max_width=400,max_height=400,min_width=100,min_height=100',
        ]);
    }

    public function UpdatedCategory($course_category_id)
    {
        $this->courses = Course::where([['course_category_id', $course_category_id], ['status', 1]])->get();
    }

    public function admissionSubmit()
    {
        $this->validate([
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'email' => 'required|email:rfc,dns|unique:admission_forms',
            'phone' => 'required|numeric|digits:10',
            'alt_phone' => 'nullable|numeric|digits:10|different:phone',
            'dob' => 'required|before:today',
            'gender' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'guar_name' => 'required',
            'guar_ph' => 'required|numeric|digits:10',
            'parma_city' => 'required',
            'parma_po' => 'required',
            'parma_ps' => 'required',
            'parma_dist' => 'required',
            'parma_state' => 'required',
            'parma_pin' => 'required|numeric|digits:6',
            'corrent_city' => 'exclude_if:addr_same,true|required',
            'corrent_po' => 'exclude_if:addr_same,true|required',
            'corrent_ps' => 'exclude_if:addr_same,true|required',
            'corrent_dist' => 'exclude_if:addr_same,true|required',
            'corrent_state' => 'exclude_if:addr_same,true|required',
            'corrent_pin' => 'exclude_if:addr_same,true|required|numeric|digits:6',
            'category' => 'required',
            'course' => 'required',
            'qualifi_name' => 'required',
            'qualifi_year' => 'required|numeric|digits:4',
            'qualifi_mark' => 'required|numeric|decimal:2',
            'qualifi_coll' => 'required',
            'marksheet_img' => 'required|image|mimes:png,jpg,jpeg|max:1024|dimensions:max_width=1000,max_height=1000,min_width=400,min_height=400',
            'user_img' => 'required|image|mimes:png,jpg,jpeg|max:1024|dimensions:max_width=400,max_height=400,min_width=100,min_height=100',
        ]);

        $admission = new AdmissionForm();
        $admission->first_name = $this->first_name;
        $admission->middle_name = $this->middle_name;
        $admission->last_name = $this->last_name;
        $admission->email = $this->email;
        $admission->phone = $this->phone;
        $admission->alt_phone = $this->alt_phone;
        $admission->dob = $this->dob;
        $admission->gender = $this->gender;
        $admission->father_name = $this->father_name;
        $admission->mother_name = $this->mother_name;
        $admission->guar_name = $this->guar_name;
        $admission->guar_ph = $this->guar_ph;

        $admission->parma_city = $this->parma_city;
        $admission->parma_po = $this->parma_po;
        $admission->parma_ps = $this->parma_ps;
        $admission->parma_dist = $this->parma_dist;
        $admission->parma_state = $this->parma_state;
        $admission->parma_pin = $this->parma_pin;

        $admission->addr_same = $this->addr_same;

        if ($this->addr_same == true) {
            $admission->corrent_city = $this->parma_city;
            $admission->corrent_po = $this->parma_po;
            $admission->corrent_ps = $this->parma_ps;
            $admission->corrent_dist = $this->parma_dist;
            $admission->corrent_state = $this->parma_state;
            $admission->corrent_pin = $this->parma_pin;
        } else {
            $admission->corrent_city = $this->corrent_city;
            $admission->corrent_po = $this->corrent_po;
            $admission->corrent_ps = $this->corrent_ps;
            $admission->corrent_dist = $this->corrent_dist;
            $admission->corrent_state = $this->corrent_state;
            $admission->corrent_pin = $this->corrent_pin;
        }

        $admission->course_id = $this->course;
        $admission->qualifi_name = $this->qualifi_name;
        $admission->qualifi_mark = $this->qualifi_mark;
        $admission->qualifi_year = $this->qualifi_year;
        $admission->qualifi_coll = $this->qualifi_coll;

        $imageName1 = Carbon::now()->timestamp . '.' . $this->marksheet_img->extension();
        $this->marksheet_img->storeAs('public/admission', $imageName1);
        $admission->marksheet_img = 'admission/' . $imageName1;

        $imageName2 = Carbon::now()->timestamp . '.' . $this->user_img->extension();
        $this->user_img->storeAs('public/admission', $imageName2);
        $admission->user_img = 'admission/' . $imageName2;

        $admission->save();

        $this->resetInput();
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('added', ['message' => 'Admission Form Submitted']);
    }

    protected $messages = [
        'first_name.required' => 'First Name is Required',
        'last_name.required' => 'Last Name is Required',
        'email.required' => 'Email is Required',
        'email.email' => 'Enter valid Email',
        'email.unique' => 'Email already taken',
        'phone.required' => 'Phone is Required',
        'phone.numeric' => 'Enter valid Phone No.',
        'phone.digits' => 'Enter 10 digits Phone No.',
        'alt_phone.numeric' => 'Enter valid Phone No.',
        'alt_phone.digits' => 'Enter 10 digits Phone No.',
        'alt_phone.different' => 'Enter different Phone No.',
        'dob.required' => 'DoB is Required',
        'dob.before' => 'Enter valid DoB',
        'gender.required' => 'Gender is Required',
        'father_name.required' => 'Father\'s Name is Required',
        'mother_name.required' => 'Mother\'s Name is Required',
        'guar_name.required' => 'Gurdian\'s Name is Required',
        'guar_ph.required' => 'Gurdian\'s Phone is Required',
        'guar_ph.numeric' => 'Enter valid Phone No.',
        'guar_ph.digits' => 'Enter 10 digits Phone No.',
        'parma_city.required' => 'Parmanent City is Required',
        'parma_po.required' => 'Parmanent P.O. is Required',
        'parma_ps.required' => 'Parmanent P.S. is Required',
        'parma_dist.required' => 'Parmanent Dist. is Required',
        'parma_state.required' => 'Parmanent State is Required',
        'parma_pin.required' => 'Parmanent PIN is Required',
        'parma_pin.numeric' => 'Enter valid PIN',
        'parma_pin.digits' => '6 digits PIN',
        'corrent_city.required' => 'Current City is Required',
        'corrent_po.required' => 'Current P.O. is Required',
        'corrent_ps.required' => 'Current P.S. is Required',
        'corrent_dist.required' => 'Current Dist. is Required',
        'corrent_state.required' => 'Current State is Required',
        'corrent_pin.required' => 'Current PIN is Required',
        'corrent_pin.numeric' => 'Enter valid PIN',
        'corrent_pin.digits' => '6 digits PIN',
        'category.required' => 'Select a Category',
        'course.required' => 'Select a Course',
        'qualifi_name.required' => 'Qualification is Required',
        'qualifi_year.numeric' => 'Enter valid Year',
        'qualifi_year.digits' => '4 digits Year',
        'qualifi_mark.required' => 'Percentage is Required',
        'qualifi_mark.numeric' => 'Enter valid Percentage',
        'qualifi_mark.decimal' => '2 decial points, eg 45.56',
        'qualifi_coll.required' => 'Board is Required',
        'marksheet_img.required' => 'Marksheet is Required',
        'marksheet_img.image' => 'Only Image accepted',
        'marksheet_img.mimes' => 'Only jpg,jepg,png accepted',
        'marksheet_img.max' => 'Not more than 200KB',
        'marksheet_img.dimensions' => 'Max 1000 x 1000 px, Min 400 x 400 px',
        'user_img.required' => 'Photo is Required',
        'user_img.image' => 'Only Image accepted',
        'user_img.mimes' => 'Only jpg,jepg,png accepted',
        'user_img.max' => 'Not more than 200KB',
        'user_img.dimensions' => 'Max 400 x 400 px, Min 100 x 100 px',
    ];

    public function render()
    {
        $header = Header::find(1);
        $courseCategories = CourseCategory::where('status', 1)->get();

        $courseName = Course::where('id', $this->course)->first();

        return view('livewire.front-admission', [
            'header' => $header,
            'courseCategories' => $courseCategories,
            'courseName' => $courseName,
        ]);
    }
}

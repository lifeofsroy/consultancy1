<div>
    @push('title')
        Admission
    @endpush

    @push('style')
        <link href="{{ asset('assets/form/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/form/css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/form/css/fontawesome-all.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/form/css/style.css') }}" rel="stylesheet">
    @endpush

    <!-- beardcrumb -->
    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Admission Form</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Admission</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="wrapper clearfix" style="max-width: 1500px; padding: 0 15px; padding-bottom: 50px">
        <!--multisteps-form-->
        <div class="multisteps-form">

            <!--progress bar-->
            <div class="row">
                <div class="col-12 col-lg-12 ml-auto mr-auto mb-5 mt-1">
                    <div class="multisteps-form__progress" style="padding: 20px 10px;">
                        <button class="multisteps-form__progress-btn js-active" wire:ignore.self>
                            <span class="{{ $errors->any() ? 'text-danger' : '' }}">Details</span>
                        </button>
                        <button class="multisteps-form__progress-btn" wire:ignore.self>
                            <span class="{{ $errors->any() ? 'text-danger' : '' }}">Address</span>
                        </button>
                        <button class="multisteps-form__progress-btn" wire:ignore.self>
                            <span class="{{ $errors->any() ? 'text-danger' : '' }}">Qualification</span>
                        </button>
                        <button class="multisteps-form__progress-btn" wire:ignore.self>
                            <span class="{{ $errors->any() ? 'text-danger' : '' }}">Preview</span>
                        </button>
                    </div>
                </div>
            </div>

            <!--form panels-->
            <div class="row">
                <div class="col-12 col-lg-12 m-auto">
                    <form class="multisteps-form__form" id="wizard" method="post" wire:submit.prevent="admissionSubmit">

                        <!--single form panel-->
                        <div class="multisteps-form__panel js-active" data-animation="slideVert" wire:ignore.self>
                            <div class="inner pb-100">
                                <div class="wizard-content-form">
                                    <div class="wizard-form-field">

                                        <fieldset class="form-group border p-3">
                                            <legend class="text-warning mb-4 w-auto px-2">Basic Details</legend>

                                            <div class="row">
                                                <div class="col-md-4 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label">
                                                        <input class="form-control {{ $errors->first('first_name') ? ' is-invalid' : '' }}"
                                                            type="text" placeholder="First Name" wire:model.lazy="first_name">
                                                        <label>First Name</label>
                                                        @error('first_name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label">
                                                        <input class="form-control {{ $errors->first('middle_name') ? ' is-invalid' : '' }}"
                                                            type="text" placeholder="Middle Name" wire:model.lazy="middle_name">
                                                        <label>Middle Name</label>
                                                        @error('middle_name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label">
                                                        <input class="form-control {{ $errors->first('last_name') ? ' is-invalid' : '' }}"
                                                            type="text" placeholder="Last Name" wire:model.lazy="last_name">
                                                        <label>Last Name</label>
                                                        @error('last_name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row my-4">
                                                <div class="col-md-8 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label">
                                                        <input class="form-control {{ $errors->first('email') ? ' is-invalid' : '' }}" type="email"
                                                            placeholder="Email Address" wire:model.lazy="email">
                                                        <label>Email Address</label>
                                                        @error('email')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label n-select-option mt-0">
                                                        <select class="form-control {{ $errors->first('gender') ? ' is-invalid' : '' }}"
                                                            wire:model.lazy="gender">
                                                            <option value="" hidden>Gender</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                        @error('gender')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label">
                                                        <input class="form-control {{ $errors->first('phone') ? ' is-invalid' : '' }}" type="text"
                                                            placeholder="Phone Number" wire:model.lazy="phone">
                                                        <label>Phone Number</label>
                                                        @error('phone')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label">
                                                        <input class="form-control {{ $errors->first('alt_phone') ? ' is-invalid' : '' }}"
                                                            type="text" placeholder="Alternate Phone Number" wire:model.lazy="alt_phone">
                                                        <label>Alternate Phone Number</label>
                                                        @error('alt_phone')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label">
                                                        <input class="form-control {{ $errors->first('dob') ? ' is-invalid' : '' }}" type="date"
                                                            autofocus wire:model.lazy="dob">
                                                        <label>Dare of Birth</label>
                                                        @error('dob')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </fieldset>

                                        <fieldset class="form-group border p-3">
                                            <legend class="text-warning mb-4 w-auto px-2">Gurdian Details</legend>

                                            <div class="row my-2 mb-4">
                                                <div class="col-md-6">
                                                    <div class="wizard-form-input position-relative form-group has-float-label">
                                                        <input class="form-control {{ $errors->first('father_name') ? ' is-invalid' : '' }}"
                                                            type="text" placeholder="Father's Name" wire:model.lazy="father_name">
                                                        <label>Father's Name</label>
                                                        @error('father_name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label">
                                                        <input class="form-control {{ $errors->first('mother_name') ? ' is-invalid' : '' }}"
                                                            type="text" placeholder="Mother's Name" wire:model.lazy="mother_name">
                                                        <label>Mother's Name</label>
                                                        @error('mother_name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-8 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label">
                                                        <input class="form-control {{ $errors->first('guar_name') ? ' is-invalid' : '' }}"
                                                            type="text" placeholder="Gurdian's Name" wire:model.lazy="guar_name">
                                                        <label>Gurdian's Name</label>
                                                        @error('guar_name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label">
                                                        <input class="form-control {{ $errors->first('guar_ph') ? ' is-invalid' : '' }}"
                                                            type="text" placeholder="Gurdian's Phone" wire:model.lazy="guar_ph">
                                                        <label>Gurdian's Phone</label>
                                                        @error('guar_ph')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </fieldset>

                                    </div>
                                </div>

                                <div class="wizard-footer">
                                    <div class="actions">
                                        <ul>
                                            <li><span class="js-btn-next" title="NEXT">NEXT <i class="fa fa-arrow-right"></i></span></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--single form panel-->
                        <div class="multisteps-form__panel" data-animation="slideVert" wire:ignore.self>
                            <div class="inner pb-100">
                                <div class="wizard-content-form">
                                    <div class="wizard-form-field">

                                        <fieldset class="form-group border p-3">
                                            <legend class="text-warning mb-4 w-auto px-2">Parmanent Address</legend>

                                            <div class="row my-4">
                                                <div class="col-md-6 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label">
                                                        <input class="form-control {{ $errors->first('parma_city') ? ' is-invalid' : '' }}"
                                                            type="text" placeholder="City / Village" wire:model.lazy="parma_city">
                                                        <label>City / Village</label>
                                                        @error('parma_city')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label">
                                                        <input class="form-control {{ $errors->first('parma_po') ? ' is-invalid' : '' }}"
                                                            type="text" placeholder="Post Office" wire:model.lazy="parma_po">
                                                        <label>Post Office</label>
                                                        @error('parma_po')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row my-4">
                                                <div class="col-md-6 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label">
                                                        <input class="form-control {{ $errors->first('parma_ps') ? ' is-invalid' : '' }}"
                                                            type="text" placeholder="Police Station" wire:model.lazy="parma_ps">
                                                        <label>Police Station</label>
                                                        @error('parma_ps')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label">
                                                        <input class="form-control {{ $errors->first('parma_dist') ? ' is-invalid' : '' }}"
                                                            type="text" placeholder="District" wire:model.lazy="parma_dist">
                                                        <label>District</label>
                                                        @error('parma_dist')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-md-6 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label">
                                                        <input class="form-control {{ $errors->first('parma_state') ? ' is-invalid' : '' }}"
                                                            type="text" placeholder="State" wire:model.lazy="parma_state">
                                                        <label>State</label>
                                                        @error('parma_state')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label">
                                                        <input class="form-control {{ $errors->first('parma_pin') ? ' is-invalid' : '' }}"
                                                            type="text" placeholder="PIN" wire:model.lazy="parma_pin">
                                                        <label>PIN</label>
                                                        @error('parma_pin')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </fieldset>

                                        <fieldset class="form-group border p-3">
                                            <legend class="text-warning mb-4 w-auto px-2">Current Address</legend>

                                            <div class="n-activity">
                                                <label>
                                                    <input class="net-check" type="checkbox" wire:model="addr_same">
                                                    <span class="n-title">Same as Parmanent ?</span>
                                                    <span class="net-check-border"></span>
                                                </label>
                                            </div>

                                            @if ($addr_same == false)
                                                <div class="row my-4">
                                                    <div class="col-md-6 my-2">
                                                        <div class="wizard-form-input position-relative form-group has-float-label">
                                                            <input class="form-control {{ $errors->first('corrent_city') ? ' is-invalid' : '' }}"
                                                                type="text" placeholder="City / Village" wire:model.lazy="corrent_city">
                                                            <label>City / Village</label>
                                                            @error('corrent_city')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 my-2">
                                                        <div class="wizard-form-input position-relative form-group has-float-label">
                                                            <input class="form-control {{ $errors->first('corrent_po') ? ' is-invalid' : '' }}"
                                                                type="text" placeholder="Post Office" wire:model.lazy="corrent_po">
                                                            <label>Post Office</label>
                                                            @error('corrent_po')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row my-4 my-2">
                                                    <div class="col-md-6">
                                                        <div class="wizard-form-input position-relative form-group has-float-label">
                                                            <input class="form-control {{ $errors->first('corrent_ps') ? ' is-invalid' : '' }}"
                                                                type="text" placeholder="Police Station" wire:model.lazy="corrent_ps">
                                                            <label>Police Station</label>
                                                            @error('corrent_ps')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 my-2">
                                                        <div class="wizard-form-input position-relative form-group has-float-label">
                                                            <input class="form-control {{ $errors->first('corrent_dist') ? ' is-invalid' : '' }}"
                                                                type="text" placeholder="District" wire:model.lazy="corrent_dist">
                                                            <label>District</label>
                                                            @error('corrent_dist')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row my-2 mt-4">
                                                    <div class="col-md-6">
                                                        <div class="wizard-form-input position-relative form-group has-float-label">
                                                            <input class="form-control {{ $errors->first('corrent_state') ? ' is-invalid' : '' }}"
                                                                type="text" placeholder="State" wire:model.lazy="corrent_state">
                                                            <label>State</label>
                                                            @error('corrent_state')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 my-2">
                                                        <div class="wizard-form-input position-relative form-group has-float-label">
                                                            <input class="form-control {{ $errors->first('corrent_pin') ? ' is-invalid' : '' }}"
                                                                type="text" placeholder="PIN" wire:model.lazy="corrent_pin">
                                                            <label>PIN</label>
                                                            @error('corrent_pin')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="wizard-footer">
                                    <div class="actions">
                                        <ul>
                                            <li><span class="js-btn-prev" title="BACK"><i class="fa fa-arrow-left"></i> PREVIOUS</span></li>
                                            <li><span class="js-btn-next" title="NEXT">NEXT <i class="fa fa-arrow-right"></i></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--single form panel-->
                        <div class="multisteps-form__panel" data-animation="slideVert" wire:ignore.self>
                            <div class="inner pb-100">
                                <div class="wizard-content-form">
                                    <div class="wizard-form-field">

                                        <fieldset class="form-group border p-3">
                                            <legend class="text-warning mb-4 w-auto px-2">Preferred Courses</legend>

                                            <div class="row my-4">
                                                <div class="col-md-6 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label n-select-option mt-0">
                                                        <select class="form-control {{ $errors->first('category') ? ' is-invalid' : '' }}"
                                                            wire:model="category">
                                                            <option value="" hidden>Course Category</option>
                                                            @foreach ($courseCategories as $courseCategory)
                                                                <option value="{{ $courseCategory->id }}">{{ $courseCategory->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                @if (!is_null($courses))
                                                    <div class="col-md-6 my-2">
                                                        <div
                                                            class="wizard-form-input position-relative form-group has-float-label n-select-option mt-0">
                                                            <select class="form-control {{ $errors->first('course') ? ' is-invalid' : '' }}"
                                                                wire:model="course">
                                                                <option value="" hidden>Select Course</option>
                                                                @foreach ($courses as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('course')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>

                                        </fieldset>


                                        <fieldset class="form-group border p-3">
                                            <legend class="text-warning mb-4 w-auto px-2">Qualification</legend>

                                            <div class="row my-4">
                                                <div class="col-md-6 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label n-select-option mt-0">
                                                        <select class="form-control {{ $errors->first('qualifi_name') ? ' is-invalid' : '' }}"
                                                            wire:model.lazy="qualifi_name">
                                                            <option value="" hidden>Last Qualification</option>
                                                            <option value="B.Sc">B.Sc</option>
                                                            <option value="M.Sc">M.Sc</option>
                                                            <option value="B.A">B.A</option>
                                                            <option value="M.A">M.A</option>
                                                        </select>
                                                        @error('qualifi_name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label">
                                                        <input class="form-control {{ $errors->first('qualifi_mark') ? ' is-invalid' : '' }}"
                                                            type="text" placeholder="Percentage" wire:model.lazy="qualifi_mark">
                                                        <label>Percentage (Value Only)</label>
                                                        @error('qualifi_mark')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row my-4">
                                                <div class="col-md-9 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label">
                                                        <input class="form-control {{ $errors->first('qualifi_coll') ? ' is-invalid' : '' }}"
                                                            type="text" placeholder="Board" wire:model.lazy="qualifi_coll">
                                                        <label>Board</label>
                                                        @error('qualifi_coll')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-3 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label">
                                                        <input class="form-control {{ $errors->first('qualifi_year') ? ' is-invalid' : '' }}"
                                                            type="text" placeholder="Year of Passing" wire:model.lazy="qualifi_year">
                                                        <label>Year of Passing</label>
                                                        @error('qualifi_year')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </fieldset>

                                        <fieldset class="form-group border p-3">
                                            <legend class="text-warning mb-4 w-auto pb-4">Upload Documents</legend>

                                            <div class="row mt-4">
                                                <div class="col-md-6 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label">
                                                        <input class="form-control {{ $errors->first('marksheet_img') ? ' is-invalid' : '' }}"
                                                            type="file" accept="image/png, image/jpeg, image/jpg" placeholder="Upload Marksheet"
                                                            wire:model.lazy="marksheet_img">
                                                        <label>Upload Marksheet</label>
                                                        @error('marksheet_img')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    @if ($marksheet_img)
                                                        <div class="my-auto mx-4">
                                                            <div class="m-2">
                                                                <img src="{{ $marksheet_img->temporaryUrl() }}" width="150px" />
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="col-md-6 my-2">
                                                    <div class="wizard-form-input position-relative form-group has-float-label">
                                                        <input class="form-control {{ $errors->first('user_img') ? ' is-invalid' : '' }}"
                                                            type="file" accept="image/png, image/jpeg, image/jpg"
                                                            placeholder="Upload Your Photo" wire:model.lazy="user_img">
                                                        <label>Upload Your Photo</label>
                                                        @error('user_img')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    @if ($user_img)
                                                        <div class="my-auto mx-4">
                                                            <div class="m-2">
                                                                <img src="{{ $user_img->temporaryUrl() }}" width="150px" />
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                        </fieldset>

                                    </div>
                                </div>

                                <div class="wizard-footer">
                                    <div class="actions">
                                        <ul>
                                            <li><span class="js-btn-prev" title="BACK"><i class="fa fa-arrow-left"></i> PREVIOUS</span></li>
                                            <li><span class="js-btn-next" title="NEXT">NEXT <i class="fa fa-arrow-right"></i></span></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--single form panel-->
                        <div class="multisteps-form__panel" data-animation="slideVert" wire:ignore.self>
                            <div class="inner pb-100">

                                <div class="wizard-content-item text-center">
                                    <h2>Application Preview</h2>
                                    <p>Check all the details before submission.</p>
                                </div>

                                <div class="wizard-submit-file-content wizard-content-form">
                                    <div class="row mt-4">

                                        <h3 class="ps-3 text-info mb-2">Basic Details</h3>

                                        <div class="col-md-6 my-2">
                                            <div class="n-checked">
                                                <span>Name</span>
                                                <label>
                                                    <input type="radio" value="Daily Creative Challenge">
                                                    <span class="checkmark">{{ $first_name }} {{ $middle_name }} {{ $last_name }}</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 my-2">
                                            <div class="n-checked">
                                                <span>Email</span>
                                                <label>
                                                    <input type="radio" value="Daily Creative Challenge">
                                                    <span class="checkmark">{{ $email }}</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 my-2">
                                            <div class="n-checked">
                                                <span>Phone</span>
                                                <label>
                                                    <input type="radio" value="Daily Creative Challenge">
                                                    <span class="checkmark">{{ $phone }},&nbsp; {{ $alt_phone }}</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 my-2">
                                            <div class="n-checked">
                                                <span>Date of Birth</span>
                                                <label>
                                                    <input type="radio" value="Daily Creative Challenge">
                                                    <span class="checkmark">{{ date('jS M y', strtotime($dob)) }}</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 my-2">
                                            <div class="n-checked">
                                                <span>Gender</span>
                                                <label>
                                                    <input type="radio" value="Daily Creative Challenge">
                                                    <span class="checkmark">{{ $gender }}</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 my-2">
                                            <div class="n-checked">
                                                <span>Father's Name</span>
                                                <label>
                                                    <input type="radio" value="Daily Creative Challenge">
                                                    <span class="checkmark">{{ $father_name }}</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 my-2">
                                            <div class="n-checked">
                                                <span>Mother's Name</span>
                                                <label>
                                                    <input type="radio" value="Daily Creative Challenge">
                                                    <span class="checkmark">{{ $mother_name }}</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 my-2">
                                            <div class="n-checked">
                                                <span>Guardian's Name</span>
                                                <label>
                                                    <input type="radio" value="Daily Creative Challenge">
                                                    <span class="checkmark">{{ $guar_name }}</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 my-2">
                                            <div class="n-checked">
                                                <span>Guardian's Phone</span>
                                                <label>
                                                    <input type="radio" value="Daily Creative Challenge">
                                                    <span class="checkmark">{{ $guar_ph }}</span>
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row mt-4">

                                        @if ($addr_same == false)
                                            <h3 class="ps-3 text-info mb-2">Parmanent Address</h3>
                                        @else
                                            <h3 class="ps-3 text-info mb-2">Address</h3>
                                        @endif

                                        <div class="col-md-6 my-2">
                                            <div class="n-checked">
                                                <span>City / Village</span>
                                                <label>
                                                    <input type="radio" value="Daily Creative Challenge">
                                                    <span class="checkmark">{{ $parma_city }}</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 my-2">
                                            <div class="n-checked">
                                                <span>Post Office</span>
                                                <label>
                                                    <input type="radio" value="Daily Creative Challenge">
                                                    <span class="checkmark">{{ $parma_po }}</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 my-2">
                                            <div class="n-checked">
                                                <span>Police Station</span>
                                                <label>
                                                    <input type="radio" value="Daily Creative Challenge">
                                                    <span class="checkmark">{{ $parma_ps }}</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 my-2">
                                            <div class="n-checked">
                                                <span>District</span>
                                                <label>
                                                    <input type="radio" value="Daily Creative Challenge">
                                                    <span class="checkmark">{{ $parma_dist }}</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 my-2">
                                            <div class="n-checked">
                                                <span>State</span>
                                                <label>
                                                    <input type="radio" value="Daily Creative Challenge">
                                                    <span class="checkmark">{{ $parma_state }}</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 my-2">
                                            <div class="n-checked">
                                                <span>PIN</span>
                                                <label>
                                                    <input type="radio" value="Daily Creative Challenge">
                                                    <span class="checkmark">{{ $parma_pin }}</span>
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    @if ($addr_same == false)
                                        <div class="row mt-4">

                                            <h3 class="ps-3 text-info mb-2">Current Address</h3>

                                            <div class="col-md-6 my-2">
                                                <div class="n-checked">
                                                    <span>City / Village</span>
                                                    <label>
                                                        <input type="radio" value="Daily Creative Challenge">
                                                        <span class="checkmark">{{ $corrent_city }}</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-6 my-2">
                                                <div class="n-checked">
                                                    <span>Post Office</span>
                                                    <label>
                                                        <input type="radio" value="Daily Creative Challenge">
                                                        <span class="checkmark">{{ $corrent_po }}</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-6 my-2">
                                                <div class="n-checked">
                                                    <span>Police Station</span>
                                                    <label>
                                                        <input type="radio" value="Daily Creative Challenge">
                                                        <span class="checkmark">{{ $corrent_ps }}</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-6 my-2">
                                                <div class="n-checked">
                                                    <span>District</span>
                                                    <label>
                                                        <input type="radio" value="Daily Creative Challenge">
                                                        <span class="checkmark">{{ $corrent_dist }}</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-6 my-2">
                                                <div class="n-checked">
                                                    <span>State</span>
                                                    <label>
                                                        <input type="radio" value="Daily Creative Challenge">
                                                        <span class="checkmark">{{ $corrent_state }}</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-6 my-2">
                                                <div class="n-checked">
                                                    <span>PIN</span>
                                                    <label>
                                                        <input type="radio" value="Daily Creative Challenge">
                                                        <span class="checkmark">{{ $corrent_pin }}</span>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    @endif

                                    <div class="row mt-4">

                                        <h3 class="ps-3 text-info mb-2">Qualification</h3>

                                        <div class="col-md-6 my-2">
                                            <div class="n-checked">
                                                <span>Last Qualification</span>
                                                <label>
                                                    <input type="radio" value="Daily Creative Challenge">
                                                    <span class="checkmark">{{ $qualifi_name }}</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 my-2">
                                            <div class="n-checked">
                                                <span>Got Percentage</span>
                                                <label>
                                                    <input type="radio" value="Daily Creative Challenge">
                                                    <span class="checkmark">{{ $qualifi_mark }}</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 my-2">
                                            <div class="n-checked">
                                                <span>Name of Board</span>
                                                <label>
                                                    <input type="radio" value="Daily Creative Challenge">
                                                    <span class="checkmark">{{ $qualifi_coll }}</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 my-2">
                                            <div class="n-checked">
                                                <span>Year of Passing</span>
                                                <label>
                                                    <input type="radio" value="Daily Creative Challenge">
                                                    <span class="checkmark">{{ $qualifi_year }}</span>
                                                </label>
                                            </div>
                                        </div>


                                        <div class="col-md-6 my-2">
                                            <div class="n-checked">
                                                <span>Preferred Course</span>
                                                <label>
                                                    <input type="radio" value="Daily Creative Challenge">
                                                    @if (!is_null($courseName))
                                                        <span class="checkmark">{{ $courseName->title }}</span>
                                                    @endif
                                                </label>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row mt-4">

                                        <h3 class="text-info mb-2 p-4">Uploaded Files</h3>

                                        <div class="col-md-6 my-2">
                                            <h5 class="ps-4 text-primary">Marksheet</h5>
                                            @if ($marksheet_img)
                                                <div class="my-auto mx-4">
                                                    <div class="m-2">
                                                        <img src="{{ $marksheet_img->temporaryUrl() }}" width="100px" />
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-md-6 my-2">
                                            <h5 class="ps-4 text-primary">Photo</h5>
                                            @if ($user_img)
                                                <div class="my-auto mx-4">
                                                    <div class="m-2">
                                                        <img src="{{ $user_img->temporaryUrl() }}" width="100px" />
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>

                                <div class="wizard-footer">
                                    @if ($errors->any())
                                        <div class="all-error text-center">
                                            <h3 class="text-warning mb-3">ERRORS FOUND</h3>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li class="error-list">{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="actions">
                                        <ul>
                                            <li><span class="js-btn-prev" title="BACK"><i class="fa fa-arrow-left"></i> PREVIOUS</span></li>
                                            <li>
                                                <button id="submit-form" type="submit" title="NEXT">SUMBIT <i class="fa fa-arrow-right"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

    @push('script')
        <script src="{{ asset('assets/form/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('assets/form/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/form/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/form/js/main.js') }}"></script>
        <script>
            $("#files").change(function() {
                filename = this.files[0].name
                console.log(filename);
            });
        </script>

        <x-addedalert />
    @endpush
</div>

<div>
    @push('title')
        FAQ
    @endpush

    <!-- beardcrumb -->
    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Common Questions</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>FAQ</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="space">
        <div class="container">
            <div class="row">
                @foreach ($faqs->chunk(2) as $chunk)
                    <div class="col-xl-6">
                        <div class="accordion-area accordion" id="faqAccordion">
                            @foreach ($chunk as $index => $faq)
                                <div class="accordion-card style2 {{ $index == 3 ? 'active' : '' }} my-3">
                                    <div class="accordion-header" id="collapse-item-{{ $faq->id }}">
                                        <button class="accordion-button {{ $index == 3 ? '' : 'collapsed' }}" data-bs-toggle="collapse"
                                            data-bs-target="#collapse-{{ $faq->id }}" type="button"
                                            aria-expanded="{{ $index == 3 ? 'true' : 'false' }}" aria-controls="collapse-{{ $faq->id }}">
                                            {{ $faq->question }}
                                        </button>
                                    </div>

                                    <div class="accordion-collapse {{ $index == 3 ? 'show' : '' }} collapse" id="collapse-{{ $faq->id }}"
                                        data-bs-parent="#faqAccordion" aria-labelledby="collapse-item-{{ $faq->id }}">
                                        <div class="accordion-body">
                                            <p class="faq-text">{{ $faq->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="space" id="contact-sec" data-bg-src="{{ asset('assets/img/bg/form_bg_1.jpg') }}">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title">
                    <img src="{{ asset('assets/img/theme-img/title_shape_2.svg') }}" alt="shape">
                    QUERY NOT LISTED ?
                </span>

                <h2 class="sec-title">Ask Your <span class="text-theme">Question</span></h2>
            </div>

            @auth
                <form class="quote-form" wire:submit.prevent="faqForm">
                    <div class="row">

                        <div class="form-group col-md-6">
                            <select class="{{ $errors->first('category') ? ' is-invalid' : '' }} form-select" id="category" name="category"
                                wire:model.lazy="category">
                                <option value="" selected="selected" hidden>Select Category</option>
                                <option value="Service">Service</option>
                                <option value="Course">Course</option>
                                <option value="Institution">Institution</option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <input class="form-control {{ $errors->first('more') ? ' is-invalid' : '' }}" id="more" name="more" type="text"
                                placeholder="Anything Else !! (optional)" wire:model.lazy="more">
                            <i class="fal fa-file-lines"></i>
                            @error('more')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <textarea class="form-control {{ $errors->first('question') ? ' is-invalid' : '' }}" id="question" name="question" cols="30" rows="3"
                                placeholder="Write Your Message" wire:model.lazy="question"></textarea>
                            <i class="fal fa-pencil me-3"></i>
                            @error('question')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-btn col-12 text-center">
                            <button class="as-btn" type="submit">Submit My Question<i class="fa-regular fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>
                    <p class="form-messages mb-0 mt-3"></p>
                </form>
            @else
                <div class="form-btn col-12 text-center">
                    <a href="{{ route('login') }}">
                        <button class="as-btn">Login To Submit Question
                            <i class="fa-regular fa-arrow-right ms-2"></i>
                        </button>
                    </a>
                </div>
            @endauth
        </div>
    </div>

    @push('script')
        <x-addedalert />
    @endpush
</div>

<div>
    @push('title')
        {{ $service->title }}
    @endpush

    <!-- beardcrumb -->
    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">{{ $service->title }}</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('service.category') }}">Services</a></li>
                </ul>
            </div>
        </div>
    </div>

    <section class="space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-8">
                    <div class="page-single">
                        <div class="page-img">
                            <img src="{{ asset('assets/img/service/service_details.jpg') }}" alt="Service Image">
                        </div>
                        <div class="page-content">
                            <h2 class="h3 page-title">{{ $service->title }}</h2>
                            <p>{!! $service->desc !!}</p>

                            <h3 class="h4 mt-35 mb-4">Questions About Service</h3>
                            <div class="accordion-area accordion" id="faqAccordion">
                                @foreach ($service->faqs as $faq)
                                    <div class="accordion-card style2">
                                        <div class="accordion-header" id="faq{{ $faq->id }}">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapse-{{ $faq->id }}" type="button" aria-expanded="false"
                                                aria-controls="collapse-{{ $faq->id }}">
                                                {{ $faq->question }}
                                            </button>
                                        </div>

                                        <div class="accordion-collapse collapse" id="collapse-{{ $faq->id }}" data-bs-parent="#faqAccordion"
                                            aria-labelledby="faq{{ $faq->id }}">
                                            <div class="accordion-body">
                                                <p class="faq-text">{{ $faq->answer }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-4">
                    <aside class="sidebar-area">
                        <div class="widget widget_nav_menu">
                            <h3 class="widget_title">All Services</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a class="{{ $category->name == $service->serviceCategory->name ? 'text-danger' : '' }}"
                                                href="{{ route('service.by.category', ['servicecat_slug' => $category->slug]) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="widget widget_download">
                            <h4 class="widget_title">Download Brochure</h4>
                            <div class="download-widget-wrap">
                                <span class="as-btn" role='button' wire:click.prevent="export">
                                    <i class="fa-light fa-file-pdf me-2"></i>DOWNLOAD PDF
                                </span>
                            </div>
                        </div>

                        <div class="widget widget_banner" data-bg-src="{{ asset('assets/img/bg/widget_banner.jpg') }}">
                            <div class="widget-banner">
                                <h2 class="title">Need Help?</h2>
                                <a class="as-btn style3" href="{{ route('contact') }}">
                                    Send Us Your Query
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

    <!-- comments -->
    @if ($serviceComments->count() > 0)
        <!-- comments -->
        <section class="bg-top-center space" wire:ignore>
            <div class="container">
                <div class="title-area text-center">
                    <div class="shadow-title color2">COMMENTS</div>
                </div>
                <div class="row slider-shadow as-carousel" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="1"
                    data-arrows="true">
                    @foreach ($serviceComments as $comment)
                        <div class="col-lg-6">
                            <div class="testi-grid">
                                <div class="testi-grid_img">
                                    <img src="{{ asset('storage') }}/{{ $comment->user->profile_photo_path }}" alt="Avater">

                                    <div class="testi-grid_quote">
                                        <img src="{{ asset('assets/img/icon/quote_left_3.svg') }}" alt="quote">
                                    </div>
                                </div>

                                <div class="testi-grid_review">
                                    @for ($i = 1; $i <= $comment->rating; $i++)
                                        <i class="fa-solid fa-star-sharp"></i>
                                    @endfor
                                </div>

                                <div class="testi-grid_content">
                                    <p class="testi-grid_text">{{ $comment->desc }}</p>
                                    <h3 class="box-title">{{ $comment->user->name }}</h3>
                                    <p class="testi-grid_desig">{{ $comment->user->designation }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <div class="space" id="contact-sec" data-bg-src="{{ asset('assets/img/bg/form_bg_1.jpg') }}">
        <div class="container">
            <div class="title-area text-center">
                <h2 class="sec-title">Submit Your <span class="text-theme">Comment</span> Here</h2>
            </div>

            @auth
                <form class="quote-form" wire:submit.prevent="commentForm">
                    <div class="row">

                        <div class="form-group col-md-12">
                            <select class="{{ $errors->first('rating') ? ' is-invalid' : '' }} form-select" id="rating" name="rating"
                                wire:model="rating">
                                <option value="" selected="selected" hidden>Select Rating</option>
                                <option value="5">Excellent</option>
                                <option value="4">Very Good</option>
                                <option value="3">Good</option>
                                <option value="2">Acceptable</option>
                                <option value="1">Poor</option>
                            </select>
                            @error('rating')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <textarea class="form-control {{ $errors->first('desc') ? ' is-invalid' : '' }}" id="desc" name="desc" cols="30" rows="3"
                                placeholder="Write Your Comment" wire:model.lazy="desc"></textarea>
                            <i class="fal fa-pencil me-3"></i>
                            @error('desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-btn col-12 text-center">
                            <button class="as-btn" type="submit">Submit My Comment<i class="fa-regular fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>
                    <p class="form-messages mb-0 mt-3"></p>
                </form>
            @else
                <div class="form-btn col-12 text-center">
                    <a href="{{ route('login') }}">
                        <button class="as-btn">Login To Submit Comment
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

<div>
    @push('title')
        {{ $institution->name }}
    @endpush

    <!-- beardcrumb -->
    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">{{ $institution->name }}</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Institutions</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-8">
                    <div class="page-single">
                        <div class="page-img"><img src="{{ asset('storage') }}/{{ $institution->image }}" alt="Project Image">
                        </div>
                        <div class="page-content">
                            <h2 class="h3 page-title">{{ $institution->name }}</h2>
                            <p class="">{!! $institution->desc !!}</p>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-lg-4">
                    <aside class="sidebar-area">
                        <div class="widget widget_info" style="padding: var(--widget-padding-y, 30px) var(--widget-padding-x, 20px)">
                            <h3 class="widget_title">Institution Details</h3>
                            <div class="project-info-list">

                                @if (!$institution->location == null)
                                    <div class="contact-feature">
                                        <div class="icon-btn"><i class="fa-solid fa-location-dot"></i></div>
                                        <div class="media-body">
                                            <p class="contact-feature_label">Location:</p>
                                            <span class="contact-feature_link">{{ $institution->location }}</span>
                                        </div>
                                    </div>
                                @endif

                                @if (!$institution->type == null)
                                    <div class="contact-feature">
                                        <div class="icon-btn"><i class="fab fa-uikit"></i></div>
                                        <div class="media-body">
                                            <p class="contact-feature_label">Type:</p>
                                            <span class="contact-feature_link">{{ $institution->type }}</span>
                                        </div>
                                    </div>
                                @endif

                                @if (!$institution->contact == null)
                                    <div class="contact-feature">
                                        <div class="icon-btn"><i class="fas fa-phone"></i></div>
                                        <div class="media-body">
                                            <p class="contact-feature_label">Contact</p>
                                            <span class="contact-feature_link">{{ $institution->contact }}</span>
                                        </div>
                                    </div>
                                @endif

                                @if (!$institution->website == null)
                                    <div class="contact-feature">
                                        <div class="icon-btn"><i class="fas fa-link"></i></div>
                                        <div class="media-body">
                                            <p class="contact-feature_label">Website:</p>
                                            <a class="contact-feature_link" href="{{ $institution->website }}" target="_blank">Visit Here
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        @if ($institution->courses->count() > 0)
                            <div class="widget widget_nav_menu" style="padding: 10px;">
                                <div class="menu-all-pages-container">
                                    <div class="price-card">
                                        <div class="price-card_top mb-4">
                                            <h3 class="price-card_title">Courses</h3>
                                            <p class="price-card_text" style="border:none; padding: 0 28px; margin-bottom: 0;">This Institution has
                                                best courses</p>
                                            <div class="particle">
                                                <div class="price-particle" id="price-p1"></div>
                                            </div>
                                        </div>
                                        <div class="price-card_content" style="padding: var(--space-y) var(--space-x)/2;">
                                            <div class="checklist" style="margin: 0">
                                                <ul>
                                                    @foreach ($institution->courses as $courseitem)
                                                        <a href="{{ route('facility.course.detail', ['course_slug' => $courseitem->slug]) }}">
                                                            <li><i class="fas fa-circle-check"></i> {{ $courseitem->title }}</li>
                                                        </a>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (!$institution->doc == null)
                            <div class="widget widget_download">
                                <h4 class="widget_title">Download Document</h4>
                                <div class="download-widget-wrap">
                                    <span class="as-btn" role='button' wire:click.prevent="export">
                                        <i class="fa-light fa-file-pdf me-2"></i>DOWNLOAD PDF
                                    </span>
                                </div>
                            </div>
                        @endif

                        <div class="widget widget_banner" style="padding: 10px; background-color: #f5f5f5;">
                            <div class="widget-banner">
                                <iframe
                                    src="{{$institution->mapurl}}"
                                    style="border:0;" height="450" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </section>

    <!-- comments -->
    @if ($institutionComments->count() > 0)
        <!-- comments -->
        <section class="bg-top-center space" wire:ignore>
            <div class="container">
                <div class="title-area text-center">
                    <div class="shadow-title color2">COMMENTS</div>
                </div>
                <div class="row slider-shadow as-carousel" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="1"
                    data-arrows="true">
                    @foreach ($institutionComments as $comment)
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

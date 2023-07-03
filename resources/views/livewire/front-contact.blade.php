<div>
    @push('title')
        Contact Us
    @endpush

    <!-- beardcrumb -->
    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Contact Us</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="space">
        <div class="container">
            <div class="row gy-4">
                <div class="col-xl-4 col-md-6">
                    <div class="contact-info">
                        <div class="contact-info_icon"><i class="fas fa-phone"></i></div>
                        <div class="media-body">
                            <h4 class="box-title">
                                Call Us Anytime
                            </h4>
                            <span class="contact-info_text">
                                <a href="tel:+91{{ $info->phone }}">+91-{{ $info->phone }}</a>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="contact-info">
                        <div class="contact-info_icon"><i class="fas fa-envelope"></i></div>
                        <div class="media-body">
                            <h4 class="box-title">
                                Send Us Email
                            </h4>
                            <span class="contact-info_text">
                                <a href="mailto:{{ $info->email }}">{{ $info->email }}</a>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="contact-info">
                        <div class="contact-info_icon"><i class="fas fa-location-dot"></i></div>
                        <div class="media-body">
                            <h4 class="box-title">Our Office Address</h4>
                            <span class="contact-info_text">{{ $info->address }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-smoke space" data-bg-src="{{ asset('assets/img/bg/contact_bg_1.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="title-area mb-35 text-xl-start text-center">
                        <span class="sub-title">
                            <img src="{{ asset('assets/img/theme-img/title_shape_2.svg') }}" alt="shape">
                            contact with us!
                        </span>
                        <h2 class="sec-title">Have Any Questions?</h2>
                        <p class="sec-text">Enthusiastically disintermediate one-to-one leadership via business
                            e-commerce. Dramatically reintermediate compelling process improvements rather than
                            empowered relationships.
                        </p>
                    </div>

                    <form class="contact-form" wire:submit.prevent="queryForm">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input class="form-control {{ $errors->first('name') ? ' is-invalid' : '' }}" id="name" name="name"
                                    type="text" placeholder="Your Name" wire:model.lazy="name">
                                <i class="fal fa-user me-3"></i>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <input class="form-control {{ $errors->first('phone') ? ' is-invalid' : '' }}" id="phone" name="phone"
                                    type="tel" placeholder="Phone Number" wire:model.lazy="phone">
                                <i class="fal fa-phone me-3"></i>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <input class="form-control {{ $errors->first('email') ? ' is-invalid' : '' }}" id="email" name="email"
                                    type="email" placeholder="Email Address" wire:model.lazy="email">
                                <i class="fal fa-envelope me-3"></i>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <input class="form-control {{ $errors->first('purpose') ? ' is-invalid' : '' }}" id="purpose" name="purpose"
                                    type="text" placeholder="Purpose of Message" wire:model.lazy="purpose">
                                <i class="fal fa-comment me-3"></i>
                                @error('purpose')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-12">
                                <textarea class="form-control {{ $errors->first('desc') ? ' is-invalid' : '' }}" id="message" name="message" cols="30" rows="3"
                                    placeholder="Write Your Message Here" wire:model.lazy="desc">
                                </textarea>
                                <i class="fal fa-pencil me-3"></i>
                                @error('desc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-btn text-xl-start col-12 text-center">
                                <button class="as-btn" type="submit">
                                    Send Message<i class="fa-regular fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                        <p class="form-messages mb-0 mt-3"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="map-sec">
        <iframe src="{{ $info->mapurl }}" allowfullscreen="" loading="lazy">
        </iframe>
    </div>

    @push('script')
        <x-addedalert />
    @endpush
</div>

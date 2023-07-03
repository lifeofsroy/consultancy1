<div>
    @push('title')
        Gallery
    @endpush

    <!-- beardcrumb -->
    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Our Gallery</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>Gallery</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="space-top space-extra-bottom">
        <div class="container">
            <div class="row gy-4">
                @foreach ($galleries as $gallery)
                    <div class="col-md-6 col-xl-4">
                        <div class="gallery-card">
                            <div class="gallery-img">
                                <img src="{{ asset('storage') }}/{{$gallery->image}}" alt="gallery image">
                                <span class="play-btn style3" href="#">
                                    <h3>{{$gallery->title}}</h3>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="d-flex justify-content-center mt-5">
                {{$galleries->links()}}
            </div>
        </div>
    </div>
</div>

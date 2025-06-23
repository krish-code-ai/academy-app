@extends('site.index')

@section('content')

<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg'); background-attachment:fixed;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-8 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Students' Life</span></p>
                <h1 class="mb-3 bread">Students' Life</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="container-fluid" data-aos="fade" data-aos-delay="500">
            <div class="row">
                <!-- <div class="col-lg-4">

                    <div class="image-wrap-2">
                        <div class="image-info">
                            <h2 class="mb-3">Nature</h2>
                            <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>
                        </div>
                        <img src="site/images/course-4.jpg" alt="Image" class="img-fluid">
                    </div>

                </div> -->

                @foreach ($galleries as $gallery)
                <div class="col-lg-4 mb-4">
                    <div class="image-wrap-2 position-relative rounded overflow-hidden shadow">
                        <div style="position: relative; width: 100%; padding-top: 75%;"> {{-- 4:3 ratio box --}}
                            @if($gallery->images->first())
                            <img src="{{ asset('storage/' . $gallery->images->first()->image_path) }}"
                                alt="Image"
                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
                            @else
                            <img src="{{ asset('img/no-image.png') }}"
                                alt="No Image"
                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
                            @endif
                        </div>

                        <div class="image-info position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white text-center" style="background-color: rgba(0,0,0,0.5);">
                            <h2 class="mb-2">{{ $gallery->title }}</h2>
                            <p class="text-white-50 mb-2">{{ $gallery->year }}</p>
                            <a href="{{ route('student_life_single', $gallery->id) }}" class="btn btn-outline-light py-2 px-4 mt-2">More Photos</a>
                        </div>
                    </div>
                </div>
                @endforeach



            </div>
        </div>

    </div>
</section>


@endsection

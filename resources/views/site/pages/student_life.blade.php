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
                <div class="col-lg-4">

                    <div class="image-wrap-2">
                        <div class="image-info">
                            <h2 class="mb-3">Nature</h2>
                            <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>
                        </div>
                        <img src="site/images/course-4.jpg" alt="Image" class="img-fluid">
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="image-wrap-2">
                        <div class="image-info">
                            <h2 class="mb-3">Portrait</h2>
                            <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>
                        </div>
                        <img src="site/images/course-4.jpg" alt="Image" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="image-wrap-2">
                        <div class="image-info">
                            <h2 class="mb-3">People</h2>
                            <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>
                        </div>
                        <img src="site/images/course-4.jpg" alt="Image" class="img-fluid">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="image-wrap-2">
                        <div class="image-info">
                            <h2 class="mb-3">Architecture</h2>
                            <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>
                        </div>
                        <img src="site/images/course-4.jpg" alt="Image" class="img-fluid">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="image-wrap-2">
                        <div class="image-info">
                            <h2 class="mb-3">Animals</h2>
                            <a href="{{ url('/student_life_single') }}" class="btn btn-outline-white py-2 px-4">More Photos</a>
                        </div>
                        <img src="site/images/course-3.jpg" alt="Image" class="img-fluid">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="image-wrap-2">
                        <div class="image-info">
                            <h2 class="mb-3">Sports</h2>
                            <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>
                        </div>
                        <img src="site/images/course-2.jpg" alt="Image" class="img-fluid">
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>


@endsection



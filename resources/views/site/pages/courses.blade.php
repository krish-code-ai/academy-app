@extends('site.index')
@php
    $title = 'Courses';
@endphp
@section('title', $title)

@section('content')

<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg'); background-attachment:fixed;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-8 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Courses</span></p>
                <h1 class="mb-3 bread">Courses</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            @foreach ($courses as $course)
            <div class="col-md-4 d-flex ftco-animate">
                <div class="course align-self-stretch">
                    <a href="#" class="img" style="background-image: url('{{ asset('storage/' . $course->picture) }}')"></a>
                    <div class="text p-4">
                        <p class="category">
                            <span>{{ $categories[$course->category_id] ?? 'Uncategorized' }}</span>
                            <span class="price">${{ $course->fee }}</span>
                        </p>
                        <h3 class="mb-3">
                            <a href="#">{{ $course->title }}</a>
                        </h3>
                        <p>{{ \Illuminate\Support\Str::limit($course->description, 100) }}</p>
                        <p><a href="#" class="btn btn-primary">Enroll now!</a></p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="d-flex justify-content-center mt-4">
                    {{ $courses->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

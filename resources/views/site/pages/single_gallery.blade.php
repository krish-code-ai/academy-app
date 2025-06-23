@extends('site.index')

@section('content')

<style>
    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        cursor: pointer;
    }

    .gallery-item:hover {
        transform: scale(1.05);
        z-index: 2;
    }

    .gallery-item img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        display: block;
        border-radius: 8px;
    }

    .gallery-caption {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background: rgba(0, 0, 0, 0.6);
        color: white;
        padding: 10px 15px;
        font-size: 0.9rem;
        opacity: 0;
        transition: opacity 0.3s ease;
        border-bottom-left-radius: 8px;
        border-bottom-right-radius: 8px;
    }

    .gallery-item:hover .gallery-caption {
        opacity: 1;
    }
</style>

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
        <div class="site-section" data-aos="fade">
            <div class="container-fluid">

                <div class="row justify-content-center">

                    <div class="col-md-12">
                        <div class="row mb-5">
                            <div class="col-12 d-flex align-items-center mb-4" style="position: relative;">
                                <button type="button" class="btn btn-primary" onclick="history.back()" style="position: absolute; left: 0;">
                                    Back
                                </button>
                                <h2 class="site-section-heading mx-auto m-0">
                                    {{$gallery->title}}
                                </h2>
                            </div>


                        </div>
                    </div>

                </div>
                <div class="row" id="lightgallery">

                    <!-- @foreach ($gallery->images as $image)
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="{{ asset('storage/' . $image->image_path) }}" data-sub-html="<h4>{{ $gallery->title ?? 'Image Title' }}</h4>">
                        <a href="#"><img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ ($image->title ?? 'Image') . ' ' . $loop->iteration }}" class="img-fluid"></a>
                    </div>
                    @endforeach -->

                    @foreach ($gallery->images as $image)
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="{{ asset('storage/' . $image->image_path) }}" data-sub-html="<h4>{{ $image->title ?? 'Image' }}</h4><p>{{ $image->description ?? 'No description available.' }}</p>">
                        <a href="#" class="gallery-item" tabindex="0">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ ($image->title ?? 'Image') . ' ' . $loop->iteration }}">
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('custom-script')
<script>
    $(document).ready(function() {
        $('#lightgallery').lightGallery({
            download: false,
            share: false
        });
    });
</script>
@endpush

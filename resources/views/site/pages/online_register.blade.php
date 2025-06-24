@extends('site.index')
@php
$title = 'Online Registration';
@endphp
@section('title', $title)

@section('content')

<style>
    .course-checkbox {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 12px 16px;
    margin-bottom: 10px;
    transition: all 0.2s ease-in-out;
    background-color: #fafafa;
    display: flex;
    align-items: center;
    cursor: pointer;
  }

  .course-checkbox:hover {
    background-color: #f0f0f0;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  }

  .course-checkbox input[type="checkbox"] {
    margin-right: 10px;
    transform: scale(1.2);
  }
</style>
<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg'); background-attachment:fixed;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-8 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>{{$title}}</span></p>
                <h1 class="mb-3 bread">{{$title}}</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section contact-section ftco-degree-bg">
    <div class="container">
        <div class="row block-9">
            <div class="col-md-12 pr-md-5">
                <form action="#" method="POST">
                    <h3 class="mb-4 font-weight-bold">Student Application</h3>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Student Name" name="name">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Address" name="address">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Mobile" name="mobile">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="WhatsApp Number" name="whatsapp">
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="branch">
                            <option value="">Select Branch</option>
                            <option value="Branch 1">Branch 1</option>
                            <option value="Branch 2">Branch 2</option>
                            <!-- Add more branches as needed -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold mb-2">Select Course</label>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="course-checkbox">
                                    <input type="checkbox" name="course[]" value="Tailoring">
                                    Tailoring
                                </label>
                                <label class="course-checkbox">
                                    <input type="checkbox" name="course[]" value="Cake Making & Decorating">
                                    Cake Making & Decorating
                                </label>
                                <label class="course-checkbox">
                                    <input type="checkbox" name="course[]" value="Jewellery Making">
                                    Jewellery Making
                                </label>
                                <label class="course-checkbox">
                                    <input type="checkbox" name="course[]" value="Mehandi Artist">
                                    Mehandi Artist
                                </label>
                                <label class="course-checkbox">
                                    <input type="checkbox" name="course[]" value="Saree Draping Artist">
                                    Saree Draping Artist
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="course-checkbox">
                                    <input type="checkbox" name="course[]" value="Beauty & Hairdressing">
                                    Beauty & Hairdressing
                                </label>
                                <label class="course-checkbox">
                                    <input type="checkbox" name="course[]" value="Aari Embroidery">
                                    Aari Embroidery
                                </label>
                                <label class="course-checkbox">
                                    <input type="checkbox" name="course[]" value="Saree Blouse Sewing">
                                    Saree Blouse Sewing
                                </label>
                                <label class="course-checkbox">
                                    <input type="checkbox" name="course[]" value="Saree Blouse & Aari Work">
                                    Saree Blouse & Aari Work
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <input type="submit" value="Save" class="btn btn-primary py-2 px-4">
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>



@endsection

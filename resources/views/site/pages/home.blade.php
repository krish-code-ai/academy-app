
@extends('site.index')

@section('content')

    <div class="home">
        <div class="home_slider_container">

            <!-- Home Slider -->
            <div class="owl-carousel owl-theme home_slider">

                <!-- Home Slider Item -->
                <div class="owl-item">
                    <div class="home_slider_background" style="background-image:url(site/images/home_slider_1.jpg)"></div>

                </div>

                <!-- Home Slider Item -->
                <div class="owl-item">
                    <div class="home_slider_background" style="background-image:url(site/images/home_slider_2.jpg)"></div>

                </div>

                <!-- Home Slider Item -->
                <div class="owl-item">
                    <div class="home_slider_background" style="background-image:url(site/images/home_slider_3.jpg)"></div>

                </div>

            </div>
        </div>

        <!-- Home Slider Nav -->

        <div class="home_slider_nav home_slider_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
        <div class="home_slider_nav home_slider_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
    </div>

    <!-- Home Courses -->
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Our Courses</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="course align-self-stretch">
                        <a href="#" class="img" style="background-image: url(site/images/course-1.jpg)"></a>
                        <div class="text p-4">
                            <p class="category"><span>English</span></p>
                            <h3 class="mb-3"><a href="#">English for Tommorow</a></h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name</p>
                            <p><a href="#" class="btn btn-primary">Enroll now!</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="course align-self-stretch">
                        <a href="#" class="img" style="background-image: url(site/images/course-2.jpg)"></a>
                        <div class="text p-4">
                            <p class="category"><span>Science</span></p>
                            <h3 class="mb-3"><a href="#">Computer Engineering</a></h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name</p>
                            <p><a href="#" class="btn btn-primary">Enroll now!</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="course align-self-stretch">
                        <a href="#" class="img" style="background-image: url(site/images/course-3.jpg)"></a>
                        <div class="text p-4">
                            <p class="category"><span>Business</span></p>
                            <h3 class="mb-3"><a href="#">Business Studies</a></h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name</p>
                            <p><a href="#" class="btn btn-primary">Enroll now!</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row justify-content-center mt-5">
                <div class="col-md-10 ftco-animate">
                    <p><strong>When she reached</strong> the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
                    <p><span>Just Browsing?</span><a href="course.html"> View All Courses</a></p>
                </div>
            </div> -->
        </div>
    </section>



    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">About Us</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-6 d-flex ftco-animate">
                    <div class="img img-about align-self-stretch" style="background-image: url(images/bg_3.jpg); width: 100%;"></div>
                </div>
                <div class="col-md-6 pl-md-5 ftco-animate">
                    <h2 class="mb-4">Welcome to Genius University Stablished Since 1898</h2>
                    <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
                    <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section-3 img" style="background-image: url(site/images/bg_3.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row d-md-flex justify-content-center">
                <div class="col-md-9 about-video text-center">
                    <h2 class="ftco-animate">Genius University is a Leading Schools Around the World</h2>
                    <div class="video d-flex justify-content-center">
                        <a href="https://vimeo.com/45830194" class="button popup-vimeo d-flex justify-content-center align-items-center"><span class="ion-ios-play"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-counter bg-light" id="section-counter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="10300">0</strong>
                                    <span>Satisfied Students</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="7896">0</strong>
                                    <span>Courses Completed</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="400">0</strong>
                                    <span>Experts Advisors</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="200">0</strong>
                                    <span>Schools</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Home partners -->
    <div class="partners ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Our strength with Collaboration</h2>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="partners_slider_container">
                        <div class="owl-carousel owl-theme partners_slider">

                            <!-- Partner Item -->
                            <div class="owl-item partner_item"><img src="site/images/partner_1.png" alt=""></div>

                            <!-- Partner Item -->
                            <div class="owl-item partner_item"><img src="site/images/partner_2.png" alt=""></div>

                            <!-- Partner Item -->
                            <div class="owl-item partner_item"><img src="site/images/partner_3.png" alt=""></div>

                            <!-- Partner Item -->
                            <div class="owl-item partner_item"><img src="site/images/partner_4.png" alt=""></div>

                            <!-- Partner Item -->
                            <div class="owl-item partner_item"><img src="site/images/partner_5.png" alt=""></div>

                            <!-- Partner Item -->
                            <div class="owl-item partner_item"><img src="site/images/partner_6.png" alt=""></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">What Our Student Says</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="carousel-testimony owl-carousel">
                        <div class="item">
                            <div class="testimony-wrap text-center">
                                <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                    <p class="name">Dennis Green</p>
                                    <span class="position">CSE Student</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap text-center">
                                <div class="user-img mb-5" style="background-image: url(images/person_2.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                    <p class="name">Dennis Green</p>
                                    <span class="position">Math Student</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap text-center">
                                <div class="user-img mb-5" style="background-image: url(images/person_3.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                    <p class="name">Dennis Green</p>
                                    <span class="position">Science Students</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap text-center">
                                <div class="user-img mb-5" style="background-image: url(images/person_3.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                    <p class="name">Dennis Green</p>
                                    <span class="position">English Student</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section-parallax">
        <div class="parallax-img d-flex align-items-center">
            <div class="container">

            </div>
        </div>
    </section>

@endsection

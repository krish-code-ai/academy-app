    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><i class="flaticon-university"></i>Genius <br><small>University</small></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                    <li class="nav-item {{ Request::is('about-us') ? 'active' : '' }}"><a href="{{ url('/about-us') }}" class="nav-link">About</a></li>
                    <li class="nav-item {{ Request::is('courses') ? 'active' : '' }}"><a href="{{ url('/courses') }}" class="nav-link">Courses</a></li>
                    <li class="nav-item {{ Request::is('blogs') ? 'active' : '' }}"><a href="{{ url('/blogs') }}" class="nav-link">Blog</a></li>
                    <li class="nav-item {{ Request::is('student_life') ? 'active' : '' }}"><a href="{{ url('/student_life') }}" class="nav-link">Students' Life</a></li>
                    <li class="nav-item"><a href="event.html" class="nav-link">Careers</a></li>
                    <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}"><a href="{{ url('/contact') }}" class="nav-link">Contact</a></li>
                    <li class="nav-item cta"><a href="contact.html" class="nav-link"><span>Register Now!</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

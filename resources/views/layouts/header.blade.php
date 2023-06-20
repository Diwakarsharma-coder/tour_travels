<!-- Topbar Start -->
<div class="container-fluid bg-dark px-5 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>Aurangabad, Maharashtra, 431001</small>
                <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+91 9860604140</small>
                <small class="text-light"><i class="fa fa-envelope-open me-2"></i>tourmychoice1@gmail.com</small>
            </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->




    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <!-- <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>Tourist</h1> -->
                <img src="{{ asset('frontend/img/logo.png') }}" alt="Logo" style="padding: 0px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link <?php  if(basename($_SERVER['REQUEST_URI']) == "") {echo 'active';} ?> ">Home</a>
                    <a href="{{ route('about-us') }}" class="nav-item nav-link <?php  if(basename($_SERVER['REQUEST_URI']) == "about-us") {echo 'active';} ?>">About</a>
                    <a href="{{ route('service') }}" class="nav-item nav-link <?php  if(basename($_SERVER['REQUEST_URI']) == "service") {echo 'active';} ?>">Services</a>
                    <a href="{{ route('packege') }}" class="nav-item nav-link <?php  if(basename($_SERVER['REQUEST_URI']) == "packege") {echo 'active';} ?>">Packages</a>
                    <div class="nav-item dropdown">
                   <a href="#" class="nav-link dropdown-toggle <?php  if(basename($_SERVER['REQUEST_URI']) == "destination" || basename($_SERVER['REQUEST_URI']) == "booking" || basename($_SERVER['REQUEST_URI']) == "guide" || basename($_SERVER['REQUEST_URI']) == "testimonial") {echo 'active';} ?>" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ route('destination') }}" class="dropdown-item <?php  if(basename($_SERVER['REQUEST_URI']) == "destination") {echo 'active';} ?>">Destination</a>
                        <a href="{{ route('booking') }}" class="dropdown-item <?php  if(basename($_SERVER['REQUEST_URI']) == "booking") {echo 'active';} ?>">Booking</a>
                        <a href="{{ route('guide') }}" class="dropdown-item <?php  if(basename($_SERVER['REQUEST_URI']) == "guide") {echo 'active';} ?>">Travel Guides</a>
                        <a href="{{  route('testimonial') }}" class="dropdown-item <?php  if(basename($_SERVER['REQUEST_URI']) == "testimonial") {echo 'active';} ?>">Testimonial</a>
                        {{-- <a href="#404.html" class="dropdown-item">404 Page</a> --}}
                    </div>
                    </div>
                    <a href="{{ route('contact-us') }}" class="nav-item nav-link <?php  if(basename($_SERVER['REQUEST_URI']) == "contact-us") {echo 'active';} ?>">Contact</a>
                </div>
                <a href="" class="btn btn-primary rounded-pill py-2 px-4">Register</a>
            </div>
        </nav>

        @yield('header-section');
    </div>
    <!-- Navbar & Hero End -->
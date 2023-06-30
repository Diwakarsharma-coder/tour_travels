<script type="text/javascript">
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        /*var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {

        }*/

        if (evt.which != 46 && (evt.which < 47 || evt.which > 59))
        {
            evt.preventDefault();
            if ((evt.which == 46) && ($(this).indexOf('.') != -1)) {
                evt.preventDefault();
            }
            return false;
        }
        return true;
    }

    function lettersValidate(key) {
        //alert();
        var keycode = (key.which) ? key.which : key.keyCode;

        if ((keycode > 64 && keycode < 91) || (keycode > 96 && keycode < 123) || keycode == 32)
        {
               return true;
        }
        else
        {
            return false;
        }

    }

    function lettersValidate1(key) {
        //alert();
        var keycode = (key.which) ? key.which : key.keyCode;

        if ((keycode > 64 && keycode < 91) || (keycode > 96 && keycode < 123))
        {
               return true;
        }
        else
        {
            return false;
        }

    }

    function percentage_validation(e){
        var x = parseFloat(e);
        var per = $('#new_per').val();
        if (isNaN(x) || x < 0 || x > 100) {
            $('.per_validate').css('display','block');
            $('.per_val').val('');
        }
    }

    function validateNumber(event) {
        var key = window.event ? event.keyCode : event.which;
        if (event.keyCode === 8 || event.keyCode === 46) {
            return true;
        } else if ( key < 48 || key > 57 ) {
            return false;
        } else {
            return true;
        }
    };

</script>
 <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Company</h4>
                    <a class="btn btn-link" href="{{ route('about-us') }}">About Us</a>
                    <a class="btn btn-link" href="{{ route('service') }}">service</a>
                    <a class="btn btn-link" href="{{ route('packege') }}">Package</a>
                    <a class="btn btn-link" href="{{ route('contact-us') }}">Contact Us</a>

                 
                   {{--  <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a> --}}
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Afnan apartment Near Malik Ambar school labar colony Shah bazar Aurangabad, Maharashtra, 431001</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 8600563880</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 9860604140</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>tourmychoice1@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('frontend/img/package-1.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('frontend/img/package-2.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('frontend/img/package-3.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('frontend/img/package-2.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('frontend/img/package-3.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('frontend/img/package-1.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Tour My Choice</a>, All Right Reserved.
                        Designed By <a class="border-bottom" href="https://webclicktech.com/">webclicktech</a>
                    </div>
                    <!-- <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

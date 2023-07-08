@extends('layouts.master')
@section('title','Booking Details')
@push("after-styles")

@endpush
@section('content')
     <style>
       span{
        color: red;
       }
     </style>

@section('header-section')
<div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Booking Details</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Booking Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
@endsection


@if( empty(Session::get('person')) )
  <p>Something Error</p>
  <h1>Try now</h1>
@else



<!-- content -->
<section class="py-5">
  <div class="container">
    <div class="row gx-5">
      <aside class="col-lg-6">
        <h4>
          Contact details
        </h4>
        <p>We'll use this information to send you confirmation and updates about your booking</p>
          <form method="POST" id="booknow_form">
                @csrf
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent" id="first_name" name="first_name" placeholder="Your Fist Name" data-error="#errNm2">
                                        <label for="name">First Name</label>
                                    </div>
                                    <span id="errNm2"></span>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent" id="last_name" name="last_name" placeholder="Your Last Name " data-error="#errNm3">
                                        <label for="last_name">Last Name</label>
                                    </div>
                                    <span id="errNm3"></span>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-transparent" id="email" name="email" placeholder="Your Email" data-error="#errNm4">
                                        <label for="email">Your Email</label>
                                    </div>
                                    <span id="errNm4"></span>
                                </div>

                                {{-- <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select bg-transparent" id="select1">
                                          <option value="0"> Select</option>
                                            @foreach($country as $co)
                                              <option>(+{{ $co->phonecode }}) {{ $co->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="select1">Phone Code</label>
                                    </div>
                                </div> --}}

                                  <div class="col-md-12">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="text" class="form-control bg-transparent datetimepicker-input" name="phone" id="phone" placeholder="Phone Number"  data-error="#errNm5"/>
                                        <label for="datetime">Your Phone</label>
                                    </div>
                                    <span id="errNm5"></span>
                                </div>

                                <hr>
                                  <h4>
                                    Pickup point
                                  </h4>
                                  <p>Tell us where you’d like to be picked up from. If you're not sure, you can decide later.  </p>
                                 <div class="col-md-12">

                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" checked value="1" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          I’d like to be picked up
                                        </label>
                                        <input type="text"  class="form-control bg-transparent datetimepicker-input" name="location" id="location" placeholder="Enter Address"  data-error="#errNm8"/>
                                         <span id="errNm8" class="location_err"></span>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="0" id="flexRadioDefault2" >
                                        <label class="form-check-label" for="flexRadioDefault2">
                                         I’ll decide later
                                        </label>
                                      </div>

                                    <span id="errNm5"></span>
                                </div>

                                @if($product->guider)
                                  <div class="col-md-12">
                                  <label>Select Guide</label>
                                    <select class="form-select" name="guide" id="guide">
                                      <option value="1">Frenc- Guide</option>
                                      <option selected value="2">English- Guide</option>
                                      <option value="3">German - Guide</option>
                                      <option value="4">Russian- Guide</option>
                                    </select>
                                </div>
                                @endif
                                  <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                                 <input type="hidden" name="price" value="{{ Session::get('price_id'); }}" id="price">
                                 <input type="hidden" name="person_text" value="{{ Session::get('person') }}" id="person_text">
                                 <input type="hidden" name="start_date" id="start_date" value="{{ Session::get('date') }}">
                                 <input type="hidden" name="start_time" id="start_time" value="{{ Session::get('start_time') }}">

                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" id="paynow" type="submit">Pay Now</button>
                                </div>
                            </div>
                        </form>


      </aside>
      <main class="col-lg-6">
          @php
          $array = explode("|", $product->image);
        @endphp
        <div class="border rounded-4 mb-3 d-flex justify-content-center">
          <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="{{ asset('product').'/'.$array[0] }}">
            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{ asset('product').'/'.$array[0] }}" />
          </a>
        </div>
        <div class="ps-lg-3">
          <h4 class="title text-dark">
            {{ $product->title }}
          </h4>


          <div class="mb-3">
            <span class="h5">₹ {{ $price }}</span>
          </div>


          <div class="row">
              <dt class="col-3">Location:</dt>
              <dd class="col-9">{{ $product->location }}</dd>

              <dt class="col-3">Person</dt>
              <dd class="col-9">{{ $product->person }}</dd>
              <input type="hidden" id="person_hidden" value="{{ $product->person }}">

              <dt class="col-3">Day</dt>
              <dd class="col-9">{{ $product->day }}</dd>
           </div>

        </div>

      </main>
    </div>
  </div>
</section>
<!-- content -->

@endif
@endsection
@push("after-scripts")

<script src="{{ asset('frontend/js/checkout.razorpay.com_v1_checkout.js') }}"></script>


   <script>

      function onlyNumberKey(evt) {
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
  </script>


 <script>
   $("#booknow_form").validate({
            ignore: [],
            rules: {
                start_date :'required',
                first_name: "required",
                last_name: "required",
                email:'required',
                phone:{
                  required: true,
                  number: true,
                  maxlength: 12
                },
                location:'required'

            },
            messages: {
                start_date:'Please Select Date',
                first_name: "Please Enter First Name",
                last_name: "Please Enter Last Name",
                email:"Please Enter Email",
                phone:{
                  required: "Please Enter Phone",

                },
                location:'Please Enter Address'



            },
            errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error)
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
              // console.log('test');
              // form.submit();
               var start_date = $('#start_date').val()
             $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                  }
              });

              var formData = {
                  // date: jQuery('#start_date').val(),
                  start_date:start_date,
                  product_id: jQuery('#product_id').val(),
                  person: jQuery('#person_text').val(),
                  first_name: jQuery('#first_name').val(),
                  last_name: jQuery('#last_name').val(),
                  email: jQuery('#email').val(),
                  price_id: jQuery('#price').val(),
                  phone: jQuery('#phone').val(),
                  location: jQuery('#location').val(),
                  guide: jQuery('#guide').val(),
                  start_time: jQuery('#start_time').val(),

              };

              var ajaxurl = "{!! route('booknow') !!} ";


              $('#paynow').prop('disabled',true);

               $.ajax({
                  type: 'POST',
                  url: ajaxurl,
                  data: formData,
                  dataType: 'json',
                  success: function (result) {
                    var cust_id = result.cust_id;
                    console.log(result);

                      if(result.success)
                      {


                        var options = {
                            "key": "rzp_test_CMs4i82vwHK8pQ",
                            "amount": result.razorpay_amount / 100,
                            "currency": "INR",
                            "name": "Tour My Choice",
                            "description": "one step solution for your tour booking",
                            "image": "https://www.itsolutionstuff.com/assets/images/logo-it.png?ezimgfmt=ng:webp/ngcb6",
                            "order_id": result.razorpay_id, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                            "handler": function (response){

                                // alert(response.razorpay_payment_id);
                                // alert();
                                // alert(response.razorpay_signature);


                                var url = "{{ route('success',':id') }}";
                                var url = url.replace(':id',response.razorpay_order_id);

                                window.location.href = url;


                            },
                            "prefill": {
                                "name": result.cust_first_name +' '+ result.cust_last_name,
                                "email": result.email,
                                "contact": result.phone
                            },
                            "notes": {
                                "address": "Afnan apartment Near Malik Ambar school labar colony Shah bazar Aurangabad, Maharashtra, 431001"
                            },
                            "theme": {
                                "color": "#3399cc"
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.on('payment.failed', function (response){
                                alert(response.error.code);
                                alert(response.error.description);
                                alert(response.error.source);
                                alert(response.error.step);
                                alert(response.error.reason);
                                alert(response.error.metadata.order_id);
                                alert(response.error.metadata.payment_id);
                        });



                         rzp1.open();


                      }
                      else
                      {
                        alert('Something is wrong')
                      }



                  },
                  error: function (data) {
                      console.log(data);
                      alert('error');
                  }
              });
          }

        });

   $('#flexRadioDefault1').on('click',function(){
    if(this.value == 1)
    {
      $('#location').prop('disabled',false);
      $('#location').css('display','Block');
      $('#errNm8').css('display','Block');

    }

   });

   $('#flexRadioDefault2').on('click',function(){
    if(this.value == 0)
    {

      $('#location').prop('disabled',true);
      $('#location').css('display','none');
      $('#errNm8').css('display','none');


    }

   });


</script>
@endpush

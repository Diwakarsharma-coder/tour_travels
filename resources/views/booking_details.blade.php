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


<!-- content -->
<section class="py-5">
  <div class="container">
    <div class="row gx-5">
      <aside class="col-lg-6">
        @php
          $array = explode("|", $product->image);
        @endphp
        <div class="border rounded-4 mb-3 d-flex justify-content-center">
          <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="{{ asset('product').'/'.$array[0] }}">
            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{ asset('product').'/'.$array[0] }}" />
          </a>
        </div>
        {{-- <div class="d-flex justify-content-center mb-3">
          @foreach($array as $val)
          <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="{{ asset('product').'/'.$val }}" class="item-thumb">
            <img width="60" height="60" class="rounded-2" src="{{ asset('product').'/'.$val }}" />
          </a>
          @endforeach
          
          
        </div> --}}
        <!-- thumbs-wrap.// -->
        <!-- gallery-wrap .end// -->
      </aside>
      <main class="col-lg-6">
        <div class="ps-lg-3">
          <h4 class="title text-dark">
            {{ $product->title }}
          </h4>
          {{-- <div class="d-flex flex-row my-3">
            <div class="text-warning mb-1 me-2">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
              <span class="ms-1">
                4.5
              </span>
            </div>
          </div> --}}

          <div class="mb-3">
            <span class="h5">₹ {{ $product->price }}</span>
            {{-- <span class="text-muted">/per box</span> --}}
          </div>
          

          <p>
           {{ $product->description }}
          </p>

          <div class="row">
            <dt class="col-3">Location:</dt>
            <dd class="col-9">{{ $product->location }}</dd>

            <dt class="col-3">Person</dt>
            <dd class="col-9">{{ $product->person }}</dd>
            <input type="hidden" id="person_hidden" value="{{ $product->person }}">

            <dt class="col-3">Day</dt>
            <dd class="col-9">{{ $product->day }}</dd>

            {{-- <dt class="col-3">Brand</dt>
            <dd class="col-9">Reebook</dd> --}}
          </div>

          <hr />
            
           <div class="row mb-4">
            <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
             <div class="col-md-4 col-6">
              <label class="mb-2 d-block">Date</label>
              <div class="input-group mb-3" style="width: 170px;">
                <input type="text" name="start_date" id="start_date" class="form-control  border border-secondary" placeholder="Start Date"
                        value="{{ old('start_date') }}" autocomplete="off">
              </div>
               <span id="error_date" style="color:red"></span>
            </div> 
            
            <div class="col-md-4 col-6 mb-3">
              <label class="mb-2 d-block">Person</label>
              <div class="input-group mb-3" style="width: 170px;">
                <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon1" data-mdb-ripple-color="dark">
                  <i class="fas fa-minus"></i>
                </button>
                <input type="text" value="1" id="person_text" onkeypress="return onlyNumberKey(event)" class="form-control text-center border border-secondary" aria-label="Example text with button addon" aria-describedby="button-addon1" />
                <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon2" data-mdb-ripple-color="dark">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
             
            </div> 

          </div> 
          <a id="booknow"  class="btn btn-primary shadow-0" style="border-radius: 30px 30px 30px 30px;"> Book now </a>
          
        </div>
      </main>
    </div>
  </div>
</section>
<!-- content -->

<section class="bg-light border-top py-4">
  <div class="container">
    <div class="row gx-4">
      <div class="col-lg-8 mb-4">
        <div class="border rounded-2 px-3 py-2 bg-white"  id="user_detail" style="display:none">
          <!-- Pills navs -->
          <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item d-flex" role="presentation">
              <a class="nav-link d-flex align-items-center justify-content-center w-100 active" id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab" aria-controls="ex1-pills-1" aria-selected="true">Customer Details</a>
            </li>
          </ul>
          <!-- Pills navs -->

          <!-- Pills content -->
          <div class="tab-content" id="ex1-content" >
            <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
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
                                <input type="hidden" name="price" value="{{ $product->price }}" id="price">
                                  <div class="col-md-12">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="text" class="form-control bg-transparent datetimepicker-input" name="phone" id="phone" placeholder="Phone Number"  data-error="#errNm5"/>
                                        <label for="datetime">Your Phone</label>
                                    </div>
                                    <span id="errNm5"></span>
                                </div>

                                 <div class="col-md-12">
                                    
                                        <strong>Pickup point</strong>
                                         <p>Tell us where you’d like to be picked up from. If you're not sure, you can decide later.</p>
                                        
                                     

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


                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Book Now</button>
                                </div>
                            </div>
                        </form>
            </div>
           
          </div>
          <!-- Pills content -->
        </div>


         <div class="border rounded-2 px-3 py-2 bg-white" id="speci">
          <!-- Pills navs -->
          <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item d-flex" role="presentation">
              <a class="nav-link d-flex align-items-center justify-content-center w-100 active" id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab" aria-controls="ex1-pills-1" aria-selected="true">Specification</a>
            </li>
          </ul>
          <!-- Pills navs -->

          <!-- Pills content -->
          <div class="tab-content" id="ex1-content">
            <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
              <p>
                With supporting text below as a natural lead-in to additional content. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                pariatur.
              </p>
              <div class="row mb-2">
                <div class="col-12 col-md-6">
                  <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-check text-success me-2"></i>Some great feature name here</li>
                    <li><i class="fas fa-check text-success me-2"></i>Lorem ipsum dolor sit amet, consectetur</li>
                    <li><i class="fas fa-check text-success me-2"></i>Duis aute irure dolor in reprehenderit</li>
                    <li><i class="fas fa-check text-success me-2"></i>Optical heart sensor</li>
                  </ul>
                </div>
                <div class="col-12 col-md-6 mb-0">
                  <ul class="list-unstyled">
                    <li><i class="fas fa-check text-success me-2"></i>Easy fast and ver good</li>
                    <li><i class="fas fa-check text-success me-2"></i>Some great feature name here</li>
                    <li><i class="fas fa-check text-success me-2"></i>Modern style and design</li>
                  </ul>
                </div>
              </div>
              {{-- <table class="table border mt-3 mb-2">
                <tr>
                  <th class="py-2">Display:</th>
                  <td class="py-2">13.3-inch LED-backlit display with IPS</td>
                </tr>
                <tr>
                  <th class="py-2">Processor capacity:</th>
                  <td class="py-2">2.3GHz dual-core Intel Core i5</td>
                </tr>
                <tr>
                  <th class="py-2">Camera quality:</th>
                  <td class="py-2">720p FaceTime HD camera</td>
                </tr>
                <tr>
                  <th class="py-2">Memory</th>
                  <td class="py-2">8 GB RAM or 16 GB RAM</td>
                </tr>
                <tr>
                  <th class="py-2">Graphics</th>
                  <td class="py-2">Intel Iris Plus Graphics 640</td>
                </tr>
              </table> --}}
            </div>
           
          </div>
          <!-- Pills content -->
        </div>



      </div>
      <div class="col-lg-4">
        <div class="px-0 border rounded-2 shadow-0">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Similar items</h5>

              @foreach($awesomePackages as $val)
                @php
                  $array = explode("|", $val->image);
                  @endphp

                    <div class="d-flex mb-3">
                      <a href="#" class="me-3">
                        <img src="{{ asset('product').'/'. $array[0] }}" style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                      </a>
                      <div class="info">
                        <a href="{{ route('product_details',$val->id) }}" class="nav-link mb-1">
                          {{ $val->title }}
                        </a>
                        <strong class="text-dark">₹ {{ $val->price }}</strong>
                      </div>
                    </div>

              @endforeach
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
@push("after-scripts")


  <script>

    $('#booknow').on('click',function(e){
e.preventDefault();
        var start_date = $('#start_date').val()
        if(start_date == "")
        {
          $('#error_date').text('Please Select Date');
          return false
        }

        $('#user_detail').css('display',"block");
        $('#speci').css('display',"none");
        $('#error_date').text('');





      // alert();


    })

    var dateToday = new Date();

     $("#start_date").datepicker({
                format: 'dd-mm-yyyy',
                orientation: 'bottom',
               'startDate': dateToday,

            });


     $(document).ready(function() { 
         setCurrentDate()
      });

      function setCurrentDate()
      {
      var now = new Date();
      var day = ("0" + now.getDate()).slice(-2);
      var month = ("0" + (now.getMonth() + 1)).slice(-2);
      var today = (day) + '-' + (month) + "-" + now.getFullYear();
      $('#start_date').val(today);
      }

  </script>



   <script>
      $('#button-addon1').on('click',function(){
          var person_text = parseInt($('#person_text').val());
          // var person_hidden = $('#person_hidden').val();

          if( person_text == 1)
          {
              $(this).prop( "disabled", false );
          }
          else
          {
            var val = person_text - 1 ;
              $('#person_text').val(val);
          }


      })


      $('#button-addon2').on('click',function(){
          
          var person_text = parseInt($('#person_text').val());
          var person_hidden = parseInt($('#person_hidden').val());

          if( person_hidden == person_text)
          {
              $(this).prop( "disabled", false );
          }
          else
          {
            var val = person_text + 1 ;
              $('#person_text').val(val);
          }

      })

      $('#person_text').on('change',function(){

           var person_text = parseInt($(this).val());
          var person_hidden = parseInt($('#person_hidden').val());

          if( person_text > person_hidden )
          {
              $('#person_text').val(person_hidden);
          }

          if( person_text == 0 )
          {
              $('#person_text').val(1);
          }

      })

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
                  price: jQuery('#price').val(),
                  phone: jQuery('#phone').val(),
                  location: jQuery('#location').val(),
                  
              };
        
              var ajaxurl = "{!! route('booknow') !!} ";
        
              

               $.ajax({
                  type: 'POST',
                  url: ajaxurl,
                  data: formData,
                  dataType: 'json',
                  success: function (data) {
                    var cust_id = data.cust_id;
                    
                      if(data.success)
                      {
                          var url = "{{ route('success',':id') }}";
                          var url = url.replace(':id',cust_id);

                          window.location.href = url;
                      }
                      else
                      {
                        alert('Something is wrong')
                      }

                   

                  },
                  error: function (data) {
                      console.log(data);
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

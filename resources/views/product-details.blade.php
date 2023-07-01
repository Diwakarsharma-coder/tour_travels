@extends('layouts.master')
@section('title','Product Details')
@push("after-styles")

@endpush
@section('content')
        
       
@section('header-section')
<div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Product Details</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Product Details</li>
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
      <h4 class="title text-dark">
            {{ $product->title }}
          </h4>
      <div class="col-lg-6">
        @php
          $array = explode("|", $product->image);
        @endphp

        <div class="border rounded-4 mb-3 d-flex justify-content-center">
          <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="{{ asset('product').'/'.$array[0] }}">
            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{ asset('product').'/'.$array[0] }}" />
          </a>
        </div>
        <div class="d-flex justify-content-center mb-3">
          @foreach($array as $val)
          <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="{{ asset('product').'/'.$val }}" class="item-thumb">
            <img width="60" height="60" class="rounded-2" src="{{ asset('product').'/'.$val }}" />
          </a>
          @endforeach
          
          
        </div>
        {{-- <h4 class="title text-dark">
            {{ $product->title }}
          </h4> --}}
          <div class="mb-3">
            {{-- <span class="h5">₹ {{ $product->price }}</span> --}}
            {{-- <span class="text-muted">/per box</span> --}}
          </div>

         {{--  <div class="d-flex flex-row my-3">
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

        <!-- thumbs-wrap.// -->
        <!-- gallery-wrap .end// -->
      </div>
      <main class="col-lg-6">
        <div class="ps-lg-3">
          <div class="mb-3">
            <h1>Price</h1>
            <span class="h5">₹ {{ $product->price }}</span>
            {{-- <span class="text-muted">/per box</span> --}}
          </div>

          {{-- <hr /> --}}
          <form id="Datepick">
            @csrf
           <div class="row mb-4">
            <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
            <h2>Select Date and Travelers</h2>
            <div class="col-md-12 col-12">
              <label class="mb-2 d-block">Date</label>
              <div class="input-group mb-3" >
                <input type="text" name="start_date" id="start_date" class="form-control  border border-secondary" placeholder="Start Date"
                        value="{{ old('start_date') }}" autocomplete="off">
              </div>
            </div>
            
            <div class="col-md-12 col-12 ">
              <label class="mb-2 d-block">Person</label>
              <div class="input-group mb-3">
                <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon1" data-mdb-ripple-color="dark">
                  <i class="fas fa-minus"></i>
                </button>
                <input type="text" value="1" id="person_text" onkeypress="return onlyNumberKey(event)" class="form-control text-center border border-secondary" aria-label="Example text with button addon" aria-describedby="button-addon1" />
                <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon2" data-mdb-ripple-color="dark">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
              <span id="error_date" style="color:red"></span>
            </div>

          </div> 
          <a id="booknow4" href="{{ route('booking_details_page',$product->id) }}" class="btn btn-primary shadow-0" style="border-radius: 30px 30px 30px 30px;"> Check Availability </a>
          <br>
          @if($product->cancel)<strong>Free cancellation</strong>@endif
          </form>
          {{-- <a href="#" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </a> --}}
          {{-- <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Save </a> --}}
        </div>
      </main>

    </div>
    
    @foreach($price_detail as $i => $val)
       <div class="row gx-5 m-1">
        {{--    --}}

          <div class="accordion" id="accordionExample{{ $i }}">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button <?php if($i==0){ echo 'collapsed';}?> " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $i }}" aria-expanded="true" aria-controls="collapseOne{{ $i }}">
                <h5>{{ $val->price_title }}</h5>
              </button>
            </h2>
            <div id="collapseOne{{ $i }}" class="accordion-collapse collapse <?php if($i==0){ echo 'show';}?> " data-bs-parent="#accordionExample{{ $i }}">
              <div class="accordion-body">
                <div class="row gx-4 ">
                    <div class="col-7 border ">
                      <strong> Option {{ $i+1 }}</strong>
                      <h3>{{ $val->price_title }}</h3>
                      <p>{{ $val->price_desc }}</p>
                    </div>
                    <div class="col-5 border flex-column d-flex align-items-end ">
                      <div>
                      <h4> ₹ {{ $val->price_value }}</h4>
                          
                      </div>
                      
                      <a href="" class="btn btn-primary ">Book Now</a>

                    </div>
                </div>
              </div>
            </div>
          </div>
          
  
</div>
      </div>

    @endforeach      
   



    <div class="row gx-5">
        

        <div class="col-12">
            
          <div class="row">
            <dt class="col-3">Location:</dt>
            <dd class="col-9">{{ $product->location }}</dd>

            <dt class="col-3">Person</dt>
            <dd class="col-9">{{ $product->person }}</dd>
            <input type="hidden" id="person_hidden" value="{{ $product->person }}">
            <dt class="col-3">Day</dt>
            <dd class="col-9">{{ $product->day }}</dd>
          </div>
            <h3>Overview</h3>
           <p>
            {!! htmlspecialchars_decode(stripslashes($product->description)) !!}
           
          </p>

        </div>
    </div>
  </div>
</section>
<!-- content -->

<section class="bg-light border-top py-4">
  <div class="container">
    <div class="row gx-4">
      <div class="col-lg-8 mb-4">
        <div class="border rounded-2 px-3 py-2 bg-white">
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

              <h5>What's Included</h5>
              <p>
                 {!! htmlspecialchars_decode(stripslashes($product->included)) !!}
           
              </p>
              <h5>What To Expect</h5>
              <p>
                 {!! htmlspecialchars_decode(stripslashes($product->expect)) !!}
           
              </p>

              <h5>Cancellation Policy</h5>
              <p>
                 {!! htmlspecialchars_decode(stripslashes($product->policy)) !!}
           
              </p>
              {{-- <div class="row mb-2">
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
              </div> --}}
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
<script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>

  <script>
    


    var dateToday = new Date();

     $("#start_date").datepicker({
          format: 'dd-mm-yyyy',
          orientation: 'bottom',
          'startDate': dateToday
      });
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
@endpush

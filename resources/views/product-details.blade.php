@extends('layouts.master')
@section('title','Product Details')
@push("after-styles")

@endpush
@section('content')

<style>
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
  color:#e9ecef;
}
span{
  color:red;
}

.text_center_around{
  width:45px;
  height:45px;
  border-radius: 50%;
  background: red;
  display: table-cell;
  text-align: center;
  vertical-align: middle;
  color: white;
  font-size: 25px;
}

.id_work_days{
  height: 55px;
  border: none;
  overflow: hidden;
}
.id_work_days::-moz-focus-inner {
  border: 0;
}
.id_work_days:focus {
  outline: none;
}
.id_work_days option{
  width: 60px;
  font-size: 1.2em;
  padding: 10px 0;
  text-align: center;
  margin-right: 20px;
  display: inline-block;
  cursor: pointer;
  border:rgb(204, 204, 0) solid 1px;
  border-radius: 5px;
  color: rgb(204, 204, 0);
}

.id_work_days option:checked {
  background: red linear-gradient(0deg, red 0%, red 100%);
  color:  white;
}

</style>


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

        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                @foreach($array as $i => $val)
                <div class="carousel-item <?php if($i==0){ echo 'active'; } ?>">
                    <img src="{{ asset('product').'/'.$val }}" class="d-block w-100" alt="...">
                </div>
                @endforeach


            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

          <div class="row mt-4">
            <div class="col-3">
                <a href="#review_content_div"> <h6>Review</h6> </a>
            </div>
            <div class="col-3">
                <h6>Duration</h6>
            </div><div class="col-3">
                <h6>Pickup offered</h6>
            </div><div class="col-3">
                <a href="#">
                   <h6 data-bs-toggle="modal" data-bs-target="#Language_modal" >Language</h6> </a>
            </div>
          </div>

          <div class="modal fade" id="Language_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Language</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <label for="">English</label>
                    </div>

                    <div>
                        <label for="">English</label>
                    </div> <div>
                        <label for="">English</label>
                    </div> <div>
                        <label for="">English</label>
                    </div> <div>
                        <label for="">English</label>
                    </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>



      </div>
      <main class="col-lg-6">
        <div class="ps-lg-3">
          <div class="mb-3">
            <h1>Price</h1>
            <span class="h5">₹ {{ $product->price }}</span>
            {{-- <span class="text-muted">/per box</span> --}}
          </div>

          <div class="">
              <h5 class="text-warning mt-4 mb-4">
                <b><span id="average_rating">{{ $object->average_rating }}</span> / 5</b>
              </h5>
              <div class="mb-3">
                {{-- <i class="fas fa-star star-light mr-1 main_star"></i>
                <i class="fas fa-star star-light mr-1 main_star"></i>
                <i class="fas fa-star star-light mr-1 main_star"></i>
                <i class="fas fa-star star-light mr-1 main_star"></i>
                <i class="fas fa-star star-light mr-1 main_star"></i> --}}
                @for($i = 1; $i <= $object->average_rating ; $i++)
                  <i class="fas fa-star star-light text-warning mr-1 main_star"></i>
                @endfor
                <span id="total_review">{{ $object->total_review }}</span> Review
              </div>
            </div>



          {{-- <hr /> --}}
          <form id="Datepick">
            @csrf
           <div class="row mb-4">

            <h2>Select Date and Travelers</h2>
            <div class="col-md-12 col-12">
              <label class="mb-2 d-block">Date</label>
              <div class="input-group mb-3" >
                <input type="text" name="start_date" id="start_date" class="form-control  border border-secondary" placeholder="Start Date"
                        value="{{ old('start_date') }}" autocomplete="off">
              </div>
               <span id="error_date" style="color:red"></span>
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

            </div>

          </div>
          <button  id="booknow4"    class="btn btn-primary shadow-0" style="border-radius: 30px 30px 30px 30px;"> Check Availability </button>
          <br>
          @if($product->cancel)<strong>Free cancellation <a href="" data-bs-toggle="modal" data-bs-target="#cancellation_modal">Read more</a></strong>@endif
          </form>

          {{-- cancellation module --}}
          <div class="modal fade" id="cancellation_modal"  tabindex="-1" aria-labelledby="cancellationLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" >
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="cancellationLabel">Cancellation Policy</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {!! htmlspecialchars_decode(stripslashes($product->policy)) !!}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          {{-- cancellation module --}}
          {{-- <a href="#" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </a> --}}
          {{-- <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Save </a> --}}
        </div>
      </main>

    </div>
<div class="row gx-5 mb-1  price_details_cont" style="display: none;">
    @foreach($price_detail as $i => $val)
       <div class="col-12">
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
                    <div class="col-7  ">
                      <strong> Option {{ $i+1 }}</strong>
                      <h3>{{ $val->price_title }}</h3>
                      <p>{{ $val->price_desc }}</p>

                      @php
                         $array = explode("|", $product->time)
                      @endphp
                        <select name="start_time" id="start_time_{{$val->id}}" class="id_work_days" multiple>
                        @for ($i = 0 ; $i < count($array)-1 ; $i++)
                            <option value="{{ $array[$i] }}">{{ $array[$i] }}</option>
                        @endfor
                        </select>

                    </div>
                    <div class="col-5  flex-column d-flex align-items-end ">
                      <form method="get"  action="{{ route('booking_details_page',$val->product_id ) }}">
                        @csrf
                          <h4> ₹ {{ $val->price_value }}</h4>
                          <input type="hidden" name="date" class="date_input" value="">
                          <input type="hidden" name="person" class="person_input"value="">
                          <input type="hidden" name="start_time" class="start_time_input_{{ $val->id }}"value="">
                          <input type="hidden" name="price_id" class="price_id" value="{{ $val->id }}">
                          <button type="submit" disabled class="btn btn-primary book_now_{{ $val->id }}">Book Now</button>
                      </form>

                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    @endforeach

</div>


    <div class="row gx-5">


        <div class="col-12">

          <div class="row">
            <dt class="col-3">Location:</dt>
            <dd class="col-9">{{ $product->location }}</dd>

            <dt class="col-3">Person</dt>
            <dd class="col-9">{{ $product->person }}</dd>
            <input type="hidden" id="person_hidden" value="{{ $product->person }}">
            <dt class="col-3">Duration</dt>
            <dd class="col-9">{{ $product->day }}</dd>
          </div>
            <h3>Overview</h3>
           <p>
            {!! htmlspecialchars_decode(stripslashes($product->description)) !!}

          </p>

        </div>
        <div class="col-12">
            <h5>What's Included</h5>
            <p>
               {!!  htmlspecialchars_decode(stripslashes( substr_replace($product->included, "...", 2000))) !!}
            </p>
            <p><a class="link-opacity-100-hover" href="#" data-bs-toggle="modal" data-bs-target="#include_modal" >Read more</a></p>

            <div class="modal fade" id="include_modal"  tabindex="-1" aria-labelledby="includeLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" >
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="includeLabel">What's Included</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        {!! htmlspecialchars_decode(stripslashes($product->included)) !!}
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <h5>What To Expect</h5>
            <p>
               {!!  htmlspecialchars_decode(stripslashes( substr_replace($product->expect, "...", 2000))) !!}
            </p>
            <p><a class="link-opacity-100-hover" href="#" data-bs-toggle="modal" data-bs-target="#expert_modal" >Read more</a></p>

            <div class="modal fade" id="expert_modal"  tabindex="-1" aria-labelledby="expertLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" >
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="expertLabel">What To Expect</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        {!! htmlspecialchars_decode(stripslashes($product->expect)) !!}
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <h5>Cancellation Policy</h5>
            <p>
               {!!  htmlspecialchars_decode(stripslashes( substr_replace($product->policy, "...", 2000))) !!}
            </p>
            <p><a class="link-opacity-100-hover" href="#" data-bs-toggle="modal" data-bs-target="#policy_modal" >Read more</a></p>

            <div class="modal fade" id="policy_modal"  tabindex="-1" aria-labelledby="policyLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" >
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="policyLabel">Cancellation Policy</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        {!! htmlspecialchars_decode(stripslashes($product->policy)) !!}
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
        </div>



    </div>
  </div>
</section>

<!-- content -->

<section class="bg-light border-top py-4">
  <div class="container">
    <div class="row gx-4">
        <h5 class="card-title">Similar items</h5>
        @foreach($awesomePackages as $val)
      <div class="col-lg-3">
        <div class="px-0 border rounded-2 shadow-0">
          <div class="card">
            <div class="card-body">



                @php
                  $array = explode("|", $val->image);
                  @endphp

                    <div class=" mb-3">
                      <a href="#" class="me-3">
                        <img src="{{ asset('product').'/'. $array[0] }}"  class="img-md img-thumbnail" />
                      </a>
                      <div class="info">
                        <a href="{{ route('product_details',$val->id) }}" class="nav-link mb-1">
                          {{ $val->title }}
                        </a>
                        <strong class="text-dark">₹ {{ $val->price }}</strong>
                      </div>
                    </div>


            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>



<section class="bg-light border-top py-4 " id="review_content_div">
  <div class="container">

    <div class="row gx-4">
      <div class="col-lg-8 mb-4 ">
        <p>
              <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

              <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
              <div class="progress">
                  <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
              </div>
          </p>
              <p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>
                        </p>
              <p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>
                        </p>
              <p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>
                        </p>
              <p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>
                        </p>
          <div id="review_content">
            {{-- //////////////// --}}

            @if(count($object->review_data) > 0)

              @for($count = 0; $count < count($object->review_data); $count++)
                <div class="row mb-3">
                   <div class="col-sm-1">
                      <div class="text-center text_center_around">
                         {{ strtoupper( substr($object->review_data[$count]->user_name, 0, 1) ) ; }}
                      </div>
                    </div>

                    <div class="col-sm-11">
                        <div class="card">
                            <div class="card-header">
                              <b>{{ $object->review_data[$count]->user_name }}</b>
                            </div>

                            <div class="card-body">
                              @php
                              for($star = 1; $star <= 5; $star++)
                                {
                                    $class_name = '';

                                    if($object->review_data[$count]->rating >= $star)
                                    {
                                        $class_name = 'text-warning';
                                    }
                                    else
                                    {
                                        $class_name = 'star-light';
                                    }
                                    @endphp
                                     <i class="fas fa-star {{ $class_name }} mr-1"></i>
                                     @php
                                }
                              @endphp

                              <p>{{ $object->review_data[$count]->user_review }}</p>
                                <br />

                                  @php  if($object->review_data[$count]->array_image[0] !='')
                                  {

                                    for ($i = 0; $i < count($object->review_data[$count]->array_image ); ++$i) {
                                      echo '<a target="_blank" href='.$object->review_data[$count]->image_url .'/'.$object->review_data[$count]->array_image[$i] .'> <img src='.$object->review_data[$count]->image_url .'/'.$object->review_data[$count]->array_image[$i] .' width="100px" height="100px" /></a>';

                                    }

                                  }

                                @endphp

                            </div>
                          <div class="card-footer text-right"> Post On
                              {{  $object->review_data[$count]->date_time }}
                          </div>
                        </div>
                    </div>
                </div>
              @endfor


            @endif
              {{-- /////////////// --}}

          </div>
      </div>
      <div class="col-lg-4 px-3 py-2 bg-white">
        <h3>Review Form</h3>

        <form action="{{ route('rating') }}" id="ratting_form" method="POST" enctype='multipart/form-data' >
          @csrf
          <div class="form-floating mb-3">
              <h4 class="text-center mt-2 mb-4">
              <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
            </h4>
              <span id="errNm3"></span>

          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control bg-transparent" id="full_name" name="full_name" placeholder="Your Full Name" data-error="#errNm1">
              <label for="name">Full Name</label>
              <span id="errNm1"></span>
          </div>


           <div class="form-floating mb-3">
              <input type="email" class="form-control bg-transparent" id="email" name="email" placeholder="Your Email" data-error="#errNm2">
              <label for="name">Email ID</label>
              <span id="errNm2"></span>
          </div>

           <div class="form-floating mb-3">
              <textarea class="form-control bg-transparent" id="desc" data-error="#errNm3" name="desc"></textarea>
              <label for="name">Message</label>
              <span id="errNm3"></span>
          </div>

          <div class="form-floating mb-3">
                <input type="file" name="image[]" id="image" class="form-control" multiple accept="image/*">
                <div class="gallery"></div>
              <label for="name">Image</label>
          </div>
          <div class="form-floating mb-3">
              <input type="hidden" name="rating_data" data-error="#errNm0" id="rating_data_input">
              <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">

          <input type="submit" name="Submit" class="btn btn-primary" id="save_review" value="Submit">

          </div>

        </form>
      </div>
    </div>
  </div>
</section>

@endsection
@push("after-scripts")
<script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>

  <script>
    $(document).ready(function(){
        $('.price_id').each(function(){

            var price_id = $(this).val();
            var ss =  $('#start_time_'+ price_id).val();
            $('#start_time_'+price_id).on('change',function(){
                // $(this).css('background-color','red');
                   $('.book_now_'+price_id).prop('disabled',false);
                $('.start_time_input_'+price_id).val($(this).val());
            })

        })




        //  $('.price_id').val();
        // alert(price_id);


    })

    var imagesPreview = function(input, placeToInsertImagePreview) {

    if (input.files) {
        var filesAmount = input.files.length;

        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();

            reader.onload = function(event) {
                $($.parseHTML('<img width="50px" height="50px" style="border:1px solde red; ">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
            }

            reader.readAsDataURL(input.files[i]);
        }
    }

    };

    $('#image').on('change', function() {
    imagesPreview(this, 'div.gallery');
    });


     $('#booknow4').on('click',function(e){
        e.preventDefault();
        var start_date = $('#start_date').val()
        var person_text = $('#person_text').val()

        if(start_date == "")
        {
          $('#error_date').text('Please Select Date');
          return false
        }


        $('.price_details_cont').css('display',"block");
        $('#booknow4').prop('disabled',true);
        $('#error_date').text('');


        $('.person_input').val(person_text)
        $('.date_input').val(start_date);



      // alert();


    })

    var dateToday = new Date();

     $("#start_date").datepicker({
          format: 'dd-mm-yyyy',
          orientation: 'bottom',
          'startDate': dateToday
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

      $('#start_date').on('change', function(){
           $('#booknow4').prop('disabled',false);
      })

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

$(document).ready(function(){

  var rating_data = 0;

    // $('#add_review').click(function(){

    //     $('#review_modal').modal('show');

    // });

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');
        $('#rating_data_input').val(rating_data);
    });




     $("#ratting_form").validate({
            ignore: [],
            rules: {
                full_name :'required',
                email: "required",
                desc: "required",
                rating_data:'required'
            },
            messages: {
                rating_data:'Please Select Start',
                full_name:'Please Enter Full Name',
                email: "Please Enter Email",
                desc: "Please Enter Meaasge",
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
              form.submit();



          }

        });

    load_rating_data();

    function load_rating_data()
    {

       $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                  }
              });

        var ajaxurl = "{!! route('display_rating') !!} ";
        var product_id = $('#product_id').val();

        $.ajax({
            url: ajaxurl,
            method:"POST",
            data:
            {
              product_id:product_id
            },
            dataType:"JSON",
            success:function(data)
            {
              // console.log(data);

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

            }
        })
    }

});

  </script>

@endpush

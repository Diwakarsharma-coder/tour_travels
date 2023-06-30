@extends('layouts.master')
@section('title','Destination')
@push("after-styles")

@endpush
@section('content')
        
       
@section('header-section')
 <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Destination</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('about-us') }}">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Destination</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
@endsection     
    

    
    <!-- Destination Start -->
    <div class="container-xxl py-5 destination">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Destination</h6>
                <h1 class="mb-5">Popular Destination</h1>
            </div>
            <div class="row g-3">
                @foreach($product as $value)
                <div class="col-lg-3 col-md-6">
                    
                                              <!-- Card -->
                        <div class="card">

                          <!-- Card image -->
                          <div class="view overlay">
                            <img class="card-img-top" src="{{ asset('product'.'/'.$value->image)}}"
                              alt="Card image cap">
                            <a href="#!">
                              <div class="mask rgba-white-slight"></div>
                            </a>
                          </div>

                          <!-- Card content -->
                          <div class="card-body">

                            <!-- Title -->
                            <h4 class="card-title"> ₹  {{ $value->price }}</h4>
                            <!-- Text -->
                            <p class="card-text">{{ $value->title }}.</p>
                            {{-- <p class="card-text">{{ $value->description }}.</p> --}}
                            <!-- Button -->
                            <a href="{{ route('product_details',$value->id) }}" class="btn btn-primary">Book Now</a>

                          </div>

                        </div>
                        <!-- Card -->
                    
                </div>
                @endforeach
              
            </div>
        </div>
    </div>
    <!-- Destination Start -->


@endsection
@push("after-scripts")
  
@endpush

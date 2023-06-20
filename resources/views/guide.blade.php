@extends('layouts.master')
@section('title','Home')
@push("after-styles")

@endpush
@section('content')
        
       
@section('header-section')
 <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Guides</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('about-us') }}">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Guides</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
@endsection     


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Travel Guide</h6>
                <h1 class="mb-5">Meet Our Guide</h1>
            </div>
            <div class="row g-4">
               
                @foreach($employee as $value)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('employee').'/'.$value->image}}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">
                              <a class="btn btn-square mx-1" target="_blank" href="{{ $value->facebook_link }}"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" target="_blank" href="{{ $value->twi_link }}"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href="{{ $value->inst_link }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="text-center p-4">
                             <h5 class="mb-0">{{ $value->first_name . ' ' .$value->last_name }}</h5>
                            <small>{{ $value->language }}</small>
                        </div>
                    </div>
                </div>

                @endforeach
                
                


            </div>
        </div>
    </div>
    <!-- Team End -->
        
    

@endsection
@push("after-scripts")
  
@endpush
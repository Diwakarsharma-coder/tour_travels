@extends('layouts.master')
@section('title','Success')
@push("after-styles")

@endpush
@section('content')
        
       
@section('header-section')
 <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Success </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                
                                <li class="breadcrumb-item text-white active" aria-current="page">Success</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
@endsection     
    <div class="container">
            <div class="row text-center justify-content-center">
                <div class="col-sm-6 col-sm-offset-3">
                <br><br> <h2 style="color:#0fad00">Success</h2>
                <img width="100px" height="100px" src="{{ asset('images/success.png') }}">
                <h3>Dear, {{ $cust->first_name .' '. $cust->last_name }}</h3>
                <p style="font-size:20px;color:#5C5C5C;">Thank you for Booking your tour . We have sent you an email "{{ $cust->email }}" with your details
                Please go to your above email now.</p>
                <a href="{{ route('home') }}" class="btn btn-primary">HOME</a>
            <br><br>
                </div>
                
            </div>
        </div>



    

@endsection
@push("after-scripts")
  
@endpush

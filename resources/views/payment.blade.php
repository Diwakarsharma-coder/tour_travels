@extends('layouts.master')
@section('title','About Us')
@push("after-styles")

@endpush
@section('content')
        
       
@section('header-section')
 <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown">About Us</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('about-us') }}">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
@endsection     
    
    <div class="container">
            <div class="row text-center">
                <div class="col-6">
                    <form method="POST" action="{{ route('make-order') }}">
                        @csrf
                      <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" aria-describedby="emailHelp">
                        
                      </div>
                     
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
                
            </div>
    </div>

    
@endsection
@push("after-scripts")
  
@endpush

@extends('dashboard.layouts.master')
@section('title','Booking Details')
@push("after-styles")

@endpush
@section('content')
        
       
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Booking Details View</h1>             
                    </div>

                    <div class="row">
                        <div class="col-10 m-5">
                       
                        <form >
                            @csrf

                            <h3>Booking Details</h3>

                            <div class="form-group">
                                    <label for="">Razorpay id</label>
                                    <input type="text" name="first_name" class="form-control" disabled value="{{$data->razorpay_id}}"/>
                            </div>


                            <div class="form-group">
                                    <label for="">Order Id</label>
                                    <input type="text" name="last_name" class="form-control" disabled value="{{$data->order_id}}"/>
                            </div>

                            <div class="form-group">
                                    <label for="">price</label>
                                    <input disabled type="email" name="email" id="email" class="form-control"  value="{{$data->price}}" >
                            </div>


                            <div class="form-group">
                                    <label for="">Start Date</label>
                                    <input disabled type="text" name="website" id="website" class="form-control"  value="{{$data->start_date}}">
                            </div>

                            
                            <div class="form-group">
                                    <label for="">Location</label>
                                    <input disabled type="text" name="website" id="website" class="form-control"  value="{{$data->location}}">
                            </div>

                            <div class="form-group">
                                    <label for="">Title</label>
                                    <input disabled type="text" name="website" id="website" class="form-control"  value="{{$price_details->price_title}}">
                            </div> 
                            <div class="form-group">
                                    <label for="">Description</label>
                                    <input disabled type="text" name="website" id="website" class="form-control"  value="{{ $price_details->price_desc }}">
                            </div>

                            <div class="form-group">
                                    <label for="">Guide</label>
                                     <select disabled class="form-select">
                                      <option <?php if($data->guide ==1 ){ echo 'Selected' ; } ?> value="1">Frenc- Guide</option>
                                      <option <?php if($data->guide ==2 ){ echo 'Selected' ;} ?> value="2">English- Guide</option>
                                      <option <?php if($data->guide ==3 ){ echo 'Selected' ;} ?> value="3">German - Guide</option>
                                      <option <?php if($data->guide ==4 ){ echo 'Selected' ;} ?> value="4">Russian- Guide</option>
                                    </select>
                            </div>
                           

                            <hr>
                            
                            <h3>Customer Details</h3>

                            <div class="form-group">
                                <label for="">First Name</label>
                                <input disabled type="text" class="form-control" value="{{ $cust->first_name }}">
                            </div>

                            <div class="form-group">
                                <label for="">Lats Name</label>
                                <input disabled type="text" class="form-control" value="{{ $cust->last_name }}">
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input disabled type="text" class="form-control" value="{{ $cust->email }}">
                            </div>

                            <div class="form-group">
                                <label for="">Phone</label>
                                <input disabled type="text" class="form-control" value="{{ $cust->phone }}">
                            </div>


                            <hr>
                             <h3>Product / Service Details</h3>

                            <div class="form-group">
                                <label for="">Title</label>
                                <input disabled type="text" class="form-control" value="{{ $product->title }}">
                            </div>

                            <div class="form-group">
                                <label for="">location</label>
                                <input disabled type="text" class="form-control" value="{{ $product->location }}">
                            </div>

                            <div class="form-group">
                                <label for="">Day</label>
                                <input disabled type="text" class="form-control" value="{{ $product->day }}">
                            </div>

                            <div class="form-group">
                                <label for="">Person</label>
                                <input disabled type="text" class="form-control" value="{{ $product->person }}">
                            </div>






                             <div class="form-group">
                                    {{-- <label for="">Image</label> --}}
                                    
                                    @php
                                        $array = explode("|", $product->image);
                                        @endphp
                                        @foreach($array as $val)
                                            {{-- <div class="old_imageData"> --}}
                                                <img width="200px" class="old_imageData" style="border: 1px solid #ccc; margin: 5px" height="200px" src="{{ asset('product/'.$val) }}">
                                            {{-- </div> --}}

                                        @endforeach
                            </div>


                            <div class="form-group">
                                <a class="btn btn-info" href="{{route('booking.index')}}">Back</a>
                            </div>

                            </form>
                        </div>
                        
                    </div>

                </main>

@endsection
@push("after-scripts")
  
@endpush

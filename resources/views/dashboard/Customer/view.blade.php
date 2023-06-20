@extends('dashboard.layouts.master')
@section('title','Dashboard')
@push("after-styles")

@endpush
@section('content')


                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Customer</h1>
                    </div>

                    <div class="row">
                        <div class="col-6 m-5">

                        <form >
                            @csrf
                            <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" name="name" class="form-control" disabled value="{{$data->first_name}}"/>
                            </div>

                            <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input disabled class="form-control"  value="{{$data->last_name}}" >
                            </div>

                            <div class="form-group">
                                    <label for="">Email</label>
                                    <input disabled class="form-control"  value="{{$data->email}}" >
                            </div>

                            <div class="form-group">
                                    <label for="">Mobile</label>
                                    <input disabled class="form-control"  value="{{$data->phone}}" >
                            </div>


                            

                            <div class="form-group">
                                    <label for="">Images </label>
                                    {{-- <img src="{{ asset('images')}}/{{$data->logo}}"  width="100px" height="100px"  alt=""> --}}

                            </div>
                           
                                {{-- <div class="old_imageData"> --}}
                                    <img width="200px" class="old_imageData" style="border: 1px solid #ccc; margin: 5px" height="200px" src="{{ asset('customer/'.$data->image) }}">
                                {{-- </div> --}}

                            <div class="form-group">
                                <a href="{{route('customer.index')}}" class="btn btn-info">Back</a>
                            </div>

                            </form>
                        </div>

                    </div>

                </main>

@endsection
@push("after-scripts")

@endpush

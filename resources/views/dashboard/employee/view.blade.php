@extends('dashboard.layouts.master')
@section('title','Dashboard')
@push("after-styles")

@endpush
@section('content')
        
       
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Employee</h1>             
                    </div>

                    <div class="row">
                        <div class="col-6 m-5">
                       
                        <form >
                            @csrf

                            <div class="form-group">
                                    <label for="">Company Name</label>
                                    <input type="text" name="name" class="form-control" disabled value="{{$company->name}}"/>
                            </div>


                            <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name" class="form-control" disabled value="{{$data->first_name}}"/>
                            </div>


                            <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" disabled value="{{$data->last_name}}"/>
                            </div>

                            <div class="form-group">
                                    <label for="">Email</label>
                                    <input disabled type="email" name="email" id="email" class="form-control"  value="{{$data->email}}" >
                            </div>


                            <div class="form-group">
                                    <label for="">Phone</label>
                                    <input disabled type="text" name="website" id="website" class="form-control"  value="{{$data->phone}}">
                            </div>

                           


                            <div class="form-group">
                                <a href="{{route('employee.index')}}">Back</a>
                            </div>

                            </form>
                        </div>
                        
                    </div>

                </main>

@endsection
@push("after-scripts")
  
@endpush

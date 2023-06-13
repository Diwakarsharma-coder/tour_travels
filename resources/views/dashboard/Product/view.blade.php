@extends('dashboard.layouts.master')
@section('title','Dashboard')
@push("after-styles")

@endpush
@section('content')
        
       
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Company</h1>             
                    </div>

                    <div class="row">
                        <div class="col-6 m-5">
                       
                        <form >
                            @csrf
                            <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" disabled value="{{$data->name}}"/>
                            </div>

                            <div class="form-group">
                                    <label for="">Email</label>
                                    <input disabled type="email" name="email" id="email" class="form-control"  value="{{$data->email}}" >
                            </div>


                            <div class="form-group">
                                    <label for="">website</label>
                                    <input disabled type="text" name="website" id="website" class="form-control"  value="{{$data->website}}">
                            </div>

                            <div class="form-group">
                                    <label for="">Logo</label>
                                    <img src="{{ asset('images')}}/{{$data->logo}}"  width="100px" height="100px"  alt="">
                            </div>


                            <div class="form-group">
                                <a href="{{route('company.index')}}">Back</a>
                            </div>

                            </form>
                        </div>
                        
                    </div>

                </main>

@endsection
@push("after-scripts")
  
@endpush

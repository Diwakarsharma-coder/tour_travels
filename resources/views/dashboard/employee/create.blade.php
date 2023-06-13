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
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form action="{{ route('employee.store') }}" method="POST" enctype='multipart/form-data'>
                            @csrf
                            <div class="form-group">
                                    <label for="">Company Name</label>
                                    <select name="company_id" id="">
                                    @foreach($company as $com)
                                        
                                        <option value="{{$com->id}}">{{$com->name}}</option>
                                        
                                        @endforeach

                                    </select>
                                    
                            </div>

                            <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name" id="name" class="form-control">
                            </div>

                            <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" id="name" class="form-control">
                            </div>

                            <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="email" class="form-control">
                            </div>


                            <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="number" name="phone" id="website" class="form-control">
                            </div>

                            


                            <div class="form-group">
                                <input type="submit" name="Submit" value="Submit">
                                <a href="{{ route('employee.index')}}">BACK</a>
                            </div>

                            </form>
                        </div>
                        
                    </div>

                </main>

@endsection
@push("after-scripts")
  
@endpush

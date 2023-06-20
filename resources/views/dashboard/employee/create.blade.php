@extends('dashboard.layouts.master')
@section('title','Dashboard')
@push("after-styles")

@endpush
@section('content')
        
       
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Add Employee / Guider</h1>             
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
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name" id="name" class="form-control" value="{{ old('first_name') }}">
                            </div>

                            <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" id="name" class="form-control" value="{{ old('last_name') }}">
                            </div>

                            <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            </div>


                            <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="number" maxlength="12" name="phone" id="website" class="form-control" value="{{ old('phone') }}">
                            </div>

                                
                            <div class="form-group">
                                <label for="">Language Guide</label>
                                <input type="text" name="language" id="language" class="form-control" value="{{ old('language') }}">
                            </div>


                            <div class="form-group">
                                <label for="">Facebook Link</label>
                                <input type="text" name="facebook_link" id="facebook_link" class="form-control" value="{{ old('facebook_link') }}">
                            </div>


                            <div class="form-group">
                                <label for="">Instagram link</label>
                                <input type="text" name="inst_link" id="inst_link" class="form-control" value="{{ old('inst_link') }}">
                            </div>


                            <div class="form-group">
                                <label for="">Twitter Link</label>
                                <input type="text" name="twi_link" id="twi_link" class="form-control" value="{{ old('twi_link') }}">
                            </div>

                            <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="image" id="image" class="form-control"  accept="image/*" onchange="loadFile(event)">
                                    <img id="output" width="100px" height="100px" src="{{ asset('images/noimage.jpg') }}" />
                            </div>

                            <div class="form-group">
                                <input type="submit" name="Submit" class="btn btn-primary" value="Submit">
                                <a class="btn btn-info" href="{{ route('employee.index')}}">BACK</a>
                            </div>

                            </form>
                        </div>
                        
                    </div>

                </main>

@endsection
@push("after-scripts")
  <script>
      var loadFile = function(event) {
     var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }
      };

  </script>
@endpush

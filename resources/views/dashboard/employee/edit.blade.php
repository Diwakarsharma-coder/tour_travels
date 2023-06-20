@extends('dashboard.layouts.master')
@section('title','Employee Update')
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
                        <form action="{{ route('employee.update', $data->id) }}" method="POST" enctype='multipart/form-data'>
                            @csrf

                            

                            <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name" id="name" class="form-control" value="{{$data->first_name}}">
                            </div>

                            
                            <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" id="name" class="form-control" value="{{$data->last_name}}">
                            </div>

                            <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{$data->email}}">
                            </div>


                            <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="number"  maxlength="12" name="phone" id="website" class="form-control"  value="{{$data->phone}}">
                            </div>

                            <div class="form-group">
                                    <label for="">Language</label>
                                    <input type="text" name="language" id="language" class="form-control"  value="{{$data->language}}">
                            </div>
                           
                           <div class="form-group">
                                <label for="">Facebook Link</label>
                                <input type="text" name="facebook_link" id="facebook_link" class="form-control" value="{{ $data->facebook_link }}">
                            </div>


                            <div class="form-group">
                                <label for="">Instagram link</label>
                                <input type="text" name="inst_link" id="inst_link" class="form-control" value="{{ $data->inst_link  }}">
                            </div>


                            <div class="form-group">
                                <label for="">Twitter Link</label>
                                <input type="text" name="twi_link" id="twi_link" class="form-control" value="{{ $data->twi_link }}">
                            </div>

                           <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="image" id="image" class="form-control"  accept="image/*" onchange="loadFile(event)">
                                    <input type="hidden" name="old_image" value="{{ $data->image }}">
                                    <img id="output" width="100px" height="100px" src="{{ asset('employee').'/'.$data->image }}" />
                            </div>


                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="Submit" value="Submit">
                                <a href="{{ route('employee.index') }}" class="btn btn-info">Back</a>
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

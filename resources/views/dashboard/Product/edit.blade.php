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
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form action="{{ route('company.update', $data->id) }}" method="POST" enctype='multipart/form-data'>
                            @csrf
                            <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{$data->name}}">
                            </div>

                            <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{$data->email}}">
                            </div>


                            <div class="form-group">
                                    <label for="">website</label>
                                    <input type="text" name="website" id="website" class="form-control" value="{{$data->website}}">
                            </div>

                            <div class="form-group">
                                    <label for="">Logo</label>
                                    <input type="file" name="image" id="image" class="form-control">
                            </div>


                            <div class="form-group">
                                <input type="submit" name="Submit" value="Submit">
                            </div>

                            </form>
                        </div>
                        
                    </div>

                </main>

@endsection
@push("after-scripts")
  
@endpush

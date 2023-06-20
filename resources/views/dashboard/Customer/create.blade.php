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
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form action="{{ route('customer.store') }}" method="POST" enctype='multipart/form-data'>
                            @csrf
                            <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}">
                            </div>

                            <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}">
                            </div>


                            <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            </div>

                            <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control" onkeypress="return validateNumber(event)" value="{{ old('phone') }}">
                            </div>


                            <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                            </div>


                            <div class="form-group">
                                    <label for=""> Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                            </div>

                            <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="image[]" id="image" class="form-control"  accept="image/*" onchange="loadFile(event)">
                                    <img id="output" width="100px" height="100px" src="{{ asset('images/noimage.png') }}" />
                            </div>


                            <div class="form-group mt-3">
                                <input type="submit" name="Submit" class="btn btn-primary" value="Submit">
                                <a href="{{ route('customer.index')}}" class="btn btn-info">BACK</a>
                            </div>

                            </form>
                        </div>

                    </div>

                </main>


@endsection
@push("after-scripts")
<script>
    var imagesPreview = function(input, placeToInsertImagePreview) {

    if (input.files) {
        var filesAmount = input.files.length;

        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();

            reader.onload = function(event) {
                $($.parseHTML('<img width="150px" height="150px" style="border:1px solde red; ">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
            }

            reader.readAsDataURL(input.files[i]);
        }
    }

    };

    $('#image').on('change', function() {

    imagesPreview(this, 'div.gallery');
    });


     var loadFile = function(event) {
     var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }
      };

</script>
@endpush

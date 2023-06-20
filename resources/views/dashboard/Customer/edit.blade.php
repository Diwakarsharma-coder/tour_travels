@extends('dashboard.layouts.master')
@section('title', 'Dashboard')
@push('after-styles')
@endpush
@section('content')


    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Product & service</h1>
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
                <form action="{{ route('product.update', $data->id) }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ $data->title }}">
                    </div>

                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" name="price" id="price" class="form-control"  value="{{ $data->price }}"
                            onkeypress="return validateNumber(event)">
                    </div>


                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $data->description }}</textarea>
                        {{-- <input type="text" name="description" id="description" class="form-control"> --}}
                    </div>

                    <div class="form-group">
                        <label for="">Policy</label>
                        {{-- <input type="text" name="policy" id="policy" class="form-control"> --}}
                        <textarea name="policy" id="policy" cols="30" rows="10" class="form-control">{{ $data->policy }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image[]" id="image" class="form-control" multiple accept="image/*">
                        <input type="hidden" name="old_image" id="" value="{{ $data->image}}">
                        <div class="gallery"></div>

                        @php
                        $array = explode("|", $data->image);
                        @endphp
                        @foreach($array as $val)
                            {{-- <div class="old_imageData"> --}}
                                <img width="200px" class="old_imageData" style="border: 1px solid #ccc; margin: 5px" height="200px" src="{{ asset('product/'.$val) }}">
                            {{-- </div> --}}

                        @endforeach

                    </div>


                    <div class="form-group mt-3">
                        <input type="submit" name="Submit" class="btn btn-primary" value="Submit">
                        <a href="{{ route('product.index') }}" class="btn btn-info">BACK</a>
                    </div>

                </form>
            </div>

        </div>

    </main>

@endsection
@push('after-scripts')

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
        $('.old_imageData').css('display','none');

    imagesPreview(this, 'div.gallery');
    });


</script>
@endpush

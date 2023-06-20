@extends('dashboard.layouts.master')
@section('title','Dashboard')
@push("after-styles")

@endpush
@section('content')


                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Product & Service</h1>
                    </div>

                    <div class="row">
                        <div class="col-6 m-5">

                        <form >
                            @csrf
                            <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="name" class="form-control" disabled value="{{$data->title}}"/>
                            </div>

                            <div class="form-group">
                                    <label for="">Price</label>
                                    <input disabled type="email" name="email" id="email" class="form-control"  value="{{$data->price}}" >
                            </div>


                            <div class="form-group">
                                    <label for="">Descrption</label>
                                    {{-- <input disabled type="text" name="website" id="website" class="form-control"  value="{{$data->description}}"> --}}
                                    <textarea name="" id="" cols="30" class="form-control" rows="10" disabled>{{ $data->description}}</textarea>
                            </div>


                            <div class="form-group">
                                <label for="">Policy</label>
                                <textarea name="" id="" cols="30" rows="10" class="form-control" disabled>{{ $data->plicy}}</textarea>
                        </div>

                            <div class="form-group">
                                    <label for="">Images </label>
                                    {{-- <img src="{{ asset('images')}}/{{$data->logo}}"  width="100px" height="100px"  alt=""> --}}

                            </div>
                            @php
                            $array = explode("|", $data->image);
                            @endphp
                            @foreach($array as $val)
                                {{-- <div class="old_imageData"> --}}
                                    <img width="200px" class="old_imageData" style="border: 1px solid #ccc; margin: 5px" height="200px" src="{{ asset('product/'.$val) }}">
                                {{-- </div> --}}

                            @endforeach

                            <div class="form-group">
                                <a href="{{route('product.index')}}" class="btn btn-info">Back</a>
                            </div>

                            </form>
                        </div>

                    </div>

                </main>

@endsection
@push("after-scripts")

@endpush

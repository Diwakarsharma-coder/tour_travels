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
                        <form action="{{ route('product.store') }}" method="POST" enctype='multipart/form-data'>
                            @csrf
                            <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="title" id="title" class="form-control">
                            </div>

                            <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="text" name="price" id="price" class="form-control">
                            </div>


                            <div class="form-group">
                                    <label for="">Description</label>
                                    <input type="text" name="description" id="description" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Policy</label>
                                <input type="text" name="policy" id="policy" class="form-control">
                            </div>

                            <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="image[]" id="image" class="form-control" multiple accept="image/*">
                            </div>


                            <div class="form-group mt-3">
                                <input type="submit" name="Submit" class="btn btn-primary" value="Submit">
                                <a href="{{ route('product.index')}}" class="btn btn-info">BACK</a>
                            </div>

                            </form>
                        </div>

                    </div>

                </main>

@endsection
@push("after-scripts")

@endpush

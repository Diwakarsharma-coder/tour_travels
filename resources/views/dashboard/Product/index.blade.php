@extends('dashboard.layouts.master')
@section('title','Dashboard')
@push("after-styles")

@endpush
@section('content')


                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Product & Service</h1>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                            <a href="{{ route('product.create')}}" class="btn">ADD</a>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>website</th>
                                            <th>Logo</th>
                                            <th>Action</th>

                                    </thead>

                                    <tbody>

                                        @foreach($data as $value)
                                            <tr>
                                                <td>{{$value->name}}</td>
                                                <td>{{$value->email}}</td>
                                                <td>{{$value->website}}</td>
                                                <td><img src="{{ asset('images')}}/{{$value->logo}}"  width="100px" height="100px"  alt=""></td>
                                                <td>
                                                    <a href="{{ route('product.edit', $value->id)}}">Edit</a> |
                                                    <a href="{{ route('product.view', $value->id )}}">View</a> |
                                                    <a href="{{ route('product.delete',$value->id )}}">Delete</a>
                                                  </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                </main>

@endsection
@push("after-scripts")

@endpush

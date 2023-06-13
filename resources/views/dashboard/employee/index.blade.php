@extends('dashboard.layouts.master')
@section('title','Dashboard')
@push("after-styles")

@endpush
@section('content')
        
       
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Employee</h1>             
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

                            <a href="{{ route('employee.create')}}" class="btn">ADD</a>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Company ID</th>
                                            <th>Action</th>
                                            
                                    </thead>
                                    
                                    <tbody> 
                                            
                                        @foreach($data as $value)
                                            <tr>
                                                <td>{{$value->first_name}}</td>
                                                <td>{{$value->last_name}}</td>
                                                <td>{{$value->email}}</td>
                                                <td>{{$value->phone}}</td>
                                                <td>{{$value->company_id}}</td>
                                                <td>
                                                    <a href="{{ route('employee.edit', $value->id)}}">Edit</a> |
                                                    <a href="{{ route('employee.view',[ $value->id ,$value->company_id] )}}">View</a> |
                                                    <a href="{{ route('employee.delete',$value->id )}}">Delete</a>
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

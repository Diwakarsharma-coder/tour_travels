@extends('dashboard.layouts.auth')
@section('title', __('Log-in'))
@section('content')
   <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                         <img class=" mx-auto d-block" src="{{ asset('images/logo.png') }}" width="180px" height="50px">

                                        <h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form name="form" method="POST" action="{{ route('login') }}">
                                            {{ csrf_field() }}
                                             <?php
                                            if (Cookie::get('admin_email') !== null) {
                                                $email = Cookie::get('admin_email');
                                            }
                                            if (Cookie::get('admin_password') !== null) {
                                                $password = Cookie::get('admin_password');
                                            }
                                            ?>
                                             @if ($errors->any())
                                                            <div class="alert alert-danger m-b-0 text-left " style="margin-top:10%">
                                                 
                                                    @foreach ($errors->all() as $error)
                                                        <div>{{ $error }}</div>
                                                    @endforeach
                                                </div>
                                            @endif
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" name="email"  value="{{ isset($email) ? $email : old('email') }}" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" name="password" value="{{ isset($password) ? $password : '' }}" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            {{-- <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div> --}}
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                {{-- <a class="small" href="{{ route('password.request') }}">Forgot Password?</a> --}}
                                                {{-- <a class="btn btn-primary" type="submit">Login</a> --}}
                                                <button type="submit" class="btn btn-primary" >Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
@endsection

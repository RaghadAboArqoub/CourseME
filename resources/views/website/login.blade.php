@extends('website.layout')
@section('content')
<div class="container" style="width:2000px;">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-20 col-lg-15 col-md-11 " style="padding-top: 50px;">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block ">
                                <img class="img-thumbnail" style=" height:100%;"
                                    src="{{asset('website/homepage/assets/img/logo.jpeg')}}" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="{{route('login')}}" method="POST">
                                        @csrf
                                        @if(session()->has('message'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('message') }}
                                        </div>
                                        @endif

                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" name="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                            <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password"
                                                class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Password">
                                            <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                                        </div>
                                        <button type="submit" class="btn btn-warning btn-user btn-block">Login </button>


                                    </form>
                                    <hr>

                                    <div class="text-center text-warning">
                                        <a class="small text-dark" href="{{route('register')}}">Don't have an account?
                                            Join Us!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
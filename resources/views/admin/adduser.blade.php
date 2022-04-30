@extends('admin.layout')
@section('title')


<h1 class="text-warning" style="padding-left:550px;">Add User</h1>


@endsection
@section('content')

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block ">
                    <img class="img-thumbnail" style=" height:100%;" src="{{asset('website/image/learn-hero.svg')}}"
                        alt="">
                </div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Add User!</h1>
                        </div>
                        <form class="user" action="{{route('registration')}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                            @endif
                            @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                            @endif
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="first_name"
                                        name="first_name" placeholder="Enter  First Name...">
                                    <span class="text-danger">@error('first_name'){{ $message }}
                                        @enderror</span>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="last_name"
                                        name="last_name" placeholder="Enter Last Name...">
                                    <span class="text-danger">@error('last_name'){{ $message }} @enderror</span>

                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email" name="email"
                                    placeholder="Enter Email Address...">
                                <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Password" name="password">
                                    <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleRepeatPassword" placeholder="Confirm Password"
                                        name="confirm_password">
                                    <span class="text-danger">@error('confirm_password'){{ $message }}
                                        @enderror</span>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-warning btn-user btn-block">Add user
                            </button>
                            <hr>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
@endsection
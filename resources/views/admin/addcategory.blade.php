@extends('admin.layout')
@section('title')


<h1  class="text-warning" style="padding-left:550px;">Add category</h1>


@endsection
@section('content')


<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row  justify-content-center">
                        <img src="{{asset('image/category.jpg')}}" alt="" width="450" height="300">

                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Insert data to add category!</h1>
                                </div>
                                <form class="user" action="{{route('addCategory')}}" method="POST">
                                    @csrf
                                    @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="category_name"
                                            name="category_name" placeholder="Enter Catgory Name...">
                                            <span class="text-danger">@error('category_name'){{ $message }} @enderror</span>

                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" name="category_visible"
                                                id="customCheck">
                                            <label class="custom-control-label" for="customCheck">
                                                Status</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-warning btn-user btn-block">Add </button>

                                </form>

                            </div>
                        </div>
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
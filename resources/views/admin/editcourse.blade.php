@extends('admin.layout')
@section('title')
<h1 class="text-warning" style="padding-left:550px;">Edit Course</h1>
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
                            <h1 class="h4 text-gray-900 mb-4">Edit Course!</h1>
                        </div>
                        <form class="user" action="{{route('editCourse',['id' => $courses->id])}}" method="POST"
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
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="title" name="title"
                                    value="{{$courses->title}}" placeholder="Enter Course Title...">
                                <span class="text-danger">@error('title'){{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control form-control-user" value="{{$courses->description}}"
                                    name="description" id="description" rows="3">{{$courses->description}}</textarea>
                                <span class="text-danger">@error('description'){{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="second_resource"
                                    name="second_resource" value="{{$courses->second_resource}}"
                                    placeholder="Enter Second Resource...">
                                <span class="text-danger">@error('second_resource'){{ $message }} @enderror</span>
                            </div>
                            <div class="form-group row">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">first Resource</label>
                                    <input type="file" class="form-control-file" id="first_resource"
                                        name="first_resource">
                                    {{$courses->first_resource}}
                                    <span class="text-danger">@error('first_resource'){{ $message }} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1"> Course Image </label>
                                    <input type="file" class="form-control-file" name="image" id="image">
                                    {{$courses->image}}
                                    <span class="text-danger">@error('image'){{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" name="category_visible"
                                        id="customCheck">
                                    <label class="custom-control-label" for="customCheck">
                                        Status</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-warning btn-user btn-block">Edit Course
                            </button>
                            <hr>

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
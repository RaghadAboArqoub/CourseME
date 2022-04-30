@extends('admin.layout')
@section('title')


<h1 class="text-warning" style="padding-left:550px;">Enroll Request</h1>


@endsection
@section('content')
<br><br>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Course table </h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <br>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="50%">
                <thead>
                    <tr class="text-center">
                        <th>User</th>
                        <th>Course</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($course as $key )
                    <tr class="text-center">
                        @foreach($key->users as $row )
                        <td class="text-center">{{$key->title}}</td>
                        <td class="text-center">{{$row->email}}</td>
                        <td class="text-center">{{$row->pivot->enroll_flag}}</td>
                        <td class="justify-content-center">
                            <form method="POST"
                                action="{{ route('enroll', ['user_id'=>$row->id,'course_id'=>$key->id]) }}">
                                @csrf
                                @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                                @endif
                                <button class="btn btn-xs btn-primary btn-flat show_confirm"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                        class="bi bi-check" viewBox="0 0 16 16">
                                        <path
                                            d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                    </svg></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
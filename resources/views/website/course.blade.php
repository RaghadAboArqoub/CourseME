@extends('website.layouthome')
@section('content')
<header class="masthead" style="background-image:url('{{asset('images/'.$course->image)}}');">
    <div class="container">
        <div class="masthead-heading text-uppercase text-black">{{$course->title}}</div>
        <div class="masthead-heading text-uppercase text-primary">{{$course->description}}
        </div>
        <form class="user" action="{{route('courseEnroll',['id' => $course->id])}}" method="POST">
            @csrf
            @method('POST')
            @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session()->get('message') }}
            </div>
            @endif
            <button type="submit" class="btn btn-warning btn-user btn-block">Enroll </button>
        </form>
    </div>
</header>
<br>
<br>

@foreach($course->users as $key )
@if($key->pivot->enroll_flag == 1 )
@if(Session()->has('user_id'))
<div class="card">
    <div class="card-header">
        First Resource
    </div>
    <div class="card-body">
        <p class="card-text"> <a  class="text-black masthead-heading "href="{{asset('images/'.$course->first_resource)}}"
                download>{{$course->first_resource}} </a></p>
    </div>
</div>
<div class="card">
    <div class="card-header">
        Second Resource
    </div>
    <div class="card-body">
        <p class="card-text"> <a   class="text-black" href="{{$course->second_resource}}">{{$course->second_resource}}</a></p>
    </div>
</div>
@endif
@endif
@endforeach
@endsection
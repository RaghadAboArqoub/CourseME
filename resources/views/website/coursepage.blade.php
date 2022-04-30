@extends('website.layouthome')
@section('content')
<header class="masthead">
    <div class="container">
        <div class="masthead-heading text-uppercase">Learn without limits</div>
        <a class="btn btn-primary btn-xl text-uppercase" href="{{route('login')}}">Join Us</a>
    </div>
</header>
<section class=" bg-light" id="">
    <div class="card-group  w-100 h-90  mr-3">
        @foreach($courses as $row)
        @if($row->status==0)
        <div class="card border border-light shadow p-3 mb-5 bg-white rounded  m-xl-3 ">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">


            </div>
            <div class="card-body">
                <h5 class="card-title p-8"> {{$row->title}}
                </h5>
            </div>
            <a href="{{route('courseViewButton',['id' => $row->id])}}" class="btn btn-warning btn-user btn-block">view
            </a>

        </div>

        @endif
        @endforeach
    </div>
</section>
@endsection
@section('scripts')
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap5.min.js"></script>
@endsection
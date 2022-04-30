@extends('website.layouthome')
@section('content')
<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="masthead-heading text-uppercase">Learn without limits</div>
        <a class="btn btn-primary btn-xl text-uppercase" href="{{route('login')}}">Join Us</a>
    </div>
</header>
<br>
<br>
<!-- Services-->

<section class="page-section" id="">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Services</h2>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-money-bills fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Save money</h4>
                <p class="text-muted">Spend No money on your learning if you plan to take multiple courses simply
                    Just Join Us</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Learn anything</h4>
                <p class="text-muted">Explore any interest or trending topic, take prerequisites, and advance your
                    skills</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-solid fa-brain fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Flexible learning</h4>
                <p class="text-muted">Learn at your own pace, move between multiple courses, or switch to a
                    different course</p>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio Grid-->
<section class=" bg-light" id="">
    <div class="divider header-border animate__heartBeat mt-5 py-4 text-center h2"> Last Added</div>

    <div class="card-group  w-100 h-90  mr-3">
        @foreach($courses as $row)
        @if($row->status==0)
        <div class="card border border-light shadow p-3 mb-5 bg-white rounded  m-xl-3 ">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="{{asset('images/'.$row->image)}}" class="img-fluid" />

            </div>
            <div class="card-body">
                <h5 class="card-title p-8"> {{$row->title}}
                    <a href="{{route('courseViewButton',['id' => $row->id])}}" class="p-5"><svg
                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-binoculars-fill" viewBox="0 0 16 16">
                            <path
                                d="M4.5 1A1.5 1.5 0 0 0 3 2.5V3h4v-.5A1.5 1.5 0 0 0 5.5 1h-1zM7 4v1h2V4h4v.882a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V13H9v-1.5a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5V13H1V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V4h4zM1 14v.5A1.5 1.5 0 0 0 2.5 16h3A1.5 1.5 0 0 0 7 14.5V14H1zm8 0v.5a1.5 1.5 0 0 0 1.5 1.5h3a1.5 1.5 0 0 0 1.5-1.5V14H9zm4-11H9v-.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5V3z" />
                        </svg> </a>

                </h5>
                <p class="card-text">{{$row->description}} </p>


            </div>
        </div>

        @endif
        @endforeach
    </div>

</section>

@endsection
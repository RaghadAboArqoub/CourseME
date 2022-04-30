@extends('website.layouthome')
@section('content')
<!-- About-->
<header class="masthead">
    <div class="container">
        <div class="masthead-heading text-uppercase">Learn without limits</div>
        <a class="btn btn-primary btn-xl text-uppercase" href="{{route('login')}}">Join Us</a>
    </div>
</header>
<section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">About</h2>
        </div>
        <ul class="timeline">
            <li>
                <div class="timeline-image"><img class="rounded-circle img-fluid" /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>Learn for Free</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">Free online courses from the world's top universities and companies.

                        </p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image"></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>Join us</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">Just Join Us , be apart of our family , press enroll wait us to accept and
                            learn without limit!</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-image"></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>Various Learning</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">You start with your passion and knowledge. Then choose a promising topic
                            with the help of our Marketplace Insights tool.</p>
                    </div>
                </div>
            </li>

            <li class="timeline-inverted">
                <div class="timeline-image">
                    <h4>
                        Build
                        <br />
                        Your
                        <br />
                        Story!
                    </h4>
                </div>
            </li>
        </ul>
    </div>
</section>

@endsection
@section('scripts')
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap5.min.js"></script>
@endsection
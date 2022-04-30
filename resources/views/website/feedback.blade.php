@extends('website.layouthome')
@section('content')
<header class="masthead">
    <div class="container">
        <div class="masthead-heading text-uppercase">Learn without limits</div>
        <a class="btn btn-primary btn-xl text-uppercase" href="{{route('login')}}">Join Us</a>
    </div>
</header>
<section class=" bg-light" id="">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Please give us your feedback</h2>
            <br>
            <form class="user" action="{{route('feedBack')}}" method="POST">
                @csrf
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="username" name="username"
                        placeholder="Enter Your Name...">

                </div>
                <br>

                <div class="form-group">
                    <textarea class="form-control " placeholder="Enter Your Feedback..." name="feedback"
                        id="description" rows="3"></textarea>

                </div>
                <br>

                <button type="submit" class="btn btn-warning" style="width: 300px;">Submit </button>


            </form>
            <hr>

        </div>

    </div>


</section>




@endsection
@section('scripts')
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap5.min.js"></script>
@endsection
@extends('admin.layout')
@section('title')


<h1 class="text-warning" style="padding-left:550px;">Dashboard</h1>


@endsection
@section('content')
<br><br>
<br>
<br>

<div class="container-fluid px-4">


    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Categories</div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{$categorycount}}
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Courses</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$coursecount}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">User
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$usercount}}</div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pending Request
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$req}}</div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="card shadow mb-4">

    <div class="card-body">
        <br>
        <br>
        <h1 class="h3 mb-2 text-warning text-center">Users Feedback table </h1>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="50%">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>username</th>
                        <th>feedback</th>

                    </tr>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        @foreach($feedback as $row)
                    <tr class="text-center">
                        <td>{{$row->id}}</td>
                        <td>{{$row->username}}</td>
                        <td>{{$row->feedback}}</td>


                    </tr>

                    @endforeach



                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
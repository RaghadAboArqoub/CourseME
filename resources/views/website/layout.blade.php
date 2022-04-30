<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Course ME|Learn Without Limits</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="website/homepage/assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="website/homepage/css/styles.css" rel="stylesheet" />
    <link href="website/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-dark navbar-expand-lg  bg-black fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"> Course Me</a>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="/">Home page</a></li>
                    <li class="nav-item"><a class="nav-link" href="/courses">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/feedback">Feedback</a></li>
                    <li class="nav-item"> <a type="button" class="btn btn btn-outline-warning "
                            href="{{route('login')}}" style="margin-left: 5px;">Login</a></li>
                    <li class="nav-item"> <a type="button" class="btn btn-warning" href="{{route('register')}}"
                            style="margin-left: 5px;">Register</a></li>

                    </li>
                    @if(Session()->has('user_id'))
                     <li class="nav-item"> <a type="button" class="btn btn-warning" href="{{route('userLogout')}}"
                            style="margin-left: 5px;">Logout</a></li>

                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <br>
    @yield('content')






    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="website/homepage/js/scripts.js"></script>
    <script src="website/vendor/jquery/jquery.min.js"></script>
    <script src="website/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="website/vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</body>

</html>
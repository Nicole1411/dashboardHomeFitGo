<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Home Fit Go</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{URL::asset('img/homefitgo-logo.png')}}" />
        <!-- Custom Google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/stylesdashboard.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-light py-3">
                <div class="container px-5">
                    <a class="navbar-brand" href="./index.php"><span class="fw-bolder text-primary">Home Fit Go</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                            <li class="nav-item"><a class="nav-link" href="./index.php"><i class="bi bi-house-door-fill"></i>&nbsp;Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="resume.html"><i class="bi bi-file-earmark-bar-graph-fill"></i>&nbsp;Reportes</a></li>
                           @if(auth()->check())
                                <li class="text-black">
                                    <label class="nav-link"  href="">&nbsp;&nbsp;&nbsp;<i class="bi bi-person-circle"></i>&nbsp;Bienvenido {{ auth()->user()->NICKNAMEPERSONA }}</label>
                                </li>
                                <li>
                                    <a href="{{route('logout')}}">
                                        <input type="button" class="btn btn-outline-dark" value="LOGOUT" onclick="" />
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{route('login')}}">
                                        <input type="button" class="btn btn-outline-dark" value="LOGIN" onclick="" />
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </nav>


        @yield('content')

    </body>
</html>

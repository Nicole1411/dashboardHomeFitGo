@extends('layouts.menu')

@section('content')
<!-- Header-->
<header class="py-0">
    <div class="container px-1 pb-1">
        <div class="row gx-2 align-items-center">
            <div class="col-sm-6">
                <!-- Header text content-->
                <div class="text-center text-xxl-start">
                    <div class="badge bg-gradient-primary-to-secondary text-white mb-4"><div class="text-uppercase">Entretenimiento &middot; Deporte &middot; Salud</div></div>
                    <div class="fs-3 fw-light text-muted">Para alcanzar tu mejor versión física y potenciar tu bienestar integral</div>
                    <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">Tu entrenador personal virtual </span></h1>
                </div>
            </div>
            <div class="col-sm-6">
                <!-- Header profile picture-->
                <div class="d-flex justify-content-center mt-5 mt-xxl-0">
                    <div class="profile bg-gradient-primary-to-secondary">
                        <img class="profile-img" src="{{URL::asset('img/img4.webp')}}" alt="..." />

                    </div>
                </div>
            </div>
        </div>

    </div>
</header>

<!-- About Section-->
<section class="bg-light py-5">
    <div class="container px-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-xxl-8">
                <div class="text-center my-5">
                    <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">Home Fit Go</span></h2>
                    <p class="lead fw-light mb-4">Te presentamos HOMEFITGO, tu entrenador personal virtual diseñado para revolucionar tu forma física.</p>
                    <p class="text-muted">Nuestro entrenador personal virtual utiliza tecnologías web y Android de última generación para transformar tu rutina de entrenamiento. Con una interfaz intuitiva y amigable, disfrutarás de programas personalizados que se adaptan a tus objetivos específicos.<br> Olvídate de los entrenamientos aburridos y da paso a una experiencia de ejercicio divertida y efectiva. Además, nuestro entrenador virtual te ofrece informes estadísticos detallados para mantenerte motivado y seguir el camino correcto. <br><br>¡Prepárate para una nueva forma de entrenar!</p>
                    <div class="d-flex justify-content-center fs-2 gap-4">
                        <a class="text-gradient" href="#!"><i class="bi bi-twitter"></i></a>
                        <a class="text-gradient" href="#!"><i class="bi bi-linkedin"></i></a>
                        <a class="text-gradient" href="#!"><i class="bi bi-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
<!-- Footer-->
<footer class="bg-white py-4 mt-auto">
<div class="container px-5">
    <div class="row align-items-center justify-content-between flex-column flex-sm-row">
        <div class="col-auto"><div class="small m-0">Copyright &copy; Website 2023</div></div>
        <div class="col-auto">
            <a class="small" href="#!">Privacy</a>
            <span class="mx-1">&middot;</span>
            <a class="small" href="#!">Terms</a>
            <span class="mx-1">&middot;</span>
            <a class="small" href="#!">Contact</a>
        </div>
    </div>
</div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>

@endsection

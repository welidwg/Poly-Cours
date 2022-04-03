<!DOCTYPE html>
<html lang="en">
@if (Session::has('login'))

    <head>
        <base href="{{ url('/public') }}">

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
        <link rel="stylesheet" href="assets1/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface&amp;display=swap" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans&amp;display=swap" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&amp;display=swap" />
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700&amp;display=swap" />
        <link rel="stylesheet" href="assets1/fonts/fontawesome-all.min.css" />
        <link rel="stylesheet" href="assets1/fonts/font-awesome.min.css" />
        <link rel="stylesheet" href="assets1/fonts/ionicons.min.css" />
        <link rel="stylesheet" href="assets1/fonts/fontawesome5-overrides.min.css" />
        <link rel="stylesheet" href="assets1/css/Black-Navbar.css" />
        <link rel="stylesheet" href="assets1/css/Features-Blue.css" />
        <link rel="stylesheet" href="assets1/css/Footer-Basic.css" />
        <link rel="stylesheet" href="assets1/css/Footer-Clean.css" />
        <link rel="stylesheet" href="assets1/css/Header-Blue.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
        <link rel="stylesheet" href="assets1/css/Registration-Form-with-Photo.css" />
        <link rel="stylesheet" href="assets1/css/sidebar.css" />
        <link rel="stylesheet" href="assets1/css/styles.css" />
        <link rel="shortcut icon" href="assets1/img/logo.png" type="image/x-icon">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
        <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">

    </head>
    <script>
        alertify.defaults.transition = 'slide';
        alertify.defaults.theme.ok = 'btn btn-primary';
        alertify.defaults.theme.cancel = 'btn btn-danger';
        alertify.defaults.theme.input = 'form-control';
    </script>
    <script>
        $(window).on("load", function() {
            setTimeout(() => {}, 400);
            $("#loader").fadeOut();

        });
    </script>
    <div class="load" id="loader">
        <img src="assets/img/logo.png">

    </div>
    @if (Session::get('new'))
        <div class="newForm">
            <div class="container ">


                <form method="post" id="complete">

                    <h2 class="text-center"><strong>Vous devez completez votre inscription</strong></h2>
                    <br><br>
                    <div class="row">
                        <div class="col ">
                            <label class="form-label" for="">Votre Email : </label>
                            <input type="email" value={{ Session::get('email') }} class="form-control"
                                placeholder="Email" name="email" readonly>
                        </div>
                        <div class="col">
                            <label class="form-label" for="">Pseudo: </label>
                            <input type="text" name="username" class="form-control"
                                placeholder="Choisissez un nom d'utilisateur " required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col ">
                            <label class="form-label" for="">Votre Matricule : </label>
                            <input type="text" class="form-control" placeholder="Matricule" required name="matricule">
                        </div>
                        <div class="col">
                            <label class="form-label" for="">Vous êtes : </label>
                            <select class="form-control" name="role" id="role">
                                <option value="1">Etudiant</option>
                                <option value="2">Professeur</option>
                            </select>
                        </div>
                    </div>
                    <script>
                        $(function() {
                            $("#role").on("change", (e) => {
                                if ($("#role").val() == "1") {
                                    $("#student").fadeIn();
                                } else {
                                    $("#student").fadeOut();

                                }
                            })
                            $("#complete").on("submit", function(e) {
                                let loader = $("#loader");

                                e.preventDefault();
                                $.ajax({
                                    type: "post",
                                    url: "/First",
                                    data: $("#complete").serialize(),
                                    beforeSend: () => {

                                        loader.fadeIn()
                                    },
                                    success: function(res) {
                                        window.location.reload();

                                    },
                                    error: (e) => {
                                        loader.fadeOut()
                                        console.log(e.responseText);
                                        alertify.error(e.responseText);
                                    }
                                });
                            });
                        });
                    </script>
                    <br>
                    <div id="student">
                        <div class="row">
                            <div class="col ">
                                <label class="form-label" for="">Votre Branche : </label>
                                <select class="form-control" name="branche" id="">
                                    <option value="Génie Informatique">Génie Informatique</option>
                                    <option value="">Genie Civil</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label" for="">Votre Niveau : </label>
                                <select class="form-control" name="niveau" id="">
                                    <option value="3ème">3ème</option>
                                    <option value="4ème">4ème</option>
                                    <option value="5ème">5ème</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label" for="">Votre Groupe : </label>
                                <select class="form-control" name="groupe" id="">
                                    @for ($i = 1; $i < 6; $i++)
                                        <option value={{ $i }}> {{ $i }} </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    @csrf

                    <br>
                    <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit"
                            style="background: #09005d;">Terminer</button></div>
                </form>
            </div>
        </div>
    @else

        <body>
            <ul class="nav flex-column shadow-lg d-flex sidebar mobile-hid" style="background: rgb(21, 42, 108)">
                <li class="nav-item logo-holder">
                    <div class="text-center text-white logo py-4 mx-4" style="color: rgb(255, 249, 235)">
                        <a id="title" class="text-decoration-none" href="index.html" style="color: #eca400"><strong>
                                <img src="assets/img/logowhite.png" style="width: 130px"></strong></a>
                        <a class="float-end" id="sidebarToggleHolder" href="#"><i class="fas fa-bars"
                                id="sidebarToggle" style="color: #eca400"></i></a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-start py-1 px-0" href="About.html" style="color: #fff9eb">
                        <i class="fas fa-tachometer-alt mx-3"></i><span class="text-nowrap mx-2"
                            style="color: rgb(255, 249, 235)"> Dashboard </span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-start py-1 px-0" href="ajout_cours.html" style="color: #fff9eb"><i
                            class="fas fa-plus mx-3"></i><span class="text-nowrap mx-2">Ajouter un Cour</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-start py-1 px-0" href="recherche_cour.html" style="color: #fff9eb"><i
                            class="fas fa-list mx-3"></i><span class="text-nowrap mx-2">Liste des cours</span></a>
                </li>


            </ul>
            <header class="header-blue">
                <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                    <div class="container-fluid">
                        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2">
                            <span class="visually-hidden">Toggle navigation</span><span
                                class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navcol-2" style="color: #eaf8bf;">

                        </div>
                        @php
                            if (Session::get('avatar') == '') {
                                $img = 'assets1/img/avatar.png';
                            } else {
                                $img = 'assets/img/avatars/' . Session::get('avatar');
                            }
                        @endphp
                        <div class="dropdown" style="float:right;right:45px;font-size: 2.4vh"><a
                                class="dropdown-toggle" aria-expanded="true" data-bs-toggle="dropdown" href="#"
                                style="color: rgb(255,255,255);"><img class="rounded-circle" src="{{ $img }}"
                                    style="width: 50px;margin-right: 5px;" />
                                {{ Session::get('nom') }} </a>
                            <div class="dropdown-menu " style="font-size: 2.2vh"><a class="dropdown-item"
                                    href="/Dash/Profile"> <i class="fas fa-user"></i>
                                    Profile</a>
                                <div class="dropdown-divider "></div>
                                <a class="dropdown-item" href="/Logout"><i class="fas fa-sign-out-alt"></i>
                                    Déconnexion</a>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="container p-5" style="height: 100%;min-height: 70vh">


                    <script src="assets1/bootstrap/js/bootstrap.min.js"></script>
                    <script src="assets1/js/bs-init.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
                    <script src="assets1/js/jquery.min.js"></script>
                    <script src="assets1/js/sidebar.js"></script>
                    <script src="assets1/js/theme.js"></script>
                    <script src="assets1/js/chart.min.js"></script>
        </body>
    @endif

</html>
@else
<script>
    window.location.href = "/";
</script>
@endif

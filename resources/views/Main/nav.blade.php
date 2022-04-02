<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Black-Navbar.css">
    <link rel="stylesheet" href="assets/css/Features-Blue.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <script>
        alertify.defaults.transition = 'slide';
        alertify.defaults.theme.ok = 'btn btn-primary';
        alertify.defaults.theme.cancel = 'btn btn-danger';
        alertify.defaults.theme.input = 'form-control';
    </script>
    <style>
        .alertify-notifier .ajs-message.ajs-error,
        .alertify-notifier .ajs-message.ajs-success {
            color: #ffffff;
            border-radius: 9px;
            padding: 19px;
        }

        .load {
            position: fixed;
            z-index: 99;
            left: 0;
            right: 0;
            margin-left: auto;
            margin-right: auto;
            background-color: rgba(0, 0, 0, 0.4);
            width: 100%;
            height: 100%;
            display: none;
        }

        .it {
            top: 55%;

            left: 0;
            right: 0;
            margin-left: auto;
            margin-right: auto;
            position: absolute;
        }

        .load img {
            animation: circle 2s linear infinite;

            width: 95px;
            margin-bottom: 80px;
            top: 45%;
            left: 0;
            right: 0;
            margin-left: auto;
            margin-right: auto;
            position: absolute;
        }

        @keyframes circle {
            0% {
                transform: rotate(0deg)
            }

            100% {
                transform: rotate(360deg)
            }
        }

    </style>
</head>


<body>
    <div class="load" id="loader">
        <img src="assets/img/logo.png">

    </div>

    <header class="header-blue">
        <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
            <div class="container-fluid"><a class="navbar-brand" href="#" style="margin: 0px;padding: 4px 0px;">
                    <img src="assets/img/logo.png"
                        style="width: 45px;height: 45px;margin: 1px;padding: 0px;margin-right: 7px;">Poly-Cours</a><button
                    data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span
                        class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="/">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="/Contact">Contactez-nous</a></li>
                    </ul>
                    <form class="d-flex me-auto navbar-form" target="_self">
                        <div class="d-flex align-items-center"><label class="form-label d-flex mb-0"
                                for="search-field"></label></div>
                    </form><span class="navbar-text"> <a class="login" href="/Login">Connexion</a></span><a
                        class="btn btn-light action-button" role="button" href="/Register">Créer un compte</a>
                </div>
            </div>
        </nav>
        <div class="container hero">
            <div class="row" data-aos="zoom-in">



                <script src="assets/js/bootstrap.min.js"></script>
                <script src="assets/js/bs-init.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

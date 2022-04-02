<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Poly-Cours | Connexion</title>
</head>

<body>
    @include('Main/nav')

    <div class="col">
        <section data-aos="zoom-in" class="register-photo"
            style="background: rgba(241,247,252,0);border-width: 0px;border-radius: 25px;padding-bottom: 5px;padding-top: 5px;">
            <div class="form-container">
                <div class="image-holder"
                    style="background: url(&quot;assets/img/testss.jpg&quot;), var(--bs-white);background-size: cover, auto;">
                    <img class="d-none" src="assets/img/testss.jpg"
                        style="width: 498px;padding: 0px;margin-top: 4px;filter: sepia(2%);">
                </div>
                <form method="post" id="login">
                    <h2 class="text-center"><strong>Connexion</strong></h2>
                    <div class="mb-3"><label class="form-label"
                            style="margin-left: 7px;">Email</label><input class="form-control" type="email"
                            name="email" id="email" placeholder="email@polytechnicien.tn"></div><label
                        class="form-label" style="margin-left: 7px;">Mot de passe :&nbsp;</label>
                    <div class="mb-3"><input class="form-control" type="password" name="password"
                            id="password" placeholder="Mot de passe"></div>
                    <div class="mb-3"></div>
                    <div class="mb-3"></div>
                    @csrf
                    <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit"
                            style="background: #09005d;">Se connecter</button></div><a class="already"
                        href="/Register" style="font-size: 14px;">Ou bien , créer un compte maintenant.</a>
                </form>
                <script>
                    $(function() {
                        $("#login").on("submit", (e) => {
                            e.preventDefault();
                            $.ajax({
                                type: "POST",
                                url: "/Logging",
                                data: $("#login").serialize(),
                                success: function(res) {
                                    alertify.success(res)
                                },
                                error: (r) => {
                                    alertify.error(r.responseText)
                                }
                            });
                        })
                    });
                </script>
            </div>
        </section>
    </div>

    </div>
    </div>
    </header>
    @include('Main/footer')


</body>

</html>

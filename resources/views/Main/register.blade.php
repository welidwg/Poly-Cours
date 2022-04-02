<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Poly-Cours | Créer Compte</title>
</head>

<body>
    @include('Main/nav')

    <div class="col">
        <section data-aos="zoom-in" class="register-photo"
            style="background: rgba(241,247,252,0);border-width: 0px;border-radius: 25px;padding-top: 5px;padding-bottom: 4px;">
            <div class="form-container">
                <div class="border rounded-0 image-holder"
                    style="background: url(&quot;assets/img/macbook-desk-macbook-pro-laptop.jpg&quot;) no-repeat, var(--bs-white);background-size: cover, auto;">
                    <img class="d-none" src="assets/img/testss.jpg"
                        style="width: 498px;padding: 0px;margin-top: 4px;filter: sepia(2%);">
                </div>
                <form method="post" id="signup">
                    <h2 class="text-center"><strong>Crée un compte</strong></h2>
                    <div class="mb-3"><label class="form-label" style="margin-left: 7px;">Votre Nom
                            :&nbsp;</label><input class="form-control" type="text" data-aos="zoom-in"
                            data-aos-once="true" name="name" placeholder="votre nom" required=""></div>
                    <div class="mb-3">
                        <label class="form-label" style="margin-left: 7px;">Votre email
                            (@Polytechnicien.tn)</label><input id="email" class="form-control" type="email"
                            data-aos="zoom-in" data-aos-once="true" name="email" placeholder="email@polytechnicien.tn">
                    </div><label class="form-label" style="margin-left: 7px;">Mot de passe :&nbsp;</label>
                    <div class="mb-3"><input class="form-control" type="password" data-aos="zoom-in"
                            data-aos-once="true" name="password" id="password" placeholder="Mot de passe"></div><label
                        class="form-label" style="margin-left: 7px;">Confirmer votre mot de passe :</label>
                    <div class="mb-3"><input class="form-control" type="password" data-aos="zoom-in"
                            data-aos-once="true" id="confirm" name="confirm" placeholder="Confirmation"></div>
                    @csrf
                    <div class="mb-3"><button id="submit" class="btn btn-primary d-block w-100" type="submit"
                            style="background: #09005d;">Valider</button></div><a class="already" href="/Login"
                        style="font-size: 14px;">Tu as déjà un compte ? Connectez-vous.</a>
                </form>
            </div>
        </section>
    </div>

    </div>
    </div>
    </header>


</body>
<script>
    $(function() {
        let loader = $("#loader");
        $("#confirm").on("keyup", (e) => {
            if (e.target.value != $("#password").val()) {
                console.log('not matched');
                e.target.style.border = "1px solid red"
                $("#submit").attr("disabled", true)
            } else {
                e.target.style.border = "1px solid limegreen"
                $("#submit").attr("disabled", false)

                setTimeout(() => {
                    e.target.style.border = "1px solid transparent"

                }, 1000);

            }
        });
        $("#email").on("keyup", (e) => {

            if (/@polytechnicien.tn\s*$/.test(e.target.value)) {
                $("#submit").attr("disabled", false)
                e.target.style.border = "1px solid limegreen";
                $.ajax({
                    type: "post",
                    url: "/VerifyMail",
                    data: {
                        email: e.target.value,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(res) {
                        setTimeout(() => {
                            e.target.style.border = "1px solid transparent";
                        }, 700);

                    },
                    error: (r) => {
                        alertify.error(r.responseText)
                        e.target.style.border = "1px solid red";

                    }
                });

            } else {
                e.target.style.border = "1px solid red";
                $("#submit").attr("disabled", true)

            }
        })
        $("#signup").on("submit", (e) => {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "/SignUp",
                data: $("#signup").serialize(),
                beforeSend: () => {

                    loader.css("display", "block");

                },

                success: function(res) {
                    loader.css("display", "none");

                    if (res == 1) {
                        alertify.success("Compte crée avec succées ! ");
                        setTimeout(() => {
                            window.location.href = "/Login";
                        }, 700);

                    } else if (res == 0) {
                        alertify.error("Email déjà utilisé ! ");
                        $("#email").css("border", "1px solid red")

                    } else {
                        alertify.error("Erreur de serveur , veuillez ressayer");
                        console.log(res);
                    }
                },
                error: (r) => {
                    loader.css("display", "none");

                    alertify.error("Erreur de serveur , veuillez ressayer");
                    console.log(r.responseText);

                }
            });
        })

    });
</script>

</html>
@include('Main/footer')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Poly-Cours | Contactez-nous</title>
</head>

<body>
    @include('Main/nav')

    <div class="col">
        <section data-aos="zoom-in" class="register-photo"
            style="background: rgba(241,247,252,0);border-width: 0px;border-radius: 25px;padding-bottom: 5px;padding-top: 5px;">
            <div class="form-container">
                <form method="post">
                    <h2 class="text-center"><strong>Contactez-nous</strong></h2>
                    <div class="mb-3"><label class="form-label"
                            style="margin-left: 7px;">Email</label><input class="form-control" type="email"
                            name="email" placeholder="email@polytechnicien.tn"></div>
                    <div class="mb-3"><label class="form-label" style="margin-left: 7px;">Nom</label><input
                            class="form-control" type="text" name="name" placeholder="Votre nom"></div>
                    <div class="mb-3"></div><label class="form-label"
                        style="margin-left: 7px;">Sujet</label><select class="form-select">
                        <option value="1" selected="">Proposition</option>
                        <option value="2">Réclamation</option>
                        <option value="3">Question</option>
                    </select>
                    <div class="mb-3"></div>
                    <div class="mb-3"><label class="form-label"
                            style="margin-left: 7px;">Message</label><textarea class="form-control" name="message"
                            placeholder="Votre message ici" rows="20"></textarea></div>
                    <div class="mb-3"></div>
                    <div class="mb-3"></div>
                    <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit"
                            style="background: #09005d;">Envoyer</button></div>
                </form>
            </div>
        </section>
    </div>


    </div>
    </div>
    </header>


</body>

</html>
@include('Main/footer')

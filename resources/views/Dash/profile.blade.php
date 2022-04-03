    @include('Dash/navigation')
    <!DOCTYPE html>
    <html lang="en">
    @php
        use App\Models\Utilisateur;
        
        $user = Utilisateur::where('_id', Session::get('id'))->first();
    @endphp

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ env('APP_NAME') }} - Profile </title>

    </head>

    <body>
        <h3 class="text-uppercase mb-4" data-aos="slide-right"
            style="color: whitesmoke;font-size: 27px;text-align: left;font-family: 'Source Sans Pro', sans-serif;font-weight: bold;">
            <i class="fas fa-user-edit"></i>Profile
        </h3>
        @php
            if (Session::get('avatar') == '') {
                $img = 'assets1/img/avatar.png';
            } else {
                $img = 'assets/img/avatars/' . Session::get('avatar');
            }
        @endphp
        <div class="row mb-3">
            <div class="col-lg-4">
                <div class="card mb-3" style="background: #f0f4fa;">
                    <div class="card-body text-center shadow"><img class="rounded-circle shadow mb-3 mt-4"
                            src="{{ $img }}" width="160" height="160">
                        <form action="" id="changeAvatar">
                            <label for="avatar" class="form-label">selectionnez une image <i
                                    class="fas fa-pen"></i></label>
                            <input type="file" accept="image/*" name="avatar" id="avatar" class="" hidden>

                            <div class="mb-3" style="color: rgb(231,228,222);"><button class="btn btn-sm"
                                    type="submit"
                                    style="background: #152a6c;color: rgb(231,228,222);">Enregistrer</button>
                            </div>
                            @csrf
                        </form>
                        <div class="spinner-border" id="spinn1" role="status" style="float: right;display: none">
                            <span class="sr-only">Loading...</span>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-8">

                <div class="row">
                    <div class="col">
                        @php
                            $class = 'fa fa-clock';
                            $color = 'rgb(21,42,108)';
                            
                            switch ($user->statut) {
                                case 'en attente':
                                    # code...
                                    $class = 'fa fa-clock';
                                    $color = 'orange';
                            
                                    break;
                                case 'confirme':
                                    # code...
                                    $class = 'fa fa-check';
                                    $color = 'limegreen';
                            
                                    break;
                            
                                default:
                                    # code...
                                    break;
                            }
                        @endphp
                        <div class="card shadow mb-3" style="background: #f0f4fa;">
                            <div class="card-header py-3">
                                <p class="m-0 fw-bold" style="color: rgb(21,42,108);">Vos informations :
                                </p>
                            </div>
                            <div class="card-body">
                                <form id="edit">
                                    <p> statut : <span style="color:{{ $color }}"><i
                                                class="{{ $class }}"></i></span>
                                    </p>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label"
                                                    for="username"><strong>Pseudo</strong></label><input
                                                    class="form-control" type="text" id="username"
                                                    placeholder="nom d'utilisateur" name="username"
                                                    value={{ $user->username }}></div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label"
                                                    for="email"><strong>Email </strong></label><input
                                                    class="form-control" type="email" id="email"
                                                    placeholder="user@polytechnicien.tn" name="email"
                                                    value={{ $user->email }}></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label"
                                                    for="Nom"><strong>Nom et prénom</strong></label><input
                                                    class="form-control" type="text" id="" placeholder="Nom"
                                                    name="nom" value="{{ $user->name }}"></div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label"
                                                    for="Prenom"><strong>Vous êtes </strong></label>

                                                <select readonly class="form-control" name="role" id="">
                                                    <option value={{ Session::get('role') }}><?php switch (Session::get('role')) {
    case '0':
        # code..
        print 'admin';
        break;
    case '1':
        # code..
        print 'Etudiant(e)';
        break;
    case '2':
        # code..
        print 'Professeur';
        break;
    default:
        # code...
        break;
} ?>
                                                    </option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    @if (Session::get('role') == 1)
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label"
                                                        for=""><strong>Niveau</strong></label><input
                                                        class="form-control" type="text" id="" disabled placeholder=""
                                                        name="niveau" value="{{ $user->niveau }}"></div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label"
                                                        for=""><strong>Branche </strong></label><input
                                                        class="form-control" type="text" id=""
                                                        placeholder="user@polytechnicien.tn" name="Branche"
                                                        value="{{ $user->branche }}" disabled></div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label"
                                                        for=""><strong>Groupe </strong></label><input
                                                        class="form-control" type="text"
                                                        value="{{ $user->groupe }}" disabled></div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label"
                                                    for=""><strong>Matricule</strong></label>
                                                <input class="form-control" type="text"
                                                    value="{{ $user->matricule }}" disabled>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label"
                                                    for=""><strong>Nouveau Mot de passe</strong></label><input
                                                    class="form-control" type="password" placeholder=""
                                                    name="password" id="password"></div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label"
                                                    for=""><strong>Confirmer </strong></label><input
                                                    class="form-control" type="password" id="confirm" name="confirm">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="mb-3"><button id="submit" class="btn btn-sm" type="submit"
                                            style="color: rgb(224,221,216);background: #152a6c;">
                                            Enregistrer
                                        </button>
                                    </div>
                                    <div class="spinner-border" id="spinn" role="status"
                                        style="float: right;display: none">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </div>
    <script>
        $(function() {
            $("#changeAvatar").on("submit", function(e) {
                let form = $("#changeAvatar")[0]
                let formdata = new FormData(form)
                e.preventDefault()
                $.ajax({
                    type: "post",
                    url: "{{ url('/ChangeAvatar') }}",
                    data: formdata,
                    contentType: false,
                    processData: false,
                    beforeSend: (e) => {
                        $("#spinn1").fadeIn();


                    },
                    success: function(res) {
                        alertify.success(res);
                        $("#spinn1").fadeOut();

                        window.location.reload()

                    },
                    error: (r) => {
                        $("#spinn1").fadeOut();
                        console.log(r.responseText);
                        alertify.error(r.responseText);

                    }
                });
            });
            $("#confirm").on("keyup", (e) => {
                if ($("#password").val() != "") {


                    if (e.target.value != $("#password").val()) {
                        console.log('not matched');
                        e.target.style.border = "1px solid red"
                        $("#submit").attr("disabled", true)
                    } else {
                        e.target.style.border = "1px solid limegreen"
                        $("#submit").attr("disabled", false)

                        setTimeout(() => {
                            e.target.style.border = "1px solid #ccc"

                        }, 1000);

                    }
                } else {
                    $("#submit").attr("disabled", false)

                }
            });
            $("#email").on("keyup", (e) => {

                if (/@polytechnicien.tn\s*$/.test(e.target.value)) {
                    $("#submit").attr("disabled", false)
                    e.target.style.border = "1px solid limegreen";
                    setTimeout(() => {
                        e.target.style.border = "1px solid #ccc";

                    }, 500);


                } else {
                    e.target.style.border = "1px solid red";
                    $("#submit").attr("disabled", true)

                }
            })
            $("#edit").on("submit", function(e) {
                e.preventDefault()
                $.ajax({
                    type: "post",
                    url: "{{ url('/EditProfile') }}",
                    data: $('#edit').serialize(),
                    beforeSend: (e) => {
                        $("#spinn").fadeIn();


                    },
                    success: function(res) {
                        alertify.success(res);
                        $("#spinn").fadeOut();

                        setTimeout(() => {
                            //window.location.reload()

                        }, 700);

                    },
                    error: (r) => {
                        $("#spinn").fadeOut();
                        console.log(r.responseText);
                        alertify.error(r.responseText);

                    }
                });
            });
        });
    </script>
    </header>
    @include('Main/footer')

    </html>

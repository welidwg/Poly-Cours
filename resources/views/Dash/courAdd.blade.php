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
        <title>{{ env('APP_NAME') }} - Ajouter un cour </title>

    </head>

    <body>
        <h3 class="text-uppercase mb-4" data-aos="slide-right"
            style="color: whitesmoke;font-size: 27px;text-align: left;font-family: 'Source Sans Pro', sans-serif;font-weight: bold;">
            <i class="fas fa-book"></i> Ajouter un cour
        </h3>

        <div class="row mb-3">

            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3" style="background: #f0f4fa;">
                        <div class="card-header py-3">
                            <p class="m-0 fw-bold" style="color: rgb(21,42,108);">Cour info</p>
                        </div>
                        <div class="card-body">
                            <form id="addCour" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="filiere"
                                                style="color: rgb(21,42,108);"><strong>Nom de cour :
                                                </strong></label><input class="form-control" type="text" id=""
                                                placeholder="ex:python" name="nom"></div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for=""
                                                style="color: rgb(21,42,108);"><strong>Branche</strong><br></label>

                                            <select class="form-control" name="branche" id="">
                                                <option value="Génie informatique">Génie informatique</option>
                                                <option value="Génie Civil">Génie Civil</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for=""
                                                style="color: rgb(21,42,108);"><strong>Niveau</strong><br></label>
                                            <select class="form-control" name="niveau" id="">
                                                <option value="1ère"> 1ère </option>

                                                @for ($i = 2; $i < 6; $i++)
                                                    <option value={{ $i . 'ème' }}> {{ $i . 'ème' }} </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for=""
                                                style="color: rgb(21,42,108);"><strong>Nombre des
                                                    videos</strong><br></label>
                                            <select class="form-control" name="" id="nbVid">

                                                @for ($i = 1; $i < 11; $i++)
                                                    <option value={{ $i }}> {{ $i }} </option>
                                                @endfor
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="Url"
                                                style="color: rgb(21,42,108);"><strong>Video
                                                    links</strong><br></label>
                                            <div id="cont" style="padding: 9px">

                                                <input class="form-control" type="url" name="links[]"
                                                    placeholder="https://www.exemple.com/watch">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="check">
                                                <label class="form-check-label" for="check">
                                                    Vous voulez ajouter un fichier ?
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="fileCont" style="display: none">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="Url"
                                                style="color: rgb(21,42,108);"><strong>
                                                    Fichier</strong><br></label>
                                            <input type="file" class="form-control" name="file[]" multiple>

                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3"><button class="btn btn-sm" type="submit"
                                        style="color: rgb(224,221,216);background: #152a6c;">Ajouter cour</button>
                                </div>
                                <div class="spinner-border" id="spinn" role="status" style="float: right;display: none">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </div>
    <script>
        $(function() {
            $("#check").on("change", (e) => {
                if ($("#check").is(':checked')) {
                    $("#fileCont").fadeIn();

                } else {
                    $("#fileCont").fadeOut();

                }
            });


            $("#nbVid").on("change", (e) => {
                $("#cont").html("");
                let val = e.target.value;
                for (let i = 0; i < val; i++) {
                    $("#cont").append(`
                    <input class="form-control" type="url" name="links[]" style="margin:9px"
                                                    placeholder="https://www.exemple.com/watch ${i+1}">
                    `)

                }
            });


            $("#addCour").on("submit", (e) => {
                e.preventDefault();
                let form = $("#addCour")[0]
                let formdata = new FormData(form)
                $.ajax({
                    type: "post",
                    url: "/AddCour",
                    data: formdata,
                    contentType: false,
                    processData: false,
                    beforeSend: (e) => {
                        $("#spinn").fadeIn();



                    },


                    success: function(res) {
                        alertify.success(res);
                        console.log(res);
                        $("#spinn").fadeOut();

                        //window.location.reload()

                    },
                    error: (r) => {
                        $("#spinn").fadeOut();
                        console.log(r.responseText);
                        alertify.error("Erreur ");

                    }
                });

            })


        });
    </script>
    </header>
    @include('Main/footer')

    </html>

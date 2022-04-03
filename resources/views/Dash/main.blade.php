    @include('Dash/navigation')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ env('APP_NAME') }} - Dashboard </title>
    </head>

    <body>
        <h1 class="text-uppercase" data-aos="slide-right"
            style="color: #ffffff;font-family: 'Source Sans Pro', sans-serif;text-align: left;font-size: 35px;font-weight: bold;">
            <i class="fas fa-chart-line"></i> statistiques
        </h1>
        <div class="row">
            <div class="col-lg-7 col-xl-8">
                <div class="card shadow mb-4" style="background: #f0f4fa;">
                    <div class="card-header d-flex justify-content-between align-items-center"
                        style="color: rgb(21,42,108);">
                        <h4 class="text-uppercase">Temps passé</h4>
                    </div>
                    <div class="card-body">
                        <div class="chart-area"><canvas
                                data-bss-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Dim&quot;,&quot;Lun&quot;,&quot;Mar&quot;,&quot;Mer&quot;,&quot;Jeu&quot;,&quot;Ven&quot;,&quot;Sam&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Heurs&quot;,&quot;fill&quot;:true,&quot;data&quot;:[&quot;0&quot;,&quot;1&quot;,&quot;1.5&quot;,&quot;0.5&quot;,&quot;3&quot;,&quot;2&quot;,&quot;4&quot;],&quot;backgroundColor&quot;:&quot;rgba(255,249,235,0.08)&quot;,&quot;borderColor&quot;:&quot;#ECA400&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:true},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#152a6c&quot;,&quot;fontStyle&quot;:&quot;bold&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#152a6c&quot;,&quot;fontStyle&quot;:&quot;bold&quot;,&quot;padding&quot;:20}}]}}}"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="card shadow mb-4" style="background: #f0f4fa;">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="text-uppercase">Top 3 cour</h4>
                    </div>
                    <div class="card-body">
                        <div class="chart-area"><canvas
                                data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Cour1&quot;,&quot;Cour2&quot;,&quot;Cour3&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#152a6c&quot;,&quot;#ECA400&quot;,&quot;#EAF8BF&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:[&quot;50&quot;,&quot;30&quot;,&quot;15&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}}"></canvas>
                        </div>
                        <div class="text-center small mt-4"><span class="me-2"><i class="fas fa-book-open"
                                    style="color: rgb(21,42,108);"></i>&nbsp;Cour1</span><span class="me-2"><i
                                    class="fas fa-book-open" style="color: rgb(236,164,0);"></i>&nbsp;Cour2</span><span
                                class="me-2"><i class="fas fa-book-open"
                                    style="color: rgb(234,248,191);"></i>&nbsp;Cour2</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4" style="background: #f0f4fa;">
                    <div class="card-header py-3">
                        <h4 class="text-uppercase">Progretion par cour&nbsp;</h4>
                    </div>
                    <div class="card-body">
                        <h4 class="small fw-bold">Cour 1<span class="float-end">20%</span></h4>
                        <div class="progress border rounded-pill mb-4">
                            <div class="progress-bar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                style="width: 20%;"><span class="visually-hidden">20%</span></div>
                        </div>
                        <h4 class="small fw-bold">Cour 2<span class="float-end">40%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                style="width: 40%;"><span class="visually-hidden">40%</span></div>
                        </div>
                        <h4 class="small fw-bold">Cour 3<span class="float-end">60%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                style="width: 60%;"><span class="visually-hidden">60%</span></div>
                        </div>
                        <h4 class="small fw-bold">Cour 4<span class="float-end">80%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                style="width: 80%;"><span class="visually-hidden">80%</span></div>
                        </div>
                        <h4 class="small fw-bold">Cour 5<span class="float-end">100% Complete!</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%;"><span class="visually-hidden">100%</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow mb-4" style="background: #f0f4fa;">
                    <div class="card-header d-flex justify-content-between align-items-center"
                        style="color: rgb(21,42,108);">
                        <h4 class="text-uppercase">&nbsp;Leçon Terminees par Mois</h4>
                    </div>
                    <div class="card-body">
                        <div class="chart-area"><canvas
                                data-bss-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Sep&quot;,&quot;Oct&quot;,&quot;Nov&quot;,&quot;Dec&quot;,&quot;Jan&quot;,&quot;Fev&quot;,&quot;Mar&quot;,&quot;Apr&quot;,&quot;May&quot;,&quot;Jun&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Cour Completer&quot;,&quot;fill&quot;:true,&quot;data&quot;:[&quot;0&quot;,&quot;3&quot;,&quot;1&quot;,&quot;0&quot;,&quot;6&quot;,&quot;3&quot;,&quot;1&quot;,&quot;5&quot;,&quot;2&quot;,&quot;4&quot;],&quot;backgroundColor&quot;:&quot;rgba(255,249,235,0.08)&quot;,&quot;borderColor&quot;:&quot;#ECA400&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;,&quot;fontColor&quot;:&quot;#152a6c&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:true},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#152a6c&quot;,&quot;fontStyle&quot;:&quot;bold&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:true},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#152a6c&quot;,&quot;fontStyle&quot;:&quot;bold&quot;,&quot;padding&quot;:20}}]}}}"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </div>
    </header>
    @include('Main/footer')

    </html>
    

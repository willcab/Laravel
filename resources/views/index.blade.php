<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bienvenido</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <!-- Styles -->
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card " style="width: 18rem;">
                    <img width="100%" height="225" src="https://www.vistazo.com/sites/default/files/field/image/2018/03/19/avion.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">CRUD de Pasjeros</h5>
                        <p class="card-text">Módulo de Edición de Pasjeros.</p>
                        <a href="{{url('/Pasajero')}}" class="btn btn-primary">Pasajeros</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img width="100%" height="225" src="https://www.sardiniapost.it/wp-content/uploads/2019/09/nuovi-autobus-18-metri.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">CRUD de Autobus</h5>
                        <p class="card-text">Módulo de Edición de Autobuses.</p>
                        <a href="{{url('/Autobus')}}" class="btn btn-primary">Autobus</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img width="100%" height="225" src="https://th.bing.com/th/id/OIP.rIPk6uxZZR4LPrWLptcaiwHaE7?pid=ImgDet&rs=1" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Ventas</h5>
                        <p class="card-text">Módulo de venta de Boletos.</p>
                        <a href="{{url('/Ventas')}}" class="btn btn-primary">Ventas</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </body>
</html>

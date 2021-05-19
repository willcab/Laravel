@extends('Plantilla')
@section('head')
    <!-- Fonts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection
@section('nombre')
    <h2>Manage <b>Ventas</b></h2>
@endsection
@section('filanombre')
    <th scope="col" class="text-center">Id Venta</th>
    <th scope="col" class="text-center">Id Pasajero</th>
    <th scope="col" class="text-center">Id Autobus</th>
    <th scope="col" class="text-center">Costo</th>
    <th scope="col" class="text-center">Costo IVA</th>
    <th scope="col" class="text-center">Descuento</th>
    <th scope="col" class="text-center">Costo Final</th>
@endsection

@section('tabla')
    @forelse($ventas as $venta)
        <tr>
            {{-- folio--}}
            <td class="text-center">{{$venta->id}}</td>
            {{-- nombre --}}
            <td class="text-center">{{$venta->idpasajero}}</td>
            {{-- peso del equipaje--}}
            <td class="text-center">{{$venta->idautobus}}</td>
            {{-- descuento mostrando si o no--}}
            <td class="text-center">{{$venta->costo}}</td>

            {{-- ruta escogida--}}
            <td class="text-center">{{$venta->costoc}}</td>
            {{-- Costo del viaje--}}
            <td class="text-center">{{$venta->descuento}}</td>
            <td class="text-center">{{$venta->costofinal}}</td>
        </tr>
    @empty
        <td class="text-center">No hay ventas</td>

    @endforelse
@endsection

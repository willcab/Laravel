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
@section('botones')
    <a href="#" class="btn btn-success"  data-toggle="modal" data-target="#agregar"><i class="bi bi-plus-square-dotted" style="font-size: 0.5rem"></i> <span>agregar</span></a>
@endsection

@section('nombre')
    <h2>Manage <b>Pasajeros</b></h2>
@endsection
@section('filanombre')
    <th scope="col" class="text-center">Folio</th>
    <th scope="col" class="text-center">Nombre</th>
    <th scope="col" class="text-center">Peso del Equipaje</th>
    <th scope="col" class="text-center">Descuento</th>
    <th scope="col" class="text-center">ruta</th>
    <th scope="col" class="text-center">costo total</th>
@endsection
@section('tabla')
    @inject('costo','App\Services\Costo')
    @forelse($pasajeros as $pasajero)
        <tr>
            {{-- folio--}}
            <td>{{$pasajero->id}}</td>
            {{-- nombre --}}
            <td class="text-center">{{$pasajero->nombre}}</td>
            {{-- peso del equipaje--}}
            <td class="text-center">{{$pasajero->equipaje}}</td>
            {{-- descuento mostrando si o no--}}
            @if($pasajero->descuento!=0)
                <td class="text-center">Aplica</td>
            @else
                <td class="text-center">No aplica</td>
            @endif

            {{-- ruta escogida--}}
            <td class="text-center">{{$pasajero->autobus->ruta}}</td>
            {{-- Costo del viaje--}}
            <td class="text-center">{{$costo->get($pasajero->id)}}</td>
            <td class="text-center">
                <a class="btn btn-outline-success" id="editButton"
                   data-id="{{$pasajero->id}}"
                   data-nombre="{{$pasajero->nombre}}"
                   data-equipaje="{{$pasajero->equipaje}}"
                   data-descuento="{{$pasajero->descuento}}"
                   data-toggle="modal" data-target="#editar"
                ><i class="bi bi-pencil-square"></i></a>

                <a class="btn btn-outline-danger" id="deleteButton"
                   data-id="{{$pasajero->id}}"
                   data-toggle="modal" data-target="#eliminar"
                ><i class="bi bi-trash"></i></a>
            </td>
        </tr>
    @empty
        <td class="text-center">No hay pasajeros</td>

    @endforelse
@endsection
<div>
    @inject('rutas','App\Services\Rutas')
    @section('contenidoA')
        <form action="{{url('/Pasajero')}}" method="post" >
            {{csrf_field()}}
            <input type="hidden">
            <div class="modal-header">
                <h4 class="modal-title">Introduzca los datos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nombre</label>
                    <label>
                        <input type="text" name="nombre" class="form-control" id="nombre" pattern="[A-Z,a-z]{1,15}" required>
                    </label>
                </div>
                <div class="form-group">
                    <label>Equipaje</label>
                    <label>
                        <input type="text" name="equipaje" class="form-control" id="equipaje" required>
                    </label>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="idautobus"></label><select id="descuento" name="descuento" class="form-control">
                            <option value="1">Aplica Descuento</option>
                            <option value="0">No Aplica Descuento</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="idautobus"></label><select id="idautobus" name="idautobus" class="form-control">
                        @forelse($rutas->get() as $index=>$ruta )
                            <option value="{{$index}}">{{$ruta}}</option>
                        @empty
                            <label>no hay rutas disponibles</label>
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input  type="submit" class="btn btn-success"  value="Add">
            </div>
        </form>
    @endsection
    @section('contenidoE')
        <form action="#"  id="formedit" method="post">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="modal-header">
                <h4 class="modal-title">Editando Informacion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label>Equipaje</label>
                    <label>
                        <input type="text" name="equipaje" class="form-control" id="editarequipaje" required>
                        <input type="hidden" name="nombre" id="editarnombre">
                    </label>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label for="idautobus"></label><select id="editaridautobus" name="idautobus" class="form-control">
                            @forelse($rutas->get() as $index=>$ruta )
                                <option value="{{$index}}">{{$ruta}}</option>
                                @empty
                                    <label>no hay rutas disponibles</label>
                            @endforelse

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label for="idautobus"></label><select id="editardescuento" name="descuento" class="form-control">
                                <option value="1">Aplica Descuento</option>
                                <option value="0">No Aplica Descuento</option>
                        </select>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                <input  type="submit" class="btn btn-success"  value="Editar">
            </div>
        </form>
    @endsection
    @section('contenidoD')
        <form action="#" method="post" id="formdelete">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <div class="modal-header">
                <h4 class="modal-title">Advertencia</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p>Esta Seguro de que ELIMINAR el siguiente elemento?</p>
                    <small>Esta accion es irrevesible</small>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input  type="submit" class="btn btn-success"  value="Add">
            </div>
        </form>
    @endsection
</div>
@section('page-js-files')
    <script >
        $(document).ready(function() {
            console.log("Settings page was loaded");
            $('#eliminar').on('show.bs.modal',function (event){
                let link  = event.relatedTarget,
                    id    = link.dataset["id"];
                $('#formdelete').attr('action',"{{url('/Pasajero//')}}"+'/'+id);
            });

            $('#editar').on('show.bs.modal',function (event){

                let link  = event.relatedTarget,
                    id        = link.dataset["id"],
                    ruta      = link.dataset["ruta"],
                    equipaje = link.dataset["equipaje"],
                    nombre = link.dataset["nombre"];
                $(this).find("#editarnombre").val(nombre);
                $(this).find("#editarautobus").val(ruta);
                $(this).find("#editarequipaje").val(equipaje);
                $('#formedit').attr('action',"{{url('/Pasajero//')}}"+'/'+id);
            });
        });

    </script>
@stop

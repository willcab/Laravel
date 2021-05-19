@extends('Plantilla')

<!--------- INFORMACION DEL HEAD
@section('head')
    <!- Fonts -->
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
    <h2>Manage <b>Autobus</b></h2>
@endsection

<!----- nombre del las columnas --------->
@section('filanombre')
    <th scope="col" class="text-center">Id</th>
    <th scope="col" class="text-center">Conductor</th>
    <th scope="col" class="text-center">Ruta</th>
    <th scope="col" class="text-center">Capacidad</th>
    <th scope="col" class="text-center">Ocupado</th>
@endsection


<!-----TABLA DE VISUALIZACION --------->
@section('tabla')
    @forelse($autobuses as $autobus)
    <tr>
        <td class="text-center">{{$autobus->id}}</td>
        <td class="text-center">{{$autobus->conductor}}</td>
        <td class="text-center">{{$autobus->ruta}}</td>
        <td class="text-center">{{$autobus->cap}}</td>
        <td class="text-center">{{$autobus->uso}}</td>
        <td class="text-center">
            <a class="btn btn-outline-success" id="editButton"
               data-id="{{$autobus->id}}"
               data-conductor="{{ $autobus->conductor }}"
               data-ruta="{{$autobus->ruta}}"
               data-capacidad="{{$autobus->cap}}"
               data-toggle="modal" data-target="#editar"
            ><i class="bi bi-pencil-square"></i></a>

            <a class="btn btn-outline-danger" id="deleteButton"
               data-id="{{$autobus->id}}"
               data-toggle="modal" data-target="#eliminar"
            ><i class="bi bi-trash"></i></a>
        </td>
    </tr>
    @empty
        <td class="text-center">Ingrese Autobuses antes de poder verlos</td>

    @endforelse
@endsection

<!------ MODAL PARA AGREGAR------->
@section('contenidoA')
    <form action="{{url('/Autobus')}}" method="post" >
        {{csrf_field()}}
        <input type="hidden">
        <div class="modal-header">
            <h4 class="modal-title">Introduzca los datos</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Conductor</label>
                <label>
                    <input type="text" name="conductor" class="form-control" id="conductor" required>
                </label>
            </div>
            <div class="form-group">
                <label>Ruta</label>
                <label>
                    <input type="text" name="ruta" class="form-control" id="ruta" required>
                </label>
            </div>
            <div class="form-group">
                <label>Capacidad</label>
                <label>
                    <input type="number" min="0" max="25" class="form-control" name="cap"  id="capacidad" required>
                </label>
            </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input  type="submit" class="btn btn-success"  value="Add">
        </div>
    </form>
@endsection

<!---- MODAL PARA EDITAR ----->
@section('contenidoE')
    <form action="#" method="post" id="formedit" >
        {{csrf_field()}}
        {{method_field('PUT')}}
        <input type="hidden">
        <div class="modal-header">
            <h4 class="modal-title">Editando Informacion</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Conductor</label>
                <label>
                    <input type="text" name="conductor" class="form-control" id="editarconductor" required>
                </label>
            </div>
            <div class="form-group">
                <label>Ruta</label>
                <label>
                    <input type="text" name="ruta" class="form-control" id="editarruta" required>
                </label>
            </div>
            <div class="form-group">
                <label>Capacidad</label>
                <label>
                    <input type="number" min="0" max="25" class="form-control" name="cap"  id="editarcapacidad" required>
                </label>
            </div>

        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
            <input  type="submit" class="btn btn-success"  value="Editar">
        </div>
    </form>
@endsection

<!--- MODAL PARA ELIMINAR ----->
@section('contenidoD')
    <form action="{{url('/Autobus')}}" method="post" id="formdelete">
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

<!---  PARTE DE SCRIPT -->
@section('page-js-files')
    <script >
        $(document).ready(function() {
            console.log("Settings page was loaded");
            $('#eliminar').on('show.bs.modal',function (event){
                let link  = event.relatedTarget,
                    id    = link.dataset["id"];
                $('#formdelete').attr('action',"{{url('/Autobus//')}}"+'/'+id);
            });

            $('#editar').on('show.bs.modal',function (event){

                let link  = event.relatedTarget,
                id        = link.dataset["id"],
                conductor = link.dataset["conductor"],
                ruta      = link.dataset["ruta"],
                capacidad = link.dataset["capacidad"];
                $(this).find("#editarconductor").val(conductor);
                $(this).find("#editarruta").val(ruta);
                $(this).find("#editarcapacidad").val(capacidad);
                $('#formedit').attr('action',"{{url('/Autobus//')}}"+'/'+id);
            });
        });

    </script>
@stop

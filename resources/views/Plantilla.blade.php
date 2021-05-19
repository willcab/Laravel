<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bienvenido</title>
    @yield('head')

</head>
<body>
<div id="crud">
    <div class="flex-center position-ref full-height">
    <!------botones---------->
    <div class="btn-group">
        <a href="{{route('atras')}}" class="btn btn-danger">Regresar</a>
    </div>
    <!------botones---------->

    <!------tabla!----------->
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                @yield('nombre')
                            </div>
                            <div class="col-sm-6">
                                @yield('botones')
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                @yield('filanombre')
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                @yield('tabla')
                                </td>
                            </tr>
                    </table>
                </div>

            </div>

        </div>
    <!------fin tabla-------->
        @include('Forms')
    </div>



</div>

</body>
@yield('page-js-files')
@yield('page-js-script')
</html>

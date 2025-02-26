<x-header />
@vite('resources/js/servicios/servicios.js')
<div class="row m-2 p-2">
    <h1>Agregar Servicios</h1>
</div>
<form action="{{ route('config.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-3 offset-md-3">
            <div class="form-floating mb-3 ">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                <label for="nombre">Nombre del servicio</label>
            </div>
        </div>
        <div class="col-md-2 ">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="cantidad" name="cantidad" pattern="\d{1,9}"
                    inputmode="numeric" maxlength="4" required>
                <label for="cantidad">Cantidad Maxima de beneficiarios</label>
            </div>
        </div>


    </div>
    <div class="row">
        <div class="offset-md-4">
            <button class="btn btn-primary m-2 p-2" type="submit">Guardar</button>
            <a href="{{ route('config') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 p-3 m-3 g-2">
            <table class="table">
                <thead>
                    <tr>

                        <th>nombre</th>
                        <th>Cantidad de Beneficiarios</th>
                        <th>status</th>
                        <th>Acciones</th>
                        <!-- Agrega más columnas según sea necesario -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($servicios as $servicio)

                        <tr class="{{$servicio->id}}">

                            <td>{{ $servicio->nombre }}</td>
                            <td>{{ $servicio->cantidad_maxima_beneficiarios }}</td>
                            <td>{{ $servicio->status}} </td>

                            <td> <a value="{{$servicio->id}}" type="button" name="EditarServicio"
                                    href="{{ route('servicios.editar', $servicio->id) }}" id="EditarServicio"
                                    class="btn btn-primary ">Editar</a>
                                <button value="{{$servicio->id}}" type="button" name="EliminarServicio"
                                    data-modulo="/servicios/delete/" id="EliminarServicio"
                                    class="btn btn-secondary">Eliminar</button>
                            </td>
                            <!-- Agrega más columnas según sea necesario -->
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</form>
<footer>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</footer>
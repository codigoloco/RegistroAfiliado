<x-header />
<div class="row m-2 p-2">
    <h1>Agregar Servicios</h1>
</div>
<form action="{{ route('config.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-1 offset-md-3 ">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" max=4  maxlength="4" id="cantidad" name="cantidad" placeholder="Cantidad" required>
                <label for="cantidad">Cantidad</label>
            </div>
        </div>
        <div class="col-md-3 ">
            <div class="form-floating mb-3 ">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                <label for="nombre">Nombre</label>
            </div>
        </div>
        <div class="col-md-3 m-2 g-2">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-secondary" type="reset">Limpiar</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 p-3 m-3 g-2">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>nombre</th>
                        <th>Cantidad de servicios</th>
                        <th>Acciones</th>
                        <!-- Agrega más columnas según sea necesario -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($servicios as $servicio)
                    
                    <tr class="{{$servicio->id}}">                        
                        <td>{{ $servicio->nombre }}</td>
                        <td>{{ $servicio->maximoServicios }}</td>
                        <td> <a value="{{$servicio->id}}" type="button" name="EditarServicio"   href="{{ route('servicios.editar', $servicio->id) }}" id="EditarServicio" class="btn btn-primary ">Editar</a>
                             <button value="{{$servicio->id}}" type="button" name="EliminarServicio" data-modulo="/conf/delete/"  id="EliminarServicio" class="btn btn-secondary">Eliminar</button>
                        </td>
                        <!-- Agrega más columnas según sea necesario -->
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</form>
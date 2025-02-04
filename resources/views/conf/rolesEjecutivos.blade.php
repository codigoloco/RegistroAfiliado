<x-header />
<div class="row m-2 p-2">
    <h1>Agregar Roles Ejecutivos</h1>
</div>
<form action="{{ route('store.rolesEjecutivos') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-3">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                <label for="nombre">Nombre del rol</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="detalle" name="detalle" placeholder="detalle" required>
                <label for="detalle">descripcion del rol</label>
            </div>
        </div>
        <div class="col-md-3 m-2 g-2">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{ route('config') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
    <div class="row">
        <div class="col-6 p-3 m-3 g-2">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Rol</th>
                        <th>Nombre</th>
                        <th>Detalles</th>
                        <th>Acciones</th>
                        <!-- Agrega más columnas según sea necesario -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($rolesEjecutivos as $rol)
                    <tr>
                        <td>{{ $rol->id }}</td>
                        <td>{{ $rol->nombre }}</td>
                        <td>{{ $rol->detalle }}</td>
                        <td>                             
                            <button value="{{$rol->id}}" type="button" name="EliminarServicio" data-modulo="/ejecutivos/delete/" id="EliminarServicio" class="btn btn-secondary">Eliminar</button>
                        </td>
                        <!-- Agrega más columnas según sea necesario -->
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
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

    </div>
</form>
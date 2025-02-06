<x-header />
<div class="row m-2 p-2">
    <h1>Agregar ejecutivo</h1>
</div>
<form action="{{ route('config.store.ejecutivos') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-3">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                <label for="nombre">Nombre del ejecutivo</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido" required>
                <label for="apellido">apellido del Ejecutivo</label>
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
                        <th>ID</th>
                        <th>nombre</th>
                        <th>estatus</th>
                        <th>Acciones</th>
                        <!-- Agrega más columnas según sea necesario -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($ejecutivos as $ejecutivo)
                    <tr>
                        <td>{{ $ejecutivo->id }}</td>
                        <td>{{ $ejecutivo->nombre }}</td>
                        <td>{{ $ejecutivo->Activo==1?"Activo":"Inactivo" }}</td>
                        <td>                             
                            <button value="{{$ejecutivo->id}}" type="button" name="EliminarServicio" data-modulo="/Ejecutivos/delete/" id="EliminarServicio" class="btn btn-secondary">Eliminar</button>
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
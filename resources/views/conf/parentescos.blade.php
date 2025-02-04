<x-header />
<div class="row m-2 p-2">
    <h1>Agregar Parentescos</h1>
</div>
<form action="{{ route('config.store.parentesco') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-3">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                <label for="nombre">Parentesco</label>
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
                        <th>Parentesco</th>
                        <th>Acciones</th>

                        <!-- Agrega más columnas según sea necesario -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($parentescos as $servicio)
                    <tr>
                        <td>{{ $servicio->id }}</td>
                        <td>{{ $servicio->nombre }}</td>
                        <td>                             
                            <button value="{{$servicio->id}}" type="button" name="EliminarServicio" data-modulo="/parentesco/delete/" id="EliminarServicio" class="btn btn-secondary">Eliminar</button>
                        </td>
                        <!-- Agrega más columnas según sea necesario -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        
        </div>

    </div>
</form>
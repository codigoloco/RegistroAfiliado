<x-header />

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Gestionar Convenios</h1>
        </div>
        <form action="{{ route('convenios.store') }}" method="POST">
            <div class="row">
                <div class="col-3">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name='Nombre' id="Nombre" placeholder="name@example.com">
                        <label for="Nombre">Nombre</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="descripcion" id="descripcion" placeholder="name@example.com">
                        <label for="descripcion">descripcion</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="RIF" id="RIF" placeholder="name@example.com">
                        <label for="RIF"> RIF</label>
                    </div>
                </div>

            </div>
            <btn: class="btn btn-primary">Guardar</btn:>
        </form>
    </div>
    <div class="row">
        <div class="col-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>RIF</th>
                        <th>Acciones</th>
                        <!-- Agrega más columnas según sea necesario -->
                    </tr>
                    <tbody>
                        @foreach($convenios as $convenio)
                            <tr>
                                <td>{{ $convenio->nombre }}</td>
                                <td>{{ $convenio->descripcion }}</td>
                                <td>{{ $convenio->rif }}</td>
                                <td>
                                    <a value="{{$convenio->id}}" type="button" name="EditarServicio"
                                        href="{{ route('convenios.editar', $convenio->id) }}" id="EditarServicio"
                                        class="btn btn-primary ">
                                        Editar
                                    </a>
                                    <button value="{{$convenio->id}}" type="button" name="EliminarServicio"
                                        data-modulo="/convenios/delete/" id="EliminarServicio"
                                        class="btn btn-secondary">Eliminar</button>
                                </td>
                                <!-- Agrega más columnas según sea necesario -->
                            </tr>
                        @endforeach
        </div>
    </div>
</div>

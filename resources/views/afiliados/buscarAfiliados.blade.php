<x-header />
<div class="container">
    <header>
        <h1>Gestionar Afiliaciones</h1>
        <button type="button" class="btn btn-primary">
            AgregarExcel
        </button>
    </header>
    <div class="row">
        <div class="col-12">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>ID Rol</th>
                        <th>cedula</th>
                        <th>Nombre y apellido</th>
                        <th>Servicio</th>
                        <th>Acciones</th>
                        <!-- Agrega más columnas según sea necesario -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($Afiliados as $afiliado)
                    <tr>
                        <td>{{ $afiliado->id }}</td>
                        <td>{{ $afiliado->cedula }}</td>
                        <td>{{ $afiliado->primer_nombre }} {{$afiliado->segundo_nombre}}</td>
                        <td>{{ $afiliado->nombre_servicio}}</td>
                        <td><button type='button' class='btn btn-secondary' data-modulo='afiliados/editar' >edicion</button></td>

                        <!-- Agrega más columnas según sea necesario -->
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
<x-footer />

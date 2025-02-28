<x-header />
@vite('resources/js/afiliados/getAfiliado.js')
<div class="container">
    <header>

        <h1>Gestionar Afiliaciones</h1>
    </header>
    <div class="row">
        <div class="col-9">
            <x-Carga-excel :title="'Importar Excel'" />
        </div>
        <div class="col-3">
            <input type="text" name="buscar" id="searchInput" placeholder="Buscar..." class="form-control mb-3">
        </div>
        <hr>

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
                    <tbody id='afiliadosTabla'>
                        @foreach ($Afiliados as $afiliado)
                            <tr>
                                <td value='{{ $afiliado->id }}'> {{ $afiliado->id }}</td>
                                <td value='{{ $afiliado->cedula }}'> {{ $afiliado->cedula }}</td>
                                <td>{{ $afiliado->primer_nombre }} {{ $afiliado->segundo_nombre }}</td>
                                <td>{{ $afiliado->nombre_servicio }}</td>
                                <td><button type='button' id='EditarServicio' class='btn btn-secondary'
                                        data-modulo='afiliados/editar'>edicion</button></td>

                                <!-- Agrega más columnas según sea necesario -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <x-footer />

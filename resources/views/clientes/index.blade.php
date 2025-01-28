<x-header />
<div class="container">
    <div class="row mt-4 justify-content-center">
        <div class="col-12 text-center">
            <h1>Lista de Clientes</h1>

        </div>

    </div>
    <div class="row justify-content-center">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>cedula</th>
                        <th>RIF</th>
                        <th>status</th>
                        <th>nombre</th>
                        <th>apellido</th>
                        <th>correo</th>

                        <!-- Agrega más columnas según sea necesario -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->cedula }}</td>
                        <td>{{ $cliente->rif }}</td>
                        <td>{{ $cliente->status }}</td>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->apellido }}</td>
                        <td>{{ $cliente->correo }}</td>
                        <!-- Agrega más columnas según sea necesario -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
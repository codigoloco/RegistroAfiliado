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
                        <th>nombre</th>
                        <th>detalle</th>
                        <!-- Agrega más columnas según sea necesario -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($Afiliados as $afiliado)
                    <tr>
                        <td>{{ $afiliado->id }}</td>
                        <td>{{ $afiliado->nombre }}</td>
                        <td>{{ $afiliado->detalle }}</td>
                        <td> input</td>
                        <!-- Agrega más columnas según sea necesario -->
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
<x-footer />
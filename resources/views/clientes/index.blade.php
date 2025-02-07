<x-header />
<div class="container">
    <div class="row mt-4 justify-content-center">
        <div class="col-12 text-center">
            <h1>Lista de Clientes</h1>

        </div>

    </div>
    <div class="row justify-content-center p-2">
        <div class="col-2">            
            <a href="{{ route('regClientes')}}" class="btn btn-primary">Registrar Cliente</a>
        </div>
        <div class="col-6">
            <input type="text" class="form-control"  id+="searchInput" placeholder="Buscar Cliente">


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
                <tbody id="clientesTabla">
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->cedula }}</td>
                            <td>{{ $cliente->rif }}</td>
                            <td>{{ $cliente->status }}</td>

                            <td>{{ $cliente->nombre }}</td>
                            <td>{{ $cliente->apellido }}</td>
                            <td>{{ $cliente->correo }}</td>
                            <td>
                                <a value="{{$cliente->id}}" type="button" name="EditarServicio"
                                    href="{{ route('clientes.update', $cliente->id) }}" id="EditarServicio"
                                    class="btn btn-primary ">
                                    Editar
                                </a>


                            </td>
                            <!-- Agrega más columnas según sea necesario -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <footer class="col-12">

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
    </div>
</div>
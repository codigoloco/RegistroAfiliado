<x-header />

<div class="container">
    <div class="row">
        <h1>Usuarios</h1>

        <div class="col-3">
            <a href="{{ route('config') }}" class="btn btn-secondary">Registrar</a>
        </div>
        <div class="col-3">
            <a href="{{ route('config') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="container mt-5">
                <h1 class="mb-4">Lista de Usuarios</h1>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">

                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Fecha de registro</th>
                                <th scope="col">Departamento</th>
                            </tr>


                        </thead>
                        <tbody>
                        <tbody>
                            @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->created_at }}</td>
                                <td>{{ $usuario->name }}</td>
                                <!-- Agrega más columnas según sea necesario -->
                            </tr>
                            @endforeach
                        </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-3">

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
        <x-footer />
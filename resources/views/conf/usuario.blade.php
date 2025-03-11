<x-header />

<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <h1 class="card-header">Usuarios</h1>
                <div class="card-body">
                    <h3 class="card-title">Lista de Usuarios</h3>
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('RegistrarUsuario') }}" class="btn btn-secondary me-2">Registrar</a>
                        <a href="{{ route('config') }}" class="btn btn-secondary">Volver</a>
                    </div>
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
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>{{ $usuario->created_at }}</td>
                                        <td>{{ $usuario->name }}</td>
                                        <!-- Agrega más columnas según sea necesario -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger mt-3">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<x-footer />

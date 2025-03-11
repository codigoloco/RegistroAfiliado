<x-header />
<div class="container pt-4">
    <div class="card text-center">
        <div class="card-header">
            <h3>Registrar Usuario</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('registrar_usuario.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Nombre" required>
                                <label for="name">Nombre</label>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Correo Electrónico" required>
                                <label for="email">Correo Electrónico</label>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Contraseña" required>
                                <label for="password">Contraseña</label>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Confirmar Contraseña" required>
                                <label for="password_confirmation">Confirmar Contraseña</label>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</div>

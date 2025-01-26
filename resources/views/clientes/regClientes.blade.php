<x-header/>
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Registrar Cliente</h1>
      <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
          <div class="col-4">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
          </div>
          <div class="col-4">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-3">
            <label for="nacionalidad" class="form-label">Nacionalidad</label>
            <label for="Nacionalidad" class="form-label">Nacionalidad</label>
            <select class="form-select" name="Nacionalidad" id="Nacionalidad">
              <option value="v" selected>Venezolano /a</option>
              <option value="E">Extranjero /a</option>
            </select>
          </div>
          <div class="col-3">
            <label for="cedula" class="form-label">Cédula</label>
            <input type="text" class="form-control" id="cedula" name="cedula" required>
          </div>
          <div class="col-3">
            <label for="rif" class="form-label">RIF</label>
            <input type="text" class="form-control" id="rif" name="rif" required>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" required>
          </div>
          <div class="col-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" required>
          </div>
          <div class="col-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
              <option value="1">Activo</option>
              <option value="0">Inactivo</option>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-3">
            <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
          </div>
          <div class="col-3">
            <label for="empresa" class="form-label">Empresa</label>
            <input type="text" class="form-control" id="empresa" name="empresa" required>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" required>
          </div>
        </div>
        <div class="row mb-3">

        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
      </form>
    </div>
  </div>
</div>
<x-footer/>
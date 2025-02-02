<x-header />
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Registro de Afiliados</h1>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <form action="{{ route('afiliados.store') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-3 mb-2 g-3">
                  <div class="form-floating">
                    <input type="text" placeholder="99.999.999" maxlength="8" pattern="\d{1,9}" inputmode="numeric" class="form-control" id="CedulaTitular" name="CedulaTitular" required>
                    <label for="CedulaTitular" >Cedula Titular</label>
                  </div>
                </div>
                <div class="col-3 mb-2">
                  <label for="tipoServicio" class="form-label">Tipo Servicio</label>
                  <select class="form-select" name="tipoServicio" id="tipoServicio" require>
                    <option selected>Default</option>
                    @foreach($servicios as $servi)
                    <option value="{{ $servi->id }}">{{ $servi->nombre }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-3 mb-2">
                  <label for="ejecutivo" class="form-label">ejecutivo</label>
                  <select class="form-select" name="ejecutivo" id="ejecutivo">
                    <option selected>Default</option>
                    @foreach($ejecutivos as $ejecutivo)
                    <option value="{{ $ejecutivo->id }}">{{$ejecutivo->id}}-{{ $ejecutivo->nombre }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-1 g-4"><button type="button" class="btn btn-secondary" id="AgregarBeneficiarios">+</button></div>
                <div class="col-1 g-4"><button type="button" class="btn btn-secondary" id="eliminarBeneficiarios">-</button></div>
                <div class="col-1 g-4"> <button id="ActualizarAfiliados" type='button' class="btn btn-primary">Actualizar</button></div>
              </div>
              <div id="beneficiarios-container">
                <div class="row beneficiario">
                  <div class="row">
                    <div class="col-2 mb-3 mt-5">
                      <label for="CedulaBeneficiario" class="form-label">Cedula Beneficiario</label>
                      <input type="text" class="form-control" id="CedulaBeneficiario" pattern="\d{1,9}" inputmode="numeric" maxlength="8" placeholder="99.999.999" name="CedulaBeneficiario" required>
                    </div>
                    <div class="col-2 mb-2 mt-5">
                      <label for="RIF" class="form-label">Tipo</label>
                      <select class="form-select" name="" id="">
                        <option value="J" selected>J</option>
                        <option value="G">G</option>
                        <option value="E">E</option>
                      </select>
                    </div>
                    <div class="col-2 mb-2 mt-5">
                      <label for="RIF" class="form-label">RIF</label>
                      <input type="text" class="form-control" maxlength="10" placeholder="99999999-9" pattern="\d{1,9}" inputmode="numeric" id="RIF" name="RIF" required>
                    </div>
                    <div class="col-3 mb-3 mt-5">
                      <label for="Nombre" class="form-label">Nombres</label>
                      <input type="text" class="form-control" placeholder="Nombre Completo" maxlength="40" id="Nombre" name="Nombre" required>
                    </div>
                    <div class="col-3 mb-3 mt-5">
                      <label for="Apellido" class="form-label">Apellidos</label>
                      <input type="text" class="form-control" placeholder="Apellido Completo" maxlength="40" id="Apellido" name="Apellido" required>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-2 mb-3">
                      <label for="FechaNacimiento" class="form-label">Fecha Nacimiento</label>
                      <input type="date" class="form-control" id="FechaNacimiento" name="FechaNacimiento" required>
                    </div>
                    <div class="col-2 mb-3">
                      <label for="Parentesco" class="form-label">Parentesco</label>
                      <select class="form-select" name="Parentesco" id="Parentesco">
                        <option selected>Seleccione</option>
                        @foreach($parentescos as $paren)
                        <option value="{{ $paren->id }}">{{ $paren->nombre }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-2 mb-3">
                      <label for="Nacionalidad" class="form-label">Nacionalidad</label>
                      <select class="form-select" name="Nacionalidad" id="Nacionalidad">
                        <option value="v" selected>Venezolano /a</option>
                        <option value="E">Extranjero /a</option>
                      </select>
                    </div>
                    <div class="col-3 mb-3">
                      <label for="Telefono" class="form-label">Telefono</label>
                      <input type="number" class="form-control" maxlength="12" pattern="\d{1,9}" inputmode="numeric" placeholder="412-000-00-00" id="Telefono" name="Telefono" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row p-4">
                <div class="col">
                  <div class="col-5 mb-1">
                    <label for="formFile" class="form-label">Adjuntar Contrato</label>
                    <input class="form-control" type="file" id="formFile" accept="application/pdf" name="formFile" required>
                  </div>
                </div>
              </div>
              <div class="footer">
                <div class="col-12">
                  <button type="button" class="btn btn-secondary" id="AgregarBeneficiarios">+</button>
                  <button type="button" class="btn btn-secondary" id="eliminarBeneficiarios">-</button>
                  <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
              </div>
            </form>
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
        </div>
      </div>
    </div>
  </div>
</div>

<x-footer />
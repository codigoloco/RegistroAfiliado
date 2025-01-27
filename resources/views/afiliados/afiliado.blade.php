<x-header />
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Registro de Afiliados</h1>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <form action="" method="POST">
              @csrf
              <div class="row">
                <div class="col-3 mb-2">
                  <label for="CedulaTitular" class="form-label">Cedula Titular</label>
                  <input type="text" placeholder="99.999.999" maxlength="8" pattern="\d{1,9}" inputmode="numeric" class="form-control" id="CedulaTitular" name="CedulaTitular" required>
                </div>
                <div class="col-3 mb-2">
                  <label for="tipoServicio" class="form-label">Tipo Servicio</label>
                  <select class="form-select" name="tipoServicio" id="tipoServicio">
                    <option selected>Default</option>
                    @foreach($Servicio as $servi)
                    <option value="{{ $servicio->id }}">{{ $servi->nombre }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div id="beneficiarios-container">
                <x-form />
              </div>
              <div class="row p-4">
                <div class="col">
                  <div class="col-5 mb-1">
                    <label for="formFile" class="form-label">Adjuntar Contrato</label>
                    <input class="form-control" type="file" id="formFile" accept="application/pdf" required>
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
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<x-footer />
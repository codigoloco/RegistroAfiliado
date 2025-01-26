
<div class="row beneficiario">
  <div class="row">
    <div class="col-2 mb-3 mt-5">
        <label for="CedulaBeneficiario" class="form-label">Cedula Beneficiario</label>
        <input type="number" class="form-control" id="CedulaBeneficiario" maxlength=9 placeholder="99.999.999" name="CedulaBeneficiario" required>
    </div>
    <div class="col-2 mb-2 mt-5">
        <label for="RIF" class="form-label">Tipo</label>
        <select class="form-select" name="" id="">
          <option value="G" >G</option>
          <option value="J" selected>J</option>
          <option value="E" selected>E</option>
        </select>        
    </div>
    <div class="col-2 mb-2 mt-5">
        <label for="RIF" class="form-label">RIF</label>
        <input type="text" class="form-control" maxlength="10" placeholder="99999999-9" id="RIF" name="RIF" required>
    </div>
    <div class="col-3 mb-3 mt-5">
        <label for="Nombre" class="form-label">Nombres</label>
        <input type="text" class="form-control" placeholder="Nombre Completo" maxlength="40" id="Nombre" name="Nombre" required>
    </div>
    <div class="col-3 mb-3 mt-5">
        <label for="Apellido" class="form-label">Apellidos</label>
        <input type="text" class="form-control" placeholder="Apellido Completo" maxlength="40" id="Apellido"  name="Apellido" required>
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
        <input type="number" class="form-control" maxlength="12" placeholder="412-000-00-00" id="Telefono" name="Telefono" required>
    </div>
  </div>
</div>
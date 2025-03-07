<x-header />
<br>
<div class="row col-12">
    <h1 class="text-center pb-4">Editar Afiliado</h1>
</div>



@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="" method="POST">
    @csrf
    @method('PUT') <!-- Agregar método PUT para la actualización -->
    <div class="row">
        <div class="col-2 mb-2">
            <label for="CedulaTitular" class="form-label">Cedula Titular</label>
            <input disabled type="text" placeholder="99.999.999" id="cedulaTitularAfiliado" inputmode="numeric"
                class="form-control searchInput cedula" name="CedulaTitular" value="{{ $afiliado[0]->cedula }}"
                required>
        </div>
        <div class="col-2 mb-2">
            <label for="NombreCompleto" class="form-label">Nombre Completo</label>
            <input type="text" name="NombreCompleto" class="form-control"
                value="{{ $afiliado[0]->primer_nombre }} {{ $afiliado[0]->primer_apellido }}" disabled>
        </div>
        <!-- ... otros campos ... -->

        <div class="col-2 mb-2">
            <label for="tipoServicio" class="form-label">Tipo de Servicio</label>
            <input disabled type="text" class="form-control" value="{{ $afiliado[0]->nombre }}">
        </div>


        <div class="col-2 mb-2">
            <label for="ejecutivo" class="form-label">Ejecutivo</label>
            <input disabled type="text" class="form-control"
                value="{{ $afiliado[0]->Nombre_Ejecutivo }} {{ $afiliado[0]->Apellido_Ejecutivo }}">
        </div>
        <div class="col-2 mb-2">
            <label for="FechaCreacion" class="form-label">Fecha de Creación</label>
            <input disabled type="text" class="form-control" value="{{ $afiliado[0]->created_at }}">
        </div>
    </div>
    <div class="row">
        @foreach ($afiliado_detalles as $detalle)
            <div class="col-2 mb-2">
                <label for="" class="form-label">Primer Nombre Beneficiario</label>
                <input class="form-control" value="{{ $detalle->primer_nombre }} ">
            </div>
            <div class="col-2 mb-2">
                <label for="" class="form-label">Segundo Nombre Beneficiario </label>
                <input class="form-control" value="{{ $detalle->segundo_nombre }} ">
            </div>
            <div class="col-2 mb-2">
                <label for="" class="form-label">Primer Apellido Beneficiario</label>
                <input class="form-control" value="{{ $detalle->primer_apellido }} ">
            </div>
            <div class="col-2 mb-2">
                <label for="" class="form-label">Segundo Apellido Beneficiario</label>
                <input class="form-control" value="{{ $detalle->segundo_apellido }} ">
            </div>
            <div class="col-2 mb-2">
                <label for="" class="form-label">Telefono</label>
                <input class="form-control" value="{{ $detalle->telefono }} ">
            </div>
            <div class="col-1 mb-1">
                <Label for=""  class="form-label">Status</Label>
                <select class="form-control" name="" id="">
                    <option value="activo">activo</option>
                    <option value="inactivo">inactivo</option>
                </select>
            </div>
            <div class="col-1 mb-1">
                <Label for=""  class="form-label">Parentesco</Label>
                <select class="form-control" name="" id="">
                    
                </select>
            </div>
        @endforeach
    </div>

    
</form>

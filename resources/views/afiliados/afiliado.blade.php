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
                                <div class="col-3 mb-2">
                                    <label for="CedulaTitular" class="form-label ">Cedula Titular</label>
                                    <input type="text" placeholder="99.999.999" id="cedulaTitularAfiliado"
                                        inputmode="numeric" class="form-control searchInput cedula" id="CedulaTitular"
                                        name="CedulaTitular" required>

                                </div>
                                <div class="col-1 pt-4 g-2 mb-2"> <button id="BuscarCliente" type='button'
                                        class="btn btn-success">Buscar</button>
                                </div>
                                <div class="col-3 mb-2">
                                    <label for="tipoServicio" class="form-label">Tipo Servicio</label>
                                    <select class="form-select" name="tipoServicio" id="tipoServicio">
                                        <option selected>Default</option>
                                        @foreach ($servicios as $servi)
                                            <option value="{{ $servi->id }}">{{ $servi->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3 mb-2">
                                    <label for="ejecutivo" class="form-label">ejecutivo</label>
                                    <select class="form-select" name="ejecutivo" id="ejecutivo">
                                        <option selected>Default</option>
                                        @foreach ($ejecutivos as $ejecutivo)
                                            <option value="{{ $ejecutivo->id }}">
                                                {{ $ejecutivo->id }}-{{ $ejecutivo->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-1 g-4"><button type="button" class="btn btn-secondary"
                                        id="AgregarBeneficiarios">+</button></div>
                                <div class="col-1 g-4"><button type="button" class="btn btn-secondary"
                                        id="eliminarBeneficiarios">-</button></div>

                            </div>
                            <div class="data-user">

                            </div>
                            <div id="beneficiarios-container">
                                <div class="row beneficiario">
                                    <div class="row">
                                        <div class="col-2 mb-3 mt-5">
                                            <label for="CedulaBeneficiario" class="form-label">Cedula
                                                Beneficiario</label>
                                            <input type="text" class="form-control cedula" id="CedulaBeneficiario"
                                                inputmode="numeric" placeholder="99.999.999" name="CedulaBeneficiario"
                                                required>
                                        </div>

                                        <div class="row">

                                            <div class="col-3 mb-3 mt-5">
                                                <label for="primer_nombre" class="form-label">primer Nombre</label>
                                                <input type="text" class="form-control"
                                                    placeholder="primer nombre beneficiario" maxlength="40"
                                                    id="primer_nombre" name="primer_nombre" required>
                                            </div>
                                            <div class="col-3 mb-3 mt-5">
                                                <label for="segundo_nombre" class="form-label">segundo Nombre</label>
                                                <input type="text" class="form-control"
                                                    placeholder="segundo nombre beneficiario" maxlength="40"
                                                    id="segundo_nombre" name="segundo_nombre" required>
                                            </div>
                                            <div class="col-3 mb-3 mt-5">
                                                <label for="primer_apellido" class="form-label">primer
                                                    Apellido</label>
                                                <input type="text" class="form-control"
                                                    placeholder="primer apellido beneficiario" maxlength="40"
                                                    id="primer_apellido" name="primer_apellido" required>
                                            </div>
                                            <div class="col-3 mb-3 mt-5">
                                                <label for="segundo_apellido" class="form-label">segundo
                                                    Apellido</label>
                                                <input type="text" class="form-control"
                                                    placeholder="segundo apellido beneficiario" maxlength="40"
                                                    id="segundo_apellido" name="segundo_apellido" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2 mb-3">
                                            <label for="fecha_nacimiento" class="form-label">Fecha Nacimiento</label>
                                            <input type="date" min="1900-12-31" max="2018-99-31"
                                                class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                                                required>
                                        </div>
                                        <div class="col-2 mb-3">
                                            <label for="Parentesco" class="form-label">Parentesco</label>
                                            <select class="form-select" name="Parentesco" id="Parentesco">
                                                <option selected>Seleccione</option>
                                                @foreach ($parentescos as $paren)
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
                                            <label for="Telefono" class="form-label ">Telefono</label>
                                            <input type="text" class="form-control telefono" inputmode="numeric"
                                                placeholder="(412)-000-00-00" id="Telefono" name="Telefono"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-4">
                                <div class="col">
                                    <div class="col-5 mb-1">
                                        <label for="formFile" class="form-label">Adjuntar Contrato</label>
                                        <input class="form-control" type="file" id="formFile"
                                            accept="application/pdf" name="formFile" required>
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <div class="col-12">
                                    <button type="button" class="btn btn-secondary"
                                        id="AgregarBeneficiarios">+</button>
                                    <button type="button" class="btn btn-secondary"
                                        id="eliminarBeneficiarios">-</button>
                                    <button type="submit" class="btn btn-primary enviar">Registrar</button>
                                </div>
                            </div>
                        </form>
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
                </div>
            </div>
        </div>
    </div>
</div>
@vite('resources/js/afiliados/addAfiliado.js')
<x-footer />


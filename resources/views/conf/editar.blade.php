<x-header />
<div class="container ModuloEditarServicios pt-4">
    <div class="card text-center">
        <div class="card-header">
        <h3>Editar Servicio</h3>
        
    </div>        
        <div class="card-body">
            <div class="container">                
                <form action="{{ route('servicios.actualizar', $servicio->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Laravel requiere esto para las solicitudes PUT -->
                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="row p-2 mt-3 justify-content-center">
                                    <div class="col-3">
                                        <div class="form-floating">
                                            <input type="text" value="{{$servicio->nombre}}" class="form-control" id="nombre" inputmode="numeric" maxlength="8" name="nombre" required>
                                            <label for="nombre" class="form-label">NombreServicio</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-2 mt-3 justify-content-center">
                                    <div class="col-3">
                                        <div class="form-floating">
                                            <input type="text" value='{{$servicio->cantidad_maxima_beneficiarios}}' class="form-control" id="maximoServicios" pattern="\d{1,9}" inputmode="numeric" maxlength="4" placeholder="99.999.999" name="maximoServicios" required>
                                            <label for="maximoServicios">Cantidad Maxima de Beneficiarios</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-2 mt-3 justify-content-center">
                                    <div class="col-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input StatusBtn" type="checkbox" name="status" id="status" {{ $servicio->status ? 'checked' :''  }} >
                                            <label class="form-check-label"  value="{{$servicio->status}}" for="flexSwitchCheckChecked">{{ $servicio->status ? 'Servicio Activado' :'Servicio Desactivado'  }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-2 mt-3 justify-content-center">
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
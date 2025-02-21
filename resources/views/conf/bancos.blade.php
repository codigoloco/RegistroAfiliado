<x-header />

<div class="container">
    <div class="row">
        <div class="col-12 p-3 m-3 g-2">
            <table class="table">
                <thead>
                    <tr>

                        <th>nombre</th>
                        <th>Cantidad de Beneficiarios</th>
                        <th>status</th>
                        <th>Acciones</th>
                        <!-- Agrega más columnas según sea necesario -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Bancos as $Banco)
                        <tr class="{{ $Banco->id }}">

                            <td>{{ $Banco->nombre }}</td>
                            <td>{{ $Banco->cantidad_maxima_beneficiarios }}</td>
                            <td>{{ $Banco->status }} </td>

                            <td> <a value="{{ $Banco->id }}" type="button" name="EditarServicio"
                                    href="{{ route('servicios.editar', $Banco->id) }}" id="EditarServicio"
                                    class="btn btn-primary ">Editar</a>
                                <button value="{{ $servicio->id }}" type="button" name="EliminarServicio"
                                    data-modulo="/servicios/delete/" id="EliminarServicio"
                                    class="btn btn-secondary">Eliminar</button>
                            </td>
                            <!-- Agrega más columnas según sea necesario -->
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>

<x-footer />

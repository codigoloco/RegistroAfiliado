<x-header />
<br>
<br>


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <div class="card">
                    
                    <div class="card-body">
                        <x-form-edi :action="$modo === 'crear' ?  route('clientes.store', $clientes): route('clientes.actualizar',$clientes)" :cliente="$modo === 'crear' ? $clientes : new App\Models\Clientes" :button-text="$modo === 'editar' ? 'Actualizar' : 'Registrar'" :title="$modo === 'editar' ? 'Editar Cliente' : 'Registrar Cliente'"
                            :cliente="$clientes" :modo="$modo" :metodo="$modo === 'crear' ? 'POST' : 'POST'" />
                    </div>
                </div>
            </div>
        </div>
        <x-footer />

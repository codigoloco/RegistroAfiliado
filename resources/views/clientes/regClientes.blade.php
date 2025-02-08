<x-header />
<br>
<br>
@vite('resources/js/clientes/clientes.js')
<div class="container">
  <div class="row">
    <div class="col-12"> 
      <x-form-edi  
          :action="$modo === 'crear' ?  route('clientes.store',$clientes): route('clientes.update', $cliente)"
          :cliente="$modo === 'crear' ? $clientes : new App\Models\Clientes"
          :button-text="$modo === 'editar' ? 'Actualizar' : 'Registrar'"
          :title="$modo === 'editar' ? 'Editar Cliente' : 'Registrar Cliente'"
      /> 
    </div>
  </div>
</div>
<x-footer />
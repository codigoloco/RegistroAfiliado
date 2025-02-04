<x-header />
<h1>Usuarios</h1>

<a href="{{ route('config') }}" class="btn btn-secondary">Volver</a>

</div>
<div class="col-3">

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
<x-footer />
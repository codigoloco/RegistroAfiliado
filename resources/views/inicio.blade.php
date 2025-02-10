@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@else
    @include('auth.login')
@endif

<div class="container">
    <div class="row m-5 p-5">
        <!-- Card Afiliaciones -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="row g-0">
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="120px" viewBox="0 -960 960 960" width="120px"
                            fill="#6c757d">
                            <path d="M320-460h320v-60H320v60Zm0 120h320v-60H320v60Zm0 120h200v-60H320v60ZM220-80q-24 0-42-18t-18-42v-680q0-24 18-42t42-18h361l219 219v521q0 24-18 42t-42 18H220Zm331-554v-186H220v680h520v-494H551ZM220-820v186-186 680-680Z" />
                        </svg>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Afiliaciones</h5>
                            <p class="card-text">un total de: {{ $afiliaciones->count() }} afiliaciones</p>
                            <p class="card-text">Gestione las afiliaciones de sus clientes de manera eficiente y segura.</p>
                            <a href="{{ route('buscar.afiliados') }}" class="btn btn-primary">Gestionar Afiliaciones</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Desafiliaciones -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="row g-0">
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="200px" viewBox="0 0 24 24" width="200px" fill="#6c757d">
                            <path d="M0 0h24v24H0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                        </svg>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Desafiliaciones</h5>
                            <p class="card-text">un total de: {{ $afiliaciones->where('status', 'INACTIVO')->count() }} desafiliaciones</p>
                            <p class="card-text">Procese las desafiliaciones de manera rápida y efectiva.</p>
                            <a href="#" class="btn btn-primary">Gestionar Desafiliaciones</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Clientes -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="row g-0">
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="200px" viewBox="0 0 18 24" width="200px" fill="#6c757d">
                            <path d="M0 0h24v24H0z" fill="none"/><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Clientes</h5>    
                            <p class="card-text">un total de: {{ $clientes->count() }} clientes</p>
                            <p class="card-text">Administre la información de sus clientes de forma centralizada.</p>
                            <a href="{{ route('buscar.afiliados') }}" class="btn btn-primary">Gestionar Clientes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Beneficiarios -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="row g-0">
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="200px" viewBox="0 0 24 24" width="200px" fill="#6c757d">
                            <path d="M0 0h24v24H0z" fill="none"/><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Beneficiarios</h5>
                            <p class="card-text">Gestione los beneficiarios asociados a sus clientes.</p>
                            <a href="#" class="btn btn-primary">Gestionar Beneficiarios</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
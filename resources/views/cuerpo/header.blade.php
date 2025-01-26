<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  <link href="{{ asset('node_modules/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet">

  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">TuMedicoNacional</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('inicio') }}">Inicio</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Afiliados
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('afiliados') }}">Registrar</a></li>
              <li><a class="dropdown-item" href="#">Buscar</a></li>
              <li><a class="dropdown-item" href="#">Editar</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Clientes
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('regClientes') }}">Registrar</a></li>
              <li><a class="dropdown-item" href="{{ route('index') }}">Buscar</a></li>
              <li><a class="dropdown-item" href="#">Editar/eliminar</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Configuracion
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Configuracion</a></li>
              <li><a class="dropdown-item" href="#">Reportes</a></li>
            </ul>
          </li>
        </ul>
        <!-- Botón para alternar modos -->
        
        <img id="theme-toggle" src="{{ asset('moon.svg') }}"  alt="Mi Icono">
        
      </div>
    </div>
  </nav>

  <!-- Bootstrap JS -->
   
</body>
</html>
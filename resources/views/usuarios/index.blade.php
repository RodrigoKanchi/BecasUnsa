@extends('layouts.app') 

@section('content')
<section class="adm-section active" id="section-usuarios" style="padding:2%">
        <div class="adm-page-header">
          <div>
            <h1 class="adm-page-title">Usuarios</h1>
            <p class="adm-page-subtitle">Gestione los usuarios del sistema institucional</p>
          </div>
          <button class="adm-btn primary">+ Nuevo Usuario</button>
        </div>

        @include('usuarios.info')
        @include('usuarios.table')

</section>
@endsection
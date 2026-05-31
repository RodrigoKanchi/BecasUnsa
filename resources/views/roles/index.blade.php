@extends('layouts.app') 

@section('content')
<section class="adm-section active" id="section-usuarios" style="padding:2%">
        <div class="adm-page-header">
          <div>
            <h1 class="adm-page-title">Roles</h1>
            <p class="adm-page-subtitle">Gestione los Roles del sistema institucional</p>
          </div>
          <a class="adm-btn primary" href="{{ route('roles.create') }}">+ Nuevo Rol</a>
        </div>

        @include('roles.table')
        <div class="mt-4">
            {{ $roles->links() }}
        </div>
</section>
@endsection
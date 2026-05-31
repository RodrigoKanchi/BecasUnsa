@extends('layouts.app') 

@section('content')
<section class="adm-section active" id="section-usuarios" style="padding:2%">
        <div class="adm-page-header">
          <div>
            <h1 class="adm-page-title">Permisos</h1>
            <p class="adm-page-subtitle">Gestione los Permisos del sistema institucional</p>
          </div>
          <a class="adm-btn primary" href="{{ route('permisos.create') }}">+ Nuevo Permisos</a>
        </div>

        @include('permisos.table')
        <div class="mt-4">
            {{ $permisos->links() }}
        </div>
</section>
@endsection
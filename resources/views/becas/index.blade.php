@extends('layouts.app') 

@section('content')
<section class="adm-section active" id="section-becas" style="padding:2%">
        <div class="adm-page-header">
          <div>
            <h1 class="adm-page-title">Usuarios</h1>
            <p class="adm-page-subtitle">Gestione los becas del sistema institucional</p>
          </div>
          <a class="adm-btn primary" href="{{ route('becas.create') }}">+ Nueva Beca</a>
        </div>

        @include('becas.table')
        <div class="mt-4">
            {{ $becas->links() }}
        </div>
</section>
@endsection
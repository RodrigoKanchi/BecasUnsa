@extends('layouts.app') 

@section('content')
<section class="adm-section active" id="section-usuarios" style="padding:2%">
        <div class="adm-page-header">
          <div>
            <h1 class="adm-page-title">Carreras</h1>
            <p class="adm-page-subtitle">Gestione las carreras del sistema institucional</p>
          </div>
          <a class="adm-btn primary" href="{{ route('carreras.create') }}">+ Nueva Carrera</a>
        </div>

        @include('carreras.table')
        <div class="mt-4">
            {{ $carreras->links() }}
        </div>
</section>
@endsection
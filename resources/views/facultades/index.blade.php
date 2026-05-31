@extends('layouts.app') 

@section('content')
<section class="adm-section active" id="section-usuarios" style="padding:2%">
        <div class="adm-page-header">
          <div>
            <h1 class="adm-page-title">Facultades</h1>
            <p class="adm-page-subtitle">Gestione los Facultades del sistema institucional</p>
          </div>
          <a class="adm-btn primary" href="{{ route('facultades.create') }}">+ Nueva Facultad</a>
        </div>

        @include('facultades.table')
        <div class="mt-4">
            {{ $facultades->links() }}
        </div>
</section>
@endsection
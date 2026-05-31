@extends('layouts.app') 

@section('content')
<section class="adm-section active" id="section-usuarios" style="padding:2%">
        <div class="adm-page-header">
          <div>
            <h1 class="adm-page-title">Categorias</h1>
            <p class="adm-page-subtitle">Gestione las Categorias del sistema institucional</p>
          </div>
          <a class="adm-btn primary" href="{{ route('categorias.create') }}">+ Nueva Categoria</a>
        </div>

        @include('categorias.table')
        <div class="mt-4">
            {{ $categorias->links() }}
        </div>
</section>
@endsection
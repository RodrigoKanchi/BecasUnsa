@extends('layouts.app')
@section('content')
<main class="adm-content">
      <!-- Header -->
      <div class="ev-header">
        <div class="ev-header-left">
          <span class="ev-back" onclick="history.back()">‹ Volver a Categoria</span>
          <div class="ev-title-row">
            <span class="ev-entity-icon">👤</span>
            <h1 class="ev-page-title">{{ $categoria->nombre }}</h1>
          </div>
        </div>
        <div class="ev-show-actions">
          <a class="adm-btn outline" href="{{ route('categorias.edit', [ 'id' => $categoria->id ] ) }}">✏️ Editar</a>
        </div>
      </div>

      <div class="ev-show-layout">
        <!-- MAIN -->
        <div class="ev-show-main">

          <!-- Profile card -->
          <div class="adm-card ev-profile">
              <div class="ev-profile-name">{{ $categoria->nombre }}</div>
          </div>
            <div class="ev-det-field" style="border-bottom:none">
                <span class="ev-det-label">Estado</span>
                <span class="adm-status active">{{ $categoria->activo ? 'Activo' : 'Inactivo' }}</span>
            </div>

        </div>
      </div>
    </main>

@endsection
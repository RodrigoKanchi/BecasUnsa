@extends('layouts.app')
@section('content')
<main class="adm-content">
      <!-- Header -->
      <div class="ev-header">
        <div class="ev-header-left">
          <span class="ev-back" onclick="history.back()">‹ Volver a becas</span>
          <div class="ev-title-row">
            <span class="ev-entity-icon">👤</span>
            <h1 class="ev-page-title">Becas</h1>
          </div>
        </div>
        <div class="ev-show-actions">
          <a class="adm-btn outline" href="{{ route('becas.edit', [ 'beca' => $beca->id ] ) }}">✏️ Editar</a>
        </div>
      </div>

      <div class="ev-show-layout">
        <!-- MAIN -->
        <div class="ev-show-main">

          <!-- Profile card -->
          <div class="adm-card ev-profile">
            <div>
              <div class="ev-profile-name">{{ $beca->titulo }}</div>
              <div class="ev-profile-email">{{ $beca->descripcion }}</div>
              <div class="ev-profile-badges">
                @if($beca->carreras->isNotEmpty())
                    @foreach($beca->carreras as $carrera)
                        <span class="adm-chip">{{ $carrera->nombre }}</span>
                    @endforeach
                @endif
                <span class="adm-status active">{{ $beca->activo ? 'Activo' : 'Inactivo' }}</span>
              </div>
            </div>
          </div>

          <!-- Info Personal -->
          <div class="adm-card">
            <div class="ev-det-hd">Información</div>
            <div class="ev-det-grid">
              <div class="ev-det-field">
                <span class="ev-det-label">Titulo</span>
                <span class="ev-det-val">{{ $beca->titulo }}</span>
              </div>
              <div class="ev-det-field">
                <span class="ev-det-label">Fecha Inscripcion</span>
                <span class="ev-det-val">{{ $beca->fecha_inscripcion }}</span>
              </div>
              <div class="ev-det-field">
                <span class="ev-det-label">Fecha Limite</span>
                <span class="ev-det-val">{{ $beca->fecha_limite }}</span>
              </div>
               <div class="ev-det-field">
                <span class="ev-det-label">Descripcion</span>
                <span class="ev-det-val">{{ $beca->descripcion }}</span>
              </div>
            </div>
          </div>

          <!-- Acceso -->
          <div class="adm-card">
            <div class="ev-det-hd">Informacion Resolucion</div>
            <div class="ev-det-grid">
              <div class="ev-det-field">
                <span class="ev-det-label">Correo Contacto</span>
                <span class="ev-det-val"> {{ $beca->correo_contacto }} </span>
              </div>
              <div class="ev-det-field">
                <span class="ev-det-label">Resolucion</span>
                <a href="{{ $beca->link_resolucion }}"><span class="adm-chip">{{ $beca->link_resolucion }}</span></a>
              </div>
              <div class="ev-det-field" style="border-bottom:none">
                <span class="ev-det-label">Estado</span>
                <span class="adm-status active">{{ $beca->activo ? 'Activo' : 'Inactivo' }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

@endsection
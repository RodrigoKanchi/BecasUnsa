@extends('layouts.app')
@section('content')
<main class="adm-content">
      <!-- Header -->
      <div class="ev-header">
        <div class="ev-header-left">
          <span class="ev-back" onclick="history.back()">‹ Volver a Usuarios</span>
          <div class="ev-title-row">
            <span class="ev-entity-icon">👤</span>
            <h1 class="ev-page-title">{{ $usuario->name }}</h1>
          </div>
        </div>
        <div class="ev-show-actions">
          <a class="adm-btn outline" href="{{ route('usuarios.edit', [ 'id' => $usuario->id ] ) }}">✏️ Editar</a>
        </div>
      </div>

      <div class="ev-show-layout">
        <!-- MAIN -->
        <div class="ev-show-main">

          <!-- Profile card -->
          <div class="adm-card ev-profile">
            <div>
              <div class="ev-profile-name">{{ $usuario->name }}</div>
              <div class="ev-profile-email">{{ $usuario->email }}</div>
              <div class="ev-profile-badges">
                <span class="adm-chip">{{ $usuario->role->first()->name }}</span>
                <span class="adm-status active">{{ $usuario->activo ? 'Activo' : 'Inactivo' }}</span>
              </div>
            </div>
          </div>

          <!-- Info Personal -->
          <div class="adm-card">
            <div class="ev-det-hd">Información Personal</div>
            <div class="ev-det-grid">
              <div class="ev-det-field">
                <span class="ev-det-label">Nombre y Apellido</span>
                <span class="ev-det-val">{{ $usuario->name }}</span>
              </div>
            </div>
          </div>

          <!-- Acceso -->
          <div class="adm-card">
            <div class="ev-det-hd">Acceso al Sistema</div>
            <div class="ev-det-grid">
              <div class="ev-det-field">
                <span class="ev-det-label">Correo institucional</span>
                <span class="ev-det-val"> {{ $usuario->email }} </span>
              </div>
              <div class="ev-det-field">
                <span class="ev-det-label">Rol</span>
                <span class="adm-chip">{{ $usuario->role->first()->name }}</span>
              </div>
              <div class="ev-det-field" style="border-bottom:none">
                <span class="ev-det-label">Estado</span>
                <span class="adm-status active">{{ $usuario->activo ? 'Activo' : 'Inactivo' }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

@endsection
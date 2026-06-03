@extends('layouts.app')
@section('content')
<main class="adm-content">
      <!-- Header -->
      <div class="ev-header">
        <div class="ev-header-left">
          <span class="ev-back" onclick="history.back()">‹ Volver a Roles</span>
          <div class="ev-title-row">
            <span class="ev-entity-icon">👤</span>
            <h1 class="ev-page-title">{{ $rol->name }}</h1>
          </div>
        </div>
        <div class="ev-show-actions">
          <a class="adm-btn outline" href="{{ route('roles.edit', [ 'role' => $rol->id ] ) }}">✏️ Editar</a>
        </div>
      </div>

      <div class="ev-show-layout">
        <!-- MAIN -->
        <div class="ev-show-main">

          <!-- Profile card -->
          <div class="adm-card ev-profile">
              <div class="ev-profile-name">{{ $rol->name }}</div>
          </div>

          <!-- Info Personal -->
          <div class="adm-card">
            <div class="ev-det-hd">Permisos</div>
            <div class="ev-det-grid">
                @foreach($permisos as $permiso)
                <div class="ev-det-field">
                    <span class="ev-det-val">{{ $permiso }}</span>
                </div>
                @endforeach
            </div>
          </div>

        </div>
      </div>
    </main>

@endsection
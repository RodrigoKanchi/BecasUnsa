@extends('layouts.app')

@section('content')
<main class="adm-content">
      <div class="ev-header">
        <div class="ev-header-left">
          <span class="ev-back" onclick="history.back()">‹ Volver a Roles</span>
          <div>
            <div class="ev-title-row">
              <span class="ev-entity-icon">👤</span>
              <h1 class="ev-page-title">Crear Rol</h1>
            </div>
            <p class="ev-subtitle">Complete los campos para registrar un nuevo rol.</p>
          </div>
        </div>
      </div>

      <!-- Alert -->
      <div class="ev-alert success" id="alertOk" style="display:none">
        ✅ Rol creado exitosamente.
        <button class="ev-alert-close" onclick="document.getElementById('alertOk').style.display='none'">✕</button>
      </div>

      <form id="createForm" method="POST" action="{{ route('roles.store') }}" novalidate>
        @csrf
        <div class="ev-form-layout">

          <!-- FORM MAIN -->
          <div class="ev-form-main">

            <div class="ev-section">Informacion Rol</div>

            <div class="ev-field">
              <label class="ev-label">Nombre <span class="ev-req">*</span></label>
              <input class="ev-input" name="nombre" id="f-nombre" type="text" />
              <span class="ev-field-err" id="e-nombre"></span>
            </div>

            <!-- Agregar para seleccionar permisos -->
             <div>
              <label class="ev-section">Permisos</label>
              <br>
              @foreach($permisos as $permiso)
              <label class="ev-label"> {{ $permiso->name }} </label>
              <input name="permisos" id="f-nombre" type="checkbox" value="{{ $permiso->id }}" />
              <br>
              @endforeach
            </div>

        <!-- FOOTER -->
        <div class="ev-footer">
          <a type="button" class="adm-btn ghost" href="{{ route('roles.index') }}">Cancelar</a>
          <div class="ev-footer-right">
            <button type="submit" class="adm-btn primary" id="submitBtn">Crear Usuario</button>
          </div>
        </div>
      </form>
    </main>
@endsection
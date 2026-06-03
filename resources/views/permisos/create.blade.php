@extends('layouts.app')

@section('content')
<main class="adm-content">
      <div class="ev-header">
        <div class="ev-header-left">
          <span class="ev-back" onclick="history.back()">‹ Volver a Permisos</span>
          <div>
            <div class="ev-title-row">
              <span class="ev-entity-icon">👤</span>
              <h1 class="ev-page-title">Crear Permiso</h1>
            </div>
            <p class="ev-subtitle">Complete los campos para registrar un nuevo permiso.</p>
          </div>
        </div>
      </div>

      <!-- Alert -->
      <div class="ev-alert success" id="alertOk" style="display:none">
        ✅ Permiso creado exitosamente.
        <button class="ev-alert-close" onclick="document.getElementById('alertOk').style.display='none'">✕</button>
      </div>

      <form id="createForm" method="POST" action="{{ route('permisos.store') }}">
        @csrf
        <div class="ev-form-layout">

          <!-- FORM MAIN -->
          <div class="ev-form-main">

            <div class="ev-section">Informacion Permiso</div>
            <div class="ev-field">
              <label class="ev-label">Nombre <span class="ev-req">*</span></label>
              <input class="ev-input" name="name" id="f-nombre" type="text" />
              <span class="ev-field-err" id="e-nombre"></span>
            </div>

            <!-- Agregar para seleccionar permisos -->


        <!-- FOOTER -->
        <div class="ev-footer">
          <a type="button" class="adm-btn ghost" href="{{ route('permisos.index') }}">Cancelar</a>
          <div class="ev-footer-right">
            <button type="submit" class="adm-btn primary" id="submitBtn">Crear Permiso</button>
          </div>
        </div>
      </form>
    </main>
@endsection
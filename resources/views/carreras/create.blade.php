@extends('layouts.app')

@section('content')
<main class="adm-content">
      <div class="ev-header">
        <div class="ev-header-left">
          <span class="ev-back" onclick="history.back()">‹ Volver a Carreras</span>
          <div>
            <div class="ev-title-row">
              <span class="ev-entity-icon">👤</span>
              <h1 class="ev-page-title">Crear Carrera</h1>
            </div>
            <p class="ev-subtitle">Complete los campos para registrar un nuevo permiso.</p>
          </div>
        </div>
      </div>

      <!-- Alert -->
      <div class="ev-alert success" id="alertOk" style="display:none">
        ✅ Facultad creado exitosamente.
        <button class="ev-alert-close" onclick="document.getElementById('alertOk').style.display='none'">✕</button>
      </div>

      <form id="createForm" method="POST" action="{{ route('carreras.store') }}" novalidate>
        @csrf
        <div class="ev-form-layout">

          <!-- FORM MAIN -->
          <div class="ev-form-main">

            <div class="ev-section">Informacion Carrera</div>

            <div class="ev-field">
              <label class="ev-label">Nombre <span class="ev-req">*</span></label>
              <input class="ev-input" name="nombre" id="f-nombre" type="text" />
              <span class="ev-field-err" id="e-nombre"></span>
            </div>

            <div class="ev-field">
              <label class="ev-label">Facultad <span class="ev-req">*</span></label>
              <select class="ev-select" name="facultad" id="f-facultad">
                <option value="" noselect>— Seleccionar —</option>
                @foreach($facultades as $facultad)
                  <option value="{{ $facultad->id }}">{{ $facultad->nombre }}</option>
                @endforeach
              </select>
              <span class="ev-field-err" id="e-facultad"></span>
            </div>

            <div class="ev-field">
              <label class="ev-label">Estado</label>
              <select class="ev-select" name="activo" id="f-estado">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
              </select>
            </div>

            <!-- Agregar para seleccionar carreras -->


        <!-- FOOTER -->
        <div class="ev-footer">
          <a type="button" class="adm-btn ghost" href="{{ route('carreras.index') }}">Cancelar</a>
          <div class="ev-footer-right">
            <button type="submit" class="adm-btn primary" id="submitBtn">Crear Carrera</button>
          </div>
        </div>
      </form>
    </main>
@endsection
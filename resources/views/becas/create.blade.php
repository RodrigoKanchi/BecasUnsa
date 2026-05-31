@extends('layouts.app')

@section('content')
<main class="adm-content">
      <div class="ev-header">
        <div class="ev-header-left">
          <span class="ev-back" href="{{ route('becas.index') }}">‹ Volver a Becas</span>
          <div>
            <div class="ev-title-row">
              <span class="ev-entity-icon">👤</span>
              <h1 class="ev-page-title">Crear Beca</h1>
            </div>
            <p class="ev-subtitle">Complete los campos para registrar un nuevo beca.</p>
          </div>
        </div>
      </div>

      <!-- Alert -->
      <div class="ev-alert success" id="alertOk" style="display:none">
        ✅ Beca creado exitosamente.
        <button class="ev-alert-close" onclick="document.getElementById('alertOk').style.display='none'">✕</button>
      </div>

      <form id="createForm" method="POST" action="{{ route('becas.store') }}" novalidate>
        @csrf
        <div class="ev-form-layout">

          <!-- FORM MAIN -->
          <div class="ev-form-main">

            <div class="ev-section">Información Beca</div>

            <div class="ev-field">
              <label class="ev-label">Titulo <span class="ev-req">*</span></label>
              <input class="ev-input" name="titulo" id="f-nombre" type="text" placeholder="Ingrese un titulo" oninput="clearErr('nombre')" />
              <span class="ev-field-err" id="e-nombre"></span>
            </div>
            <div class="ev-field">
              <label class="ev-label">Correo Contacto <span class="ev-req">*</span></label>
              <input class="ev-input" name="contacto" id="f-email" type="email" placeholder="usuario@institucion.edu" oninput="clearErr('email')" />
              <span class="ev-field-err" id="e-email"></span>
            </div>
            <div class="ev-field">
              <label class="ev-label">Fecha Inscripcion <span class="ev-req">*</span></label>
              <input type="date" class="ev-input" name="fecha_inscripcion" id="f-fecha">
            </div>
            <div class="ev-field">
              <label class="ev-label">Fecha Limite <span class="ev-req">*</span></label>
              <input type="date" class="ev-input" name="fecha_limite" id="f-fecha">
            </div>
             <div class="ev-field">
              <label class="ev-label">Resolucion <span class="ev-req">*</span></label>
              <input class="ev-input" name="resolucion" id="f-nombre" type="text" placeholder="Ingrese link resolucion" />
              <span class="ev-field-err" id="e-resolucion"></span>
            </div>
            <div class="ev-field">
              <label class="ev-label">Estado</label>
              <select class="ev-select" name="estado" id="f-estado">
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
              </select>
            </div>
            <div class="ev-field">
              <label class="ev-label">Descripcion</label>
              <textarea class="ev-textarea" name="descripcion" rows="3" id="f-desc" placeholder="Ingrese una descripcion"> </textarea>
              <span class="ev-field-err" id="e-nombre"></span>
            </div>


        <!-- FOOTER -->
        <div class="ev-footer">
          <a type="button" class="adm-btn ghost" href="{{ route('becas.index') }}">Cancelar</a>
          <div class="ev-footer-right">
            <button type="submit" class="adm-btn primary" id="submitBtn">Crear Beca</button>
          </div>
        </div>
      </form>
    </main>
@endsection
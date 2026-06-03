@extends('layouts.app')
@section('content')

<main class="adm-content">
      <div class="ev-header">
        <div class="ev-header-left">
          <span class="ev-back" href="{{ route('becas.index') }}">‹ Volver a Becas</span>
          <div>
            <div class="ev-title-row">
              <span class="ev-entity-icon">👤</span>
              <h1 class="ev-page-title">Editar Beca</h1>
              <span class="ev-dirty" id="dirtyBadge" style="display:none">Sin guardar</span>
            </div>
            <p class="ev-subtitle">Modifique los campos y guarde para actualizar el registro.</p>
          </div>
        </div>
      </div>

      <div class="ev-alert success" id="alertOk" style="display:none">
        ✅ Beca actualizado exitosamente.
        <button class="ev-alert-close" onclick="document.getElementById('alertOk').style.display='none'">✕</button>
      </div>

      <form id="editForm" method="POST" action="{{route('becas.update' , ['id' => $beca->id ])}} " >
        @csrf
        @method('PUT')
        <div class="ev-form-layout">
          <div class="ev-form-main">

            <div class="ev-section">Información Becas</div>

            <div class="ev-field">
              <label class="ev-label">Titulo <span class="ev-req">*</span></label>
              <input class="ev-input" name="titulo" id="f-titulo" type="text" value="{{ $beca->titulo }}" />
              <span class="ev-field-err" id="e-nombre"></span>
            </div>

            <div class="ev-field">
              <label class="ev-label">Correo Contacto <span class="ev-req">*</span></label>
              <input class="ev-input" name="contacto" id="f-email" type="email" value="{{ $beca->correo_contacto }}" />
              <span class="ev-field-err" id="e-email"></span>
            </div>
            <div class="ev-field">
              <label class="ev-label">Fecha Inscripcion <span class="ev-req">*</span></label>
              <input type="date" class="ev-input" name="fecha_inscripcion" id="f-fecha" value="{{ $beca->fecha_inscripcion }}">
            </div>
            <div class="ev-field">
              <label class="ev-label">Fecha Limite <span class="ev-req">*</span></label>
              <input type="date" class="ev-input" name="fecha_limite" id="f-fecha" value="{{ $beca->fecha_limite }}">
            </div>
             <div class="ev-field">
              <label class="ev-label">Resolucion <span class="ev-req">*</span></label>
              <input class="ev-input" name="resolucion" id="f-nombre" type="text" placeholder="Ingrese link resolucion" value="{{ $beca->link_resolucion }}" />
              <span class="ev-field-err" id="e-resolucion"></span>
            </div>
            <div class="ev-field">
              <label class="ev-label">Estado</label>
              <select class="ev-select" name="activo" id="f-estado">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
              </select>
            </div>
            <div class="ev-field">
              <label class="ev-label">Descripcion</label>
              <textarea class="ev-textarea" name="descripcion" rows="3" id="f-desc" placeholder="Ingrese una descripcion" value="{{ $beca->descripcion }}"> </textarea>
              <span class="ev-field-err" id="e-desc"></span>
            </div>

          </div>

        </div>

        <div class="ev-footer">
          <a type="button" class="adm-btn ghost" href="{{ route('becas.index') }}">Cancelar</a>
          <button type="submit" class="adm-btn primary" id="submitBtn">Guardar cambios</button>
        </div>
      </form>
    </main>
@endsection
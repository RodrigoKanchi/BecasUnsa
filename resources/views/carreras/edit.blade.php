@extends('layouts.app')
@section('content')

<main class="adm-content">
      <div class="ev-header">
        <div class="ev-header-left">
          <span class="ev-back" onclick="history.back()">‹ Volver a Carreras</span>
          <div>
            <div class="ev-title-row">
              <span class="ev-entity-icon">👤</span>
              <h1 class="ev-page-title">Editar Carrera</h1>
              <span class="ev-dirty" id="dirtyBadge" style="display:none">Sin guardar</span>
            </div>
            <p class="ev-subtitle">Modifique los campos y guarde para actualizar el registro.</p>
          </div>
        </div>
      </div>

      <div class="ev-alert success" id="alertOk" style="display:none">
        ✅ Carrera actualizado exitosamente.
        <button class="ev-alert-close" onclick="document.getElementById('alertOk').style.display='none'">✕</button>
      </div>

      <form id="editForm" method="POST" action="{{route( 'carreras.update' , [ 'id' => $carrera->id ] )}} " >
        @csrf
        @method('PUT')
        <div class="ev-form-layout">
          <div class="ev-form-main">

            <div class="ev-field">
              <label class="ev-label">Nombre <span class="ev-req">*</span></label>
              <input class="ev-input" name="nombre" id="f-nombre" type="text" value="{{ $carrera->nombre }}" />
              <span class="ev-field-err" id="e-nombre"></span>
            </div>

            <div class="ev-field">
              <label class="ev-label">Facultad <span class="ev-req">*</span></label>
              <select class="ev-select" name="facultad" id="f-facultad">
                <option value="" noselect>— Seleccionar —</option>
                @foreach($facultades as $facultad)
                  @if($carrera->facultad == $facultad->id)
                  <option value="{{ $facultad->id }}" selected>{{ $facultad->nombre }}</option>
                  @else
                    <option value="{{ $facultad->id }}">{{ $facultad->nombre }}</option>
                  @endif
                @endforeach
              </select>
              <span class="ev-field-err" id="e-facultad"></span>
            </div>

            <div class="ev-field">
              <label class="ev-label">Estado</label>
              <select class="ev-select" name="activo" id="f-estado" onchange="onStatusChange()">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
              </select>
            </div>

          </div>

        </div>

        <div class="ev-footer">
          <a type="button" class="adm-btn ghost" href="{{ route('carreras.index') }}">Cancelar</a>
          <button type="submit" class="adm-btn primary" id="submitBtn">Guardar cambios</button>
        </div>
      </form>
    </main>
@endsection
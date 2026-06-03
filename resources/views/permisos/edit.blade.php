@extends('layouts.app')
@section('content')

<main class="adm-content">
      <div class="ev-header">
        <div class="ev-header-left">
          <span class="ev-back" onclick="history.back()">‹ Volver a Roles</span>
          <div>
            <div class="ev-title-row">
              <span class="ev-entity-icon">👤</span>
              <h1 class="ev-page-title">Editar Permiso</h1>
              <span class="ev-dirty" id="dirtyBadge" style="display:none">Sin guardar</span>
            </div>
            <p class="ev-subtitle">Modifique los campos y guarde para actualizar el registro.</p>
          </div>
        </div>
      </div>

      <div class="ev-alert success" id="alertOk" style="display:none">
        ✅ Permiso actualizado exitosamente.
        <button class="ev-alert-close" onclick="document.getElementById('alertOk').style.display='none'">✕</button>
      </div>

      <form id="editForm" method="POST" action="{{route( 'permisos.update' , [ 'id' => $permiso->id ] )}}" >
        @csrf
        @method('PUT')
        <div class="ev-form-layout">
          <div class="ev-form-main">

            <div class="ev-field">
              <label class="ev-label">Nombre <span class="ev-req">*</span></label>
              <input class="ev-input" name="name" id="f-nombre" type="text" value="{{ $permiso->name }}" />
              <span class="ev-field-err" id="e-nombre"></span>
            </div>

          </div>

        </div>

        <div class="ev-footer">
          <a type="button" class="adm-btn ghost" href="{{ route('permisos.index') }}">Cancelar</a>
          <button type="submit" class="adm-btn primary" id="submitBtn">Guardar cambios</button>
        </div>
      </form>
    </main>
@endsection
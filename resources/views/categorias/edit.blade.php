@extends('layouts.app')
@section('content')

<main class="adm-content">
      <div class="ev-header">
        <div class="ev-header-left">
          <span class="ev-back" onclick="history.back()">‹ Volver a Categorias</span>
          <div>
            <div class="ev-title-row">
              <span class="ev-entity-icon">👤</span>
              <h1 class="ev-page-title">Editar Categorias</h1>
              <span class="ev-dirty" id="dirtyBadge" style="display:none">Sin guardar</span>
            </div>
            <p class="ev-subtitle">Modifique los campos y guarde para actualizar el registro.</p>
          </div>
        </div>
      </div>

      <div class="ev-alert success" id="alertOk" style="display:none">
        ✅ Categorias actualizado exitosamente.
        <button class="ev-alert-close" onclick="document.getElementById('alertOk').style.display='none'">✕</button>
      </div>

      <form id="editForm" method="POST" action="{{route( 'categorias.update' , [ 'id' => $categoria->id ] )}} " >
        @csrf
        @method('PUT')
        <div class="ev-form-layout">
          <div class="ev-form-main">

            <div class="ev-field">
              <label class="ev-label">Nombre <span class="ev-req">*</span></label>
              <input class="ev-input" name="nombre" id="f-nombre" type="text" value="{{ $categoria->nombre }}" />
              <span class="ev-field-err" id="e-nombre"></span>
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
          <a type="button" class="adm-btn ghost" href="{{ route('categorias.index') }}">Cancelar</a>
          <button type="submit" class="adm-btn primary" id="submitBtn">Guardar cambios</button>
        </div>
      </form>
    </main>
@endsection
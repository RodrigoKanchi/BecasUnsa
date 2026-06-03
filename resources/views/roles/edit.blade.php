@extends('layouts.app')
@section('content')

<main class="adm-content">
      <div class="ev-header">
        <div class="ev-header-left">
          <span class="ev-back" onclick="history.back()">‹ Volver a Roles</span>
          <div>
            <div class="ev-title-row">
              <span class="ev-entity-icon">👤</span>
              <h1 class="ev-page-title">Editar rol</h1>
              <span class="ev-dirty" id="dirtyBadge" style="display:none">Sin guardar</span>
            </div>
            <p class="ev-subtitle">Modifique los campos y guarde para actualizar el registro.</p>
          </div>
        </div>
      </div>

      <div class="ev-alert success" id="alertOk" style="display:none">
        ✅ Rol actualizado exitosamente.
        <button class="ev-alert-close" onclick="document.getElementById('alertOk').style.display='none'">✕</button>
      </div>

      <form id="editForm" method="POST" action="{{route( 'roles.update' , [ 'id' => $rol->id ] )}} " >
        @csrf
        @method('PUT')
        <div class="ev-form-layout">
          <div class="ev-form-main">

            <div class="ev-field">
              <label class="ev-label">Nombre <span class="ev-req">*</span></label>
              <input class="ev-input" name="name" id="f-nombre" type="text" value="{{ $rol->name }}" />
              <span class="ev-field-err" id="e-nombre"></span>
            </div>

            <div>
              <label class="ev-section">Permisos</label>
              <br>
              @foreach($permisos as $permiso)
              <label class="ev-label"> {{ $permiso->name }} </label>
              @if($rol->hasPermissionTo($permiso->name))
              <input name="permissions[]" id="f-nombre" type="checkbox" value="{{ $permiso->name }}" checked />
              @else
              <input name="permissions[]" id="f-nombre" type="checkbox" value="{{ $permiso->name }}"/>
              @endif
              <br>
              @endforeach
            </div>

          </div>



        </div>

        <div class="ev-footer">
          <a type="button" class="adm-btn ghost" href="{{ route('roles.index') }}">Cancelar</a>
          <button type="submit" class="adm-btn primary" id="submitBtn">Guardar cambios</button>
        </div>
      </form>
    </main>
@endsection
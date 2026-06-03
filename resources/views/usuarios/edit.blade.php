@extends('layouts.app')
@section('content')

<main class="adm-content">
      <div class="ev-header">
        <div class="ev-header-left">
          <span class="ev-back" href="{{ route('usuarios.index') }}">‹ Volver a Usuarios</span>
          <div>
            <div class="ev-title-row">
              <span class="ev-entity-icon">👤</span>
              <h1 class="ev-page-title">Editar Usuario</h1>
              <span class="ev-dirty" id="dirtyBadge" style="display:none">Sin guardar</span>
            </div>
            <p class="ev-subtitle">Modifique los campos y guarde para actualizar el registro.</p>
          </div>
        </div>
      </div>

      <div class="ev-alert success" id="alertOk" style="display:none">
        ✅ Usuario actualizado exitosamente.
        <button class="ev-alert-close" onclick="document.getElementById('alertOk').style.display='none'">✕</button>
      </div>

      <form id="editForm" method="POST" action="{{route('usuarios.update' , ['usuario' => $usuario->id ])}} " >
        @csrf
        @method('PUT')
        <div class="ev-form-layout">
          <div class="ev-form-main">

            <div class="ev-section">Información Personal</div>

            <div class="ev-field">
              <label class="ev-label">Nombre <span class="ev-req">*</span></label>
              <input class="ev-input" name="nombre" id="f-nombre" type="text" value="{{ $usuario->name }}" />
              <span class="ev-field-err" id="e-nombre"></span>
            </div>

            <div class="ev-field">
              <label class="ev-label">Correo institucional <span class="ev-req">*</span></label>
              <input class="ev-input" name="email" id="f-email" type="email" value="{{ $usuario->email }}" />
              <span class="ev-field-err" id="e-email"></span>
            </div>
            <div class="ev-field">
              <label class="ev-label">Nueva contraseña</label>
              <input class="ev-input" name="password" id="f-password" type="password" placeholder="Dejar vacío para no cambiar" />
              <span class="ev-hint">Solo complete este campo si desea cambiar la contraseña actual.</span>
            </div>
            <div class="ev-field">
              <label class="ev-label">Rol <span class="ev-req">*</span></label>
              <select class="ev-select" name="rol" id="f-rol" onchange="onRolChange()">
                @foreach($roles as $role)
                    <option value="{{ $role->name }}"
                    @selected($role->name == $usuario->role->first()->name)>
                    {{ $role->name }}
                    </option>
                @endforeach
              </select>
              <span class="ev-field-err" id="e-rol"></span>
            </div>
            <div class="ev-field">
              <label class="ev-label">Estado</label>
              <select class="ev-select" name="estado" id="f-estado" onchange="onStatusChange()">
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
              </select>
            </div>

          </div>

        </div>

        <div class="ev-footer">
          <a type="button" class="adm-btn ghost" href="{{ route('usuarios.index') }}">Cancelar</a>
          <button type="submit" class="adm-btn primary" id="submitBtn">Guardar cambios</button>
        </div>
      </form>
    </main>
@endsection
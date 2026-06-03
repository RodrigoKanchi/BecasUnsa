@extends('layouts.app')

@section('content')
<main class="adm-content">
      <div class="ev-header">
        <div class="ev-header-left">
          <span class="ev-back" href="{{ route('usuarios.index') }}">‹ Volver a Usuarios</span>
          <div>
            <div class="ev-title-row">
              <span class="ev-entity-icon">👤</span>
              <h1 class="ev-page-title">Crear Usuario</h1>
            </div>
            <p class="ev-subtitle">Complete los campos para registrar un nuevo usuario.</p>
          </div>
        </div>
      </div>

      <!-- Alert -->
      <div class="ev-alert success" id="alertOk" style="display:none">
        ✅ Usuario creado exitosamente.
        <button class="ev-alert-close" onclick="document.getElementById('alertOk').style.display='none'">✕</button>
      </div>

      <form id="createForm" method="POST" action="{{ route('usuarios.store') }}" novalidate>
        @csrf
        <div class="ev-form-layout">

          <!-- FORM MAIN -->
          <div class="ev-form-main">

            <div class="ev-section">Información Personal</div>

            <div class="ev-field">
              <label class="ev-label">Nombre <span class="ev-req">*</span></label>
              <input class="ev-input" name="name" id="f-nombre" type="text" placeholder="Ej: María García" oninput="clearErr('nombre')" />
              <span class="ev-field-err" id="e-nombre"></span>
            </div>
            <div class="ev-field">
              <label class="ev-label">Correo institucional <span class="ev-req">*</span></label>
              <input class="ev-input" name="email" id="f-email" type="email" placeholder="usuario@institucion.edu" oninput="clearErr('email')" />
              <span class="ev-field-err" id="e-email"></span>
            </div>
            <div class="ev-field">
              <label class="ev-label">Contraseña <span class="ev-req">*</span></label>
              <input class="ev-input" name="password" id="f-password" type="password" placeholder="Mínimo 8 caracteres" oninput="clearErr('password')" />
              <span class="ev-hint">Debe tener al menos 8 caracteres, una mayúscula y un número.</span>
              <span class="ev-field-err" id="e-password"></span>
            </div>
            <div class="ev-field">
              <label class="ev-label">Rol <span class="ev-req">*</span></label>
              <select class="ev-select" name="rol" id="f-rol" onchange="clearErr('rol')">
                <option value="" noselect>— Seleccionar —</option>
                @foreach($roles as $role)
                  <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
              </select>
              <span class="ev-field-err" id="e-rol"></span>
            </div>
            <div class="ev-field">
              <label class="ev-label">Estado</label>
              <select class="ev-select" name="activo" id="f-estado">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
              </select>
            </div>


        <!-- FOOTER -->
        <div class="ev-footer">
          <a type="button" class="adm-btn ghost" href="{{ route('usuarios.index') }}">Cancelar</a>
          <div class="ev-footer-right">
            <button type="submit" class="adm-btn primary" id="submitBtn">Crear Usuario</button>
          </div>
        </div>
      </form>
    </main>
@endsection
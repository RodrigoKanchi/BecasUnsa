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

      <form id="createForm" method="POST" action="{{ route('becas.store') }}">
        @csrf
        <div class="ev-form-layout">

          <!-- FORM MAIN -->
          <div class="ev-form-main">

            <div class="ev-section">Información Beca</div>

            <div class="ev-field">
              <label class="ev-label">Titulo <span class="ev-req">*</span></label>
              <input class="ev-input" name="titulo" id="f-nombre" type="text" placeholder="Ingrese un titulo" />
              <span class="ev-field-err" id="e-nombre"></span>
            </div>
            <div class="ev-field">
              <label class="ev-label">Categoria <span class="ev-req">*</span></label>
              <select class="ev-select" name="categoria_id" id="f-categoria" >
                <option value="" noselect>— Seleccionar —</option>
                @foreach($categorias as $categoria)
                  <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
              </select>
              <span class="ev-field-err" id="e-rol"></span>
            </div>
            <div class="ev-field">
              <label class="ev-label">Correo Contacto <span class="ev-req">*</span></label>
              <input class="ev-input" name="correo_contacto" id="f-email" type="email" placeholder="usuario@institucion.edu" />
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
              <input class="ev-input" name="link_resolucion" id="f-nombre" type="text" placeholder="Ingrese link resolucion" />
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
              <textarea class="ev-textarea" name="descripcion" rows="3" id="f-desc" placeholder="Ingrese una descripcion"> </textarea>
              <span class="ev-field-err" id="e-desc"></span>
            </div>

            <div>
              <div class="ev-section">Carreras</div>
              <div class="ev-checkbox-group">
                @foreach($carreras as $carrera)
                  <label class="ev-checkbox-label">
                    <input type="checkbox" name="carreras[]" value="{{ $carrera->id }}" />
                    {{ $carrera->nombre }}
                  </label>
                @endforeach
              </div>
            </div>
            <br>
            <div>
              <div class="ev-section">Facultades</div>
              <div class="ev-checkbox-group">
                @foreach($facultades as $facultad)
                  <label class="ev-checkbox-label">
                    <input type="checkbox" name="facultades[]" value="{{ $facultad->id }}" />
                    {{ $facultad->nombre }}
                  </label>
                @endforeach
              </div>
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
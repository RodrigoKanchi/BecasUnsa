
<div class="adm-card">
          <div class="adm-card-toolbar">
            <input class="adm-search" id="userSearch" placeholder="Buscar carrera..." />
          </div>

          <table class="adm-table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Activo</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="userTableBody">
              @foreach($carreras as $carrera)
              <tr>
                <td class="adm-table-id">{{ $carrera->id }}</td>
                <td>
                  <div class="adm-table-user">
                    {{ $carrera->nombre }}
                  </div>
                </td>
                <td><span class="adm-status">{{ $carrera->activo ? 'Si' : 'No' }}</span></td>
                <td>
                  <div class="adm-actions">
                    <a class="adm-action-btn" title="Editar" href="{{ route('carreras.edit', $carrera->id) }}">✏️</a>
                    <a class="adm-action-btn" title="Ver" href="{{ route('carreras.show', $carrera->id) }}">👁️</a>
                    <a class="adm-action-btn danger" title="Eliminar" href="{{ route('carreras.destroy', $carrera->id) }}" onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar este carrera?')) { document.getElementById('delete-form-{{ $carrera->id }}').submit(); }">🗑️</a>
                  </div>
                </td>
              </tr>
              <tr>
              @endforeach
            </tbody>
          </table>
    </div>

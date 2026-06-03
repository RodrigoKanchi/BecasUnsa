
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
                    <form id="delete-form-{{ $carrera->id }}" action="{{ route('carreras.destroy', $carrera->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <a type="submit" class="adm-action-btn danger" title="Eliminar" onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar esta carrera?')) { document.getElementById('delete-form-{{ $carrera->id }}').submit(); }">🗑️</a>
                    </form>
                  </div>
                </td>
              </tr>
              <tr>
              @endforeach
            </tbody>
          </table>
    </div>

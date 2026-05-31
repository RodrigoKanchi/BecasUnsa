
<div class="adm-card">
          <div class="adm-card-toolbar">
            <input class="adm-search" id="userSearch" placeholder="Buscar permiso..." />
          </div>

          <table class="adm-table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="userTableBody">
              @foreach($permisos as $permiso)
              <tr>
                <td class="adm-table-id">{{ $permiso->id }}</td>
                <td>
                  <div class="adm-table-user">
                    {{ $permiso->name }}
                  </div>
                </td>
                <td>
                  <div class="adm-actions">
                    <a class="adm-action-btn" title="Editar" href="{{ route('permisos.edit', $permiso->id) }}">✏️</a>
                    <a class="adm-action-btn" title="Ver" href="{{ route('permisos.show', $permiso->id) }}">👁️</a>
                    <a class="adm-action-btn danger" title="Eliminar" href="{{ route('permisos.destroy', $permiso->id) }}" onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar este permiso?')) { document.getElementById('delete-form-{{ $permiso->id }}').submit(); }">🗑️</a>
                  </div>
                </td>
              </tr>
              <tr>
              @endforeach
            </tbody>
          </table>
    </div>

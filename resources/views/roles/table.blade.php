
<div class="adm-card">
          <div class="adm-card-toolbar">
            <input class="adm-search" id="userSearch" placeholder="Buscar rol..." oninput="filterUsers()" />
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
              @foreach($roles as $rol)
              <tr>
                <td class="adm-table-id">{{ $rol->id }}</td>
                <td>
                  <div class="adm-table-user">
                    {{ $rol->name }}
                  </div>
                </td>
                <td>
                  <div class="adm-actions">
                    <a class="adm-action-btn" title="Editar" href="{{ route('roles.edit', $rol->id) }}">✏️</a>
                    <a class="adm-action-btn" title="Ver" href="{{ route('roles.show', $rol->id) }}">👁️</a>
                    <a class="adm-action-btn danger" title="Eliminar" href="{{ route('roles.destroy', $rol->id) }}" onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar este rol?')) { document.getElementById('delete-form-{{ $rol->id }}').submit(); }">🗑️</a>
                  </div>
                </td>
              </tr>
              <tr>
              @endforeach
            </tbody>
          </table>
    </div>

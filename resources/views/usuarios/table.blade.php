
<div class="adm-card">
          <div class="adm-card-toolbar">
            <input class="adm-search" id="userSearch" placeholder="Buscar usuario..." oninput="filterUsers()" />
            <div class="adm-toolbar-right">
              <button class="adm-btn ghost">Exportar</button>
              <button class="adm-btn ghost">Filtrar</button>
            </div>
          </div>

          <table class="adm-table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="userTableBody">
              @foreach($usuarios as $usuario)
              <tr>
                <td class="adm-table-id">{{ $usuario->id }}</td>
                <td>
                  <div class="adm-table-user">
                    {{ $usuario->name }}
                  </div>
                </td>
                <td class="adm-table-email">{{ $usuario->email }}</td>
                <td><span class="adm-chip"> @foreach($usuario->roles as $role) {{ $role->name }} @endforeach </span></td>
                <td><span class="adm-status">{{ $usuario->activo ? 'Si' : 'No' }}</span></td>
                <td>
                  <div class="adm-actions">
                    <a class="adm-action-btn" title="Editar" href="{{ route('usuarios.edit', $usuario->id) }}">✏️</a>
                    <a class="adm-action-btn" title="Ver" href="{{ route('usuarios.show', $usuario->id) }}">👁️</a>
                    <a class="adm-action-btn danger" title="Eliminar" href="{{ route('usuarios.destroy', $usuario->id) }}" onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar este usuario?')) { document.getElementById('delete-form-{{ $usuario->id }}').submit(); }">🗑️</a>
                  </div>
                </td>
              </tr>
              <tr>
              @endforeach
            </tbody>
          </table>
    </div>

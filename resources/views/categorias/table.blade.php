
<div class="adm-card">
          <div class="adm-card-toolbar">
            <input class="adm-search" id="userSearch" placeholder="Buscar categoria..." />
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
              @foreach($categorias as $categoria)
              <tr>
                <td class="adm-table-id">{{ $categoria->id }}</td>
                <td>
                  <div class="adm-table-user">
                    {{ $categoria->nombre }}
                  </div>
                </td>
                <td><span class="adm-status">{{ $categoria->activo ? 'Si' : 'No' }}</span></td>
                <td>
                  <div class="adm-actions">
                    <a class="adm-action-btn" title="Editar" href="{{ route('categorias.edit', $categoria->id) }}">✏️</a>
                    <a class="adm-action-btn" title="Ver" href="{{ route('categorias.show', $categoria->id) }}">👁️</a>
                    <form id="delete-form-{{ $categoria->id }}" action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <a type="submit" class="adm-action-btn danger" title="Eliminar" onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar esta categoria?')) { document.getElementById('delete-form-{{ $categoria->id }}').submit(); }">🗑️</a>
                    </form>
                  </div>
                </td>
              </tr>
              <tr>
              @endforeach
            </tbody>
          </table>
    </div>

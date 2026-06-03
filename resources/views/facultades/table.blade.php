
<div class="adm-card">
          <div class="adm-card-toolbar">
            <input class="adm-search" id="userSearch" placeholder="Buscar facultad..." />
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
              @foreach($facultades as $facultad)
              <tr>
                <td class="adm-table-id">{{ $facultad->id }}</td>
                <td>
                  <div class="adm-table-user">
                    {{ $facultad->nombre }}
                  </div>
                </td>
                <td><span class="adm-status">{{ $facultad->activo ? 'Si' : 'No' }}</span></td>
                <td>
                  <div class="adm-actions">
                    <a class="adm-action-btn" title="Editar" href="{{ route('facultades.edit', $facultad->id) }}">✏️</a>
                    <a class="adm-action-btn" title="Ver" href="{{ route('facultades.show', $facultad->id) }}">👁️</a>
                    <form id="delete-form-{{ $facultad->id }}" action="{{ route('facultades.destroy', $facultad->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <a type="submit" class="adm-action-btn danger" title="Eliminar" onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar esta facultad?')) { document.getElementById('delete-form-{{ $facultad->id }}').submit(); }">🗑️</a>
                    </form>
                  </div>
                </td>
              </tr>
              <tr>
              @endforeach
            </tbody>
          </table>
    </div>

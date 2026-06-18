
<div class="adm-card">
          <div class="adm-card-toolbar">
            <form action="{{ route('becas.buscar') }}" method="GET">
              @csrf
            <input class="adm-search" name="nombre" id="userSearch" placeholder="Buscar beca..." />
            <input class="adm-search" name="facultad" id="facultadSearch" placeholder="Buscar por facultad..." />
            <input class="adm-search" name="carrera" id="carreraSearch" placeholder="Buscar por carrera..." />
            <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
            <div class="adm-toolbar-right">
              <button class="adm-btn ghost">Exportar</button>
              <button class="adm-btn ghost">Filtrar</button>
            </div>
          </div>

          <table class="adm-table">
            <thead>
              <tr>
                <th>#</th>
                <th>Titulo</th>
                <th>Contacto</th>
                <th>Fecha Inscripcion</th>
                <th>Fin Inscripcion</th>
                <th>Activo</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="userTableBody">
              @foreach($becas as $beca)
              <tr>
                <td class="adm-table-id">{{ $beca->id }}</td>
                <td>
                  <div class="adm-table-user">
                    {{ $beca->titulo }}
                  </div>
                </td>
                <td class="adm-table-email">{{ $beca->correo_contacto }}</td>
                <td><span class="adm-chip"> {{ $beca->fecha_inscripcion->format('d/m/Y') }}  </span></td>
                <td><span class="adm-chip"> {{ $beca->fecha_limite->format('d/m/Y') }}  </span></td>
                <td><span class="adm-status">{{ $beca->activo ? 'Si' : 'No' }}</span></td>
                <td>
                  <div class="adm-actions">
                    <a class="adm-action-btn" title="Editar" href="{{ route('becas.edit', $beca->id) }}">✏️</a>
                    <a class="adm-action-btn" title="Ver" href="{{ route('becas.show', $beca->id) }}">👁️</a>
                    <form id="delete-form-{{ $beca->id }}" action="{{ route('becas.destroy', $beca->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <a type="submit" class="adm-action-btn danger" title="Eliminar" onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar esta beca?')) { document.getElementById('delete-form-{{ $beca->id }}').submit(); }">🗑️</a>
                    </form>
                  </div>
                </td>
              </tr>
              <tr>
              @endforeach
            </tbody>
          </table>
    </div>

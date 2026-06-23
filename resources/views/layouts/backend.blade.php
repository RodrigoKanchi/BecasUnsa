<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Becas Unsa — Plataforma Institucional</title>
  <script src="https://kit.fontawesome.com/0763a21c1e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="admin.css" />
</head>
<body>

<div class="adm-root">

  <!-- ===================== SIDEBAR ===================== -->
  <aside class="adm-sidebar" id="sidebar">

    <div class="adm-sidebar-logo">
      <div class="adm-logo-icon"></div>
      <div class="adm-logo-text">
        <span class="adm-logo-title">Becas Unsa</span>
        <span class="adm-logo-sub">Plataforma Institucional</span>
      </div>
    </div>

    <nav class="adm-nav">

      <button class="adm-nav-item" onclick="navigate('dashboard')">
        <span class="adm-nav-icon">⊞</span>
        <span class="adm-nav-label">Dashboard</span>
      </button>

      <!-- Grupo: Gestión de Acceso -->
      <div class="adm-nav-group">
        <button class="adm-nav-item parent open-group" id="grupo-acceso" onclick="toggleGroup('acceso')">
          <span class="adm-nav-icon">🔒</span>
          <span class="adm-nav-label">Gestión de Acceso</span>
          <span class="adm-nav-chevron">▸</span>
        </button>
        <div class="adm-nav-children open" id="children-acceso">
          <button class="adm-nav-item child active" id="nav-usuarios" onclick="navigate('usuarios')">
            <span class="adm-nav-icon">👤</span>
            <span class="adm-nav-label">Usuarios</span>
          </button>
          <button class="adm-nav-item child" id="nav-roles" onclick="navigate('roles')">
            <span class="adm-nav-icon">🏷️</span>
            <span class="adm-nav-label">Roles</span>
          </button>
          <button class="adm-nav-item child" id="nav-permisos" onclick="navigate('permisos')">
            <span class="adm-nav-icon">🔑</span>
            <span class="adm-nav-label">Permisos</span>
          </button>
        </div>
      </div>

      <button class="adm-nav-item" id="nav-reportes" onclick="navigate('reportes')">
        <span class="adm-nav-icon">📊</span>
        <span class="adm-nav-label">Reportes</span>
      </button>

      <button class="adm-nav-item" id="nav-configuracion" onclick="navigate('configuracion')">
        <span class="adm-nav-icon">⚙️</span>
        <span class="adm-nav-label">Configuración</span>
      </button>

    </nav>

    <button class="adm-sidebar-toggle" id="sidebarToggle" onclick="toggleSidebar()">◀</button>
  </aside>

  <!-- ===================== MAIN ===================== -->
  <div class="adm-main">

    <!-- TOPBAR -->
    <header class="adm-topbar">
      <div class="adm-breadcrumb" id="breadcrumb">
        <span class="adm-breadcrumb-link">Gestión de Acceso</span>
        <span class="adm-breadcrumb-sep">/</span>
        <span class="adm-breadcrumb-current">Usuarios</span>
      </div>

      <div class="adm-topbar-actions">
        <button class="adm-topbar-icon-btn" title="Notificaciones">
          🔔
          <span class="adm-badge">3</span>
        </button>

        <!-- User menu -->
        <div class="adm-user-menu-wrapper">
          <button class="adm-user-btn" id="userBtn" onclick="toggleUserMenu()">
            <div class="adm-avatar">JD</div>
            <div class="adm-user-info">
              <span class="adm-user-name">Juan Díaz</span>
              <span class="adm-user-role">Administrador</span>
            </div>
            <span class="adm-user-chevron" id="userChevron">▼</span>
          </button>

          <div class="adm-user-dropdown" id="userDropdown">
            <div class="adm-user-dropdown-header">
              <div class="adm-avatar lg">JD</div>
              <div>
                <div class="adm-user-dropdown-name">Juan Díaz</div>
                <div class="adm-user-dropdown-email">j.diaz@institucion.edu</div>
              </div>
            </div>
            <div class="adm-user-dropdown-divider"></div>
            <button class="adm-user-dropdown-item" onclick="closeUserMenu()">
              <span>👤</span> Editar Perfil
            </button>
            <button class="adm-user-dropdown-item" onclick="closeUserMenu()">
              <span>🔒</span> Cambiar Contraseña
            </button>
            <button class="adm-user-dropdown-item" onclick="closeUserMenu()">
              <span>⚙️</span> Preferencias
            </button>
            <div class="adm-user-dropdown-divider"></div>
            <button class="adm-user-dropdown-item danger" onclick="closeUserMenu()">
              <span>↩</span> Cerrar Sesión
            </button>
          </div>
        </div>
      </div>
    </header>

    <!-- CONTENT -->
    <main class="adm-content">

      <!-- ==================== USUARIOS ==================== -->
      <section class="adm-section active" id="section-usuarios">
        <div class="adm-page-header">
          <div>
            <h1 class="adm-page-title">Usuarios</h1>
            <p class="adm-page-subtitle">Gestione los usuarios del sistema institucional</p>
          </div>
          <button class="adm-btn primary">+ Nuevo Usuario</button>
        </div>

        <div class="adm-stats-row">
          <div class="adm-stat-card">
            <div class="adm-stat-value">24</div>
            <div class="adm-stat-label">Total Usuarios</div>
          </div>
          <div class="adm-stat-card green">
            <div class="adm-stat-value">20</div>
            <div class="adm-stat-label">Activos</div>
          </div>
          <div class="adm-stat-card gray">
            <div class="adm-stat-value">4</div>
            <div class="adm-stat-label">Inactivos</div>
          </div>
          <div class="adm-stat-card accent">
            <div class="adm-stat-value">3</div>
            <div class="adm-stat-label">Administradores</div>
          </div>
        </div>

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
              <tr>
                <td class="adm-table-id">1</td>
                <td>
                  <div class="adm-table-user">
                    <div class="adm-avatar sm">MG</div>
                    María García
                  </div>
                </td>
                <td class="adm-table-email">m.garcia@institucion.edu</td>
                <td><span class="adm-chip">Administrador</span></td>
                <td><span class="adm-status active">Activo</span></td>
                <td>
                  <div class="adm-actions">
                    <button class="adm-action-btn" title="Editar">✏️</button>
                    <button class="adm-action-btn" title="Ver">👁️</button>
                    <button class="adm-action-btn danger" title="Eliminar">🗑️</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="adm-table-id">2</td>
                <td>
                  <div class="adm-table-user">
                    <div class="adm-avatar sm">CL</div>
                    Carlos López
                  </div>
                </td>
                <td class="adm-table-email">c.lopez@institucion.edu</td>
                <td><span class="adm-chip">Editor</span></td>
                <td><span class="adm-status active">Activo</span></td>
                <td>
                  <div class="adm-actions">
                    <button class="adm-action-btn" title="Editar">✏️</button>
                    <button class="adm-action-btn" title="Ver">👁️</button>
                    <button class="adm-action-btn danger" title="Eliminar">🗑️</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="adm-table-id">3</td>
                <td>
                  <div class="adm-table-user">
                    <div class="adm-avatar sm">AM</div>
                    Ana Martínez
                  </div>
                </td>
                <td class="adm-table-email">a.martinez@institucion.edu</td>
                <td><span class="adm-chip">Visualizador</span></td>
                <td><span class="adm-status inactive">Inactivo</span></td>
                <td>
                  <div class="adm-actions">
                    <button class="adm-action-btn" title="Editar">✏️</button>
                    <button class="adm-action-btn" title="Ver">👁️</button>
                    <button class="adm-action-btn danger" title="Eliminar">🗑️</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="adm-table-id">4</td>
                <td>
                  <div class="adm-table-user">
                    <div class="adm-avatar sm">LR</div>
                    Luis Rodríguez
                  </div>
                </td>
                <td class="adm-table-email">l.rodriguez@institucion.edu</td>
                <td><span class="adm-chip">Editor</span></td>
                <td><span class="adm-status active">Activo</span></td>
                <td>
                  <div class="adm-actions">
                    <button class="adm-action-btn" title="Editar">✏️</button>
                    <button class="adm-action-btn" title="Ver">👁️</button>
                    <button class="adm-action-btn danger" title="Eliminar">🗑️</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>

          <div class="adm-pagination">
            <span class="adm-pagination-info">Mostrando 4 de 24 registros</span>
            <div class="adm-pagination-controls">
              <button class="adm-page-btn" disabled>‹</button>
              <button class="adm-page-btn active">1</button>
              <button class="adm-page-btn">2</button>
              <button class="adm-page-btn">3</button>
              <button class="adm-page-btn">›</button>
            </div>
          </div>
        </div>
      </section>

      <!-- ==================== ROLES ==================== -->
      <section class="adm-section" id="section-roles">
        <div class="adm-page-header">
          <div>
            <h1 class="adm-page-title">Roles</h1>
            <p class="adm-page-subtitle">Defina y administre los roles del sistema</p>
          </div>
          <button class="adm-btn primary">+ Nuevo Rol</button>
        </div>

        <div class="adm-roles-grid">
          <div class="adm-role-card">
            <div class="adm-role-icon">🏷️</div>
            <h3 class="adm-role-name">Administrador</h3>
            <p class="adm-role-desc">Acceso total al sistema</p>
            <div class="adm-role-stats">
              <div class="adm-role-stat">
                <span class="adm-role-stat-val">24</span>
                <span class="adm-role-stat-lbl">Permisos</span>
              </div>
              <div class="adm-role-divider"></div>
              <div class="adm-role-stat">
                <span class="adm-role-stat-val">3</span>
                <span class="adm-role-stat-lbl">Usuarios</span>
              </div>
            </div>
            <div class="adm-role-actions">
              <button class="adm-btn sm outline">Editar</button>
              <button class="adm-btn sm ghost">Permisos</button>
            </div>
          </div>
          <div class="adm-role-card">
            <div class="adm-role-icon">🏷️</div>
            <h3 class="adm-role-name">Editor</h3>
            <p class="adm-role-desc">Puede crear y editar contenido</p>
            <div class="adm-role-stats">
              <div class="adm-role-stat">
                <span class="adm-role-stat-val">12</span>
                <span class="adm-role-stat-lbl">Permisos</span>
              </div>
              <div class="adm-role-divider"></div>
              <div class="adm-role-stat">
                <span class="adm-role-stat-val">8</span>
                <span class="adm-role-stat-lbl">Usuarios</span>
              </div>
            </div>
            <div class="adm-role-actions">
              <button class="adm-btn sm outline">Editar</button>
              <button class="adm-btn sm ghost">Permisos</button>
            </div>
          </div>
          <div class="adm-role-card">
            <div class="adm-role-icon">🏷️</div>
            <h3 class="adm-role-name">Visualizador</h3>
            <p class="adm-role-desc">Solo lectura</p>
            <div class="adm-role-stats">
              <div class="adm-role-stat">
                <span class="adm-role-stat-val">5</span>
                <span class="adm-role-stat-lbl">Permisos</span>
              </div>
              <div class="adm-role-divider"></div>
              <div class="adm-role-stat">
                <span class="adm-role-stat-val">15</span>
                <span class="adm-role-stat-lbl">Usuarios</span>
              </div>
            </div>
            <div class="adm-role-actions">
              <button class="adm-btn sm outline">Editar</button>
              <button class="adm-btn sm ghost">Permisos</button>
            </div>
          </div>
          <div class="adm-role-card">
            <div class="adm-role-icon">🏷️</div>
            <h3 class="adm-role-name">Supervisor</h3>
            <p class="adm-role-desc">Supervisión de módulos asignados</p>
            <div class="adm-role-stats">
              <div class="adm-role-stat">
                <span class="adm-role-stat-val">18</span>
                <span class="adm-role-stat-lbl">Permisos</span>
              </div>
              <div class="adm-role-divider"></div>
              <div class="adm-role-stat">
                <span class="adm-role-stat-val">4</span>
                <span class="adm-role-stat-lbl">Usuarios</span>
              </div>
            </div>
            <div class="adm-role-actions">
              <button class="adm-btn sm outline">Editar</button>
              <button class="adm-btn sm ghost">Permisos</button>
            </div>
          </div>
        </div>
      </section>

      <!-- ==================== PERMISOS ==================== -->
      <section class="adm-section" id="section-permisos">
        <div class="adm-page-header">
          <div>
            <h1 class="adm-page-title">Permisos</h1>
            <p class="adm-page-subtitle">Configure los permisos disponibles por módulo</p>
          </div>
          <button class="adm-btn primary">+ Nuevo Permiso</button>
        </div>

        <div class="adm-card">
          <div class="adm-card-toolbar">
            <div class="adm-filter-tabs">
              <button class="adm-filter-tab active" onclick="filterTab(this)">Todos</button>
              <button class="adm-filter-tab" onclick="filterTab(this)">Usuarios</button>
              <button class="adm-filter-tab" onclick="filterTab(this)">Roles</button>
              <button class="adm-filter-tab" onclick="filterTab(this)">Reportes</button>
            </div>
          </div>

          <table class="adm-table">
            <thead>
              <tr>
                <th>#</th>
                <th>Módulo</th>
                <th>Acción</th>
                <th>Código</th>
                <th>Estado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="adm-table-id">1</td>
                <td><span class="adm-chip blue">Usuarios</span></td>
                <td>Crear</td>
                <td><code class="adm-code">USR_CREATE</code></td>
                <td>
                  <label class="adm-toggle">
                    <input type="checkbox" checked />
                    <span class="adm-toggle-slider"></span>
                  </label>
                </td>
                <td>
                  <div class="adm-actions">
                    <button class="adm-action-btn" title="Editar">✏️</button>
                    <button class="adm-action-btn danger" title="Eliminar">🗑️</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="adm-table-id">2</td>
                <td><span class="adm-chip blue">Usuarios</span></td>
                <td>Editar</td>
                <td><code class="adm-code">USR_EDIT</code></td>
                <td>
                  <label class="adm-toggle">
                    <input type="checkbox" checked />
                    <span class="adm-toggle-slider"></span>
                  </label>
                </td>
                <td>
                  <div class="adm-actions">
                    <button class="adm-action-btn" title="Editar">✏️</button>
                    <button class="adm-action-btn danger" title="Eliminar">🗑️</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="adm-table-id">3</td>
                <td><span class="adm-chip blue">Usuarios</span></td>
                <td>Eliminar</td>
                <td><code class="adm-code">USR_DELETE</code></td>
                <td>
                  <label class="adm-toggle">
                    <input type="checkbox" />
                    <span class="adm-toggle-slider"></span>
                  </label>
                </td>
                <td>
                  <div class="adm-actions">
                    <button class="adm-action-btn" title="Editar">✏️</button>
                    <button class="adm-action-btn danger" title="Eliminar">🗑️</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="adm-table-id">4</td>
                <td><span class="adm-chip blue">Roles</span></td>
                <td>Crear</td>
                <td><code class="adm-code">ROL_CREATE</code></td>
                <td>
                  <label class="adm-toggle">
                    <input type="checkbox" checked />
                    <span class="adm-toggle-slider"></span>
                  </label>
                </td>
                <td>
                  <div class="adm-actions">
                    <button class="adm-action-btn" title="Editar">✏️</button>
                    <button class="adm-action-btn danger" title="Eliminar">🗑️</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="adm-table-id">5</td>
                <td><span class="adm-chip blue">Roles</span></td>
                <td>Editar</td>
                <td><code class="adm-code">ROL_EDIT</code></td>
                <td>
                  <label class="adm-toggle">
                    <input type="checkbox" />
                    <span class="adm-toggle-slider"></span>
                  </label>
                </td>
                <td>
                  <div class="adm-actions">
                    <button class="adm-action-btn" title="Editar">✏️</button>
                    <button class="adm-action-btn danger" title="Eliminar">🗑️</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="adm-table-id">6</td>
                <td><span class="adm-chip blue">Reportes</span></td>
                <td>Visualizar</td>
                <td><code class="adm-code">REP_VIEW</code></td>
                <td>
                  <label class="adm-toggle">
                    <input type="checkbox" checked />
                    <span class="adm-toggle-slider"></span>
                  </label>
                </td>
                <td>
                  <div class="adm-actions">
                    <button class="adm-action-btn" title="Editar">✏️</button>
                    <button class="adm-action-btn danger" title="Eliminar">🗑️</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <!-- ==================== PLACEHOLDER ==================== -->
      <section class="adm-section" id="section-dashboard">
        <div class="adm-placeholder">
          <div class="adm-placeholder-icon">⊞</div>
          <h2>Dashboard</h2>
          <p>Esta sección estará disponible próximamente.</p>
        </div>
      </section>

      <section class="adm-section" id="section-reportes">
        <div class="adm-placeholder">
          <div class="adm-placeholder-icon">📊</div>
          <h2>Reportes</h2>
          <p>Esta sección estará disponible próximamente.</p>
        </div>
      </section>

      <section class="adm-section" id="section-configuracion">
        <div class="adm-placeholder">
          <div class="adm-placeholder-icon">⚙️</div>
          <h2>Configuración</h2>
          <p>Esta sección estará disponible próximamente.</p>
        </div>
      </section>

    </main>
  </div>
</div>

<!-- ===================== JAVASCRIPT ===================== -->
<script>
  /* ── Breadcrumbs por sección ── */
  const breadcrumbs = {
    dashboard:     [{ text: 'Dashboard' }],
    usuarios:      [{ text: 'Gestión de Acceso', link: true }, { text: 'Usuarios' }],
    roles:         [{ text: 'Gestión de Acceso', link: true }, { text: 'Roles' }],
    permisos:      [{ text: 'Gestión de Acceso', link: true }, { text: 'Permisos' }],
    reportes:      [{ text: 'Reportes' }],
    configuracion: [{ text: 'Configuración' }],
  };

  /* ── Navegación ── */
  function navigate(section) {
    // Ocultar todas las secciones
    document.querySelectorAll('.adm-section').forEach(el => el.classList.remove('active'));
    document.getElementById('section-' + section).classList.add('active');

    // Quitar .active de todos los nav-items
    document.querySelectorAll('.adm-nav-item').forEach(el => el.classList.remove('active'));

    // Activar el ítem correspondiente
    const navEl = document.getElementById('nav-' + section);
    if (navEl) navEl.classList.add('active');

    // Breadcrumb
    const crumbs = breadcrumbs[section] || [{ text: section }];
    const bc = document.getElementById('breadcrumb');
    bc.innerHTML = crumbs.map((c, i) => {
      const isLast = i === crumbs.length - 1;
      const sep = i > 0 ? '<span class="adm-breadcrumb-sep">/</span>' : '';
      const cls = isLast ? 'adm-breadcrumb-current' : 'adm-breadcrumb-link';
      return sep + `<span class="${cls}">${c.text}</span>`;
    }).join('');

    // Cerrar el menú de usuario si está abierto
    closeUserMenu();
  }

  /* ── Toggle grupo de menú ── */
  function toggleGroup(id) {
    const children = document.getElementById('children-' + id);
    const btn      = document.getElementById('grupo-' + id);
    const isOpen   = children.classList.contains('open');
    children.classList.toggle('open', !isOpen);
    btn.classList.toggle('open-group', !isOpen);
  }

  /* ── Sidebar collapse ── */
  let sidebarCollapsed = false;

  function toggleSidebar() {
    sidebarCollapsed = !sidebarCollapsed;
    const sidebar = document.getElementById('sidebar');
    const toggle  = document.getElementById('sidebarToggle');
    sidebar.classList.toggle('collapsed', sidebarCollapsed);
    toggle.textContent = sidebarCollapsed ? '▶' : '◀';
  }

  /* ── User menu ── */
  function toggleUserMenu() {
    const btn      = document.getElementById('userBtn');
    const dropdown = document.getElementById('userDropdown');
    const chevron  = document.getElementById('userChevron');
    const isOpen   = dropdown.classList.contains('open');
    dropdown.classList.toggle('open', !isOpen);
    btn.classList.toggle('open', !isOpen);
    chevron.textContent = isOpen ? '▼' : '▲';
  }

  function closeUserMenu() {
    document.getElementById('userDropdown').classList.remove('open');
    document.getElementById('userBtn').classList.remove('open');
    document.getElementById('userChevron').textContent = '▼';
  }

  // Cerrar menú al hacer clic fuera
  document.addEventListener('click', function(e) {
    const wrapper = document.querySelector('.adm-user-menu-wrapper');
    if (!wrapper.contains(e.target)) closeUserMenu();
  });

  /* ── Búsqueda en tabla de usuarios ── */
  function filterUsers() {
    const q     = document.getElementById('userSearch').value.toLowerCase();
    const rows  = document.querySelectorAll('#userTableBody tr');
    rows.forEach(row => {
      row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
    });
  }

  /* ── Filtros de permisos ── */
  function filterTab(el) {
    document.querySelectorAll('.adm-filter-tab').forEach(t => t.classList.remove('active'));
    el.classList.add('active');
  }
</script>

</body>
</html>

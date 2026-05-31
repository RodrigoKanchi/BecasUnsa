<aside class="adm-sidebar" id="sidebar">

    <div class="adm-sidebar-logo">
      <div class="adm-logo-icon">I</div>
      <div class="adm-logo-text">
        <span class="adm-logo-title">SistemaGov</span>
        <span class="adm-logo-sub">Plataforma Institucional</span>
      </div>
    </div>

    <nav class="adm-nav">

      <a class="adm-nav-item" href="{{route('home')}}">
        <span class="adm-nav-label">Dashboard</span>
      </a>

      <!-- Grupo: Gestión de Acceso -->
      <a class="adm-nav-item" id="nav-usuarios" href="{{route('usuarios.index')}}">
        <span class="adm-nav-label">Usuarios</span>
      </a>
      <a class="adm-nav-item" id="nav-roles" href="{{route('roles.index')}}">
        <span class="adm-nav-label">Roles</span>
      </a>
     <a class="adm-nav-item" id="nav-permisos" href="{{route('permisos.index')}}">
        <span class="adm-nav-label">Permisos</span>
      </a>


      <a class="adm-nav-item" id="nav-becas" href="{{route('becas.index')}}">
        <span class="adm-nav-label">Becas</span>
      </a>
      
      <a class="adm-nav-item" id="nav-facultades" href="{{route('facultades.index')}}">
        <span class="adm-nav-label">Facultades</span>
      </a>

      <a class="adm-nav-item" id="nav-carreras" href="{{route('carreras.index')}}">
        <span class="adm-nav-label">Carreras</span>
      </a>

      <a class="adm-nav-item" id="nav-categorias" href="{{route('categorias.index')}}">
        <span class="adm-nav-label">Categorias</span>
      </a>

      

    </nav>

</aside>
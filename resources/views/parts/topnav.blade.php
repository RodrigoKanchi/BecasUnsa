<header class="adm-topbar">
      <div class="adm-breadcrumb" id="breadcrumb">
        <span class="adm-breadcrumb-link">Gestión de Acceso</span>
        <span class="adm-breadcrumb-sep">/</span>
        <span class="adm-breadcrumb-current">Usuarios</span>
      </div>

      <div class="adm-topbar-actions">

        <!-- User menu -->
        <div class="adm-user-menu-wrapper">
          <button class="adm-user-btn dropdown-toggle" id="userBtn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="adm-user-info">
              <span class="adm-user-name">{{Auth::user()->name}}</span>
              <span class="adm-user-role"> @foreach(Auth::user()->roles as $role) {{ $role->name }} @endforeach </span>
            </div>
          </button>
          <ul class="adm-user-dropdown dropdown-menu"  id="userDropdown" style="padding: 5%">
            <div class="adm-user-dropdown-header">
              <div>
                <div class="adm-user-dropdown-name">{{Auth::user()->name}}</div>
                <div class="adm-user-dropdown-email">{{Auth::user()->email}}</div>
              </div>
            </div>
            <div class="adm-user-dropdown-divider"></div>
            <li class="adm-user-dropdown-item dropdown-item" >
                 Editar Perfil
            </li>
            <li class="adm-user-dropdown-item dropdown-item" >
               Cambiar Contraseña
            </li>
            <li class="adm-user-dropdown-item dropdown-item" >
               Preferencias
            </li>
            <div class="adm-user-dropdown-divider"></div>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
            <button type="submit" class="adm-user-dropdown-item danger dropdown-item" >
               Cerrar Sesión
            </button>
            </form>
          </ul>
        </div>
      </div>
    </header>
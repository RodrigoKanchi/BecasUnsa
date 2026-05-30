<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Iniciar Sesión — Becas de Formacion UNSa</title>
    @vite('resources/js/login.js')

</head>
<body>

<div class="login-root">

  <!-- ==================== PANEL IZQUIERDO ==================== -->
  <div class="login-left">
    <div class="login-left-content">

      <div class="login-brand-icon">
        Icono UNSa
      </div>
      <h1 class="login-brand-name">Becas de Formacion UNSa</h1>
      <p class="login-brand-sub">Plataforma Institucional</p>
      <div class="login-brand-divider"></div>
      <p class="login-brand-desc">
        Sistema de gestión administrativa institucional seguro y confiable.
        Acceda con sus credenciales para continuar.
      </p>

      <div class="login-features">
        <div class="login-feature">
          <div class="login-feature-icon">🔒</div>
          <span class="login-feature-text">Acceso seguro con cifrado</span>
        </div>
        <div class="login-feature">
          <div class="login-feature-icon">👤</div>
          <span class="login-feature-text">Gestión de usuarios y roles</span>
        </div>
        <div class="login-feature">
          <div class="login-feature-icon">📊</div>
          <span class="login-feature-text">Reportes y estadísticas</span>
        </div>
      </div>

    </div>
  </div>

  <!-- ==================== PANEL DERECHO ==================== -->
  <div class="login-right">
    <div class="login-card">

      <!-- Logo visible en móvil -->
      <div class="login-mobile-logo">
        <div class="login-mobile-logo-icon">I</div>
        <span class="login-mobile-logo-text">Becas de Formacion UNSa</span>
      </div>

      <h2 class="login-title">Iniciar Sesión</h2>

      <form class="login-form" method="POST" id="loginForm" action="{{route('login')}}" novalidate>
          @csrf
        <!-- Correo -->
        <div class="login-field">
          <label class="login-label" for="email">Correo</label>
          <div class="login-input-wrap">
            <span class="login-input-icon">✉</span>
            <input
              type="email"
              id="email"
              name="email"
              class="login-input"
              placeholder="usuario@unsa.edu.ar"
              autocomplete="username"
              required
            />
          </div>
          <span class="login-field-error" id="emailError"></span>
        </div>

        <!-- Contraseña -->
        <div class="login-field">
          <div class="login-label-row">
            <label class="login-label" for="password">Contraseña</label>
            <a href="{{ url('/password/reset') }}" class="login-forgot">¿Olvidó su contraseña?</a>
          </div>
          <div class="login-input-wrap">
            <span class="login-input-icon">🔒</span>
            <input
              type="password"
              name="password"
              id="password"
              class="login-input has-eye"
              placeholder="••••••••"
              autocomplete="current-password"
              required
            />
            <button type="button" class="login-eye" id="eyeBtn" title="Mostrar/ocultar contraseña">
              👁️
            </button>
          </div>
          <span class="login-field-error" id="passError"></span>
        </div>

        <!-- Recordar sesión -->
        <div class="login-remember">
          <label class="login-check-label">
            <input type="checkbox" id="remember" />
            <span>Recordar sesión</span>
          </label>
        </div>

        <!-- Botón -->
        <button type="submit" class="login-submit" id="submitBtn">
          Ingresar al sistema →
        </button>

      </form>

      <!-- Divider -->
      <div class="login-divider">
        <div class="login-divider-line"></div>
        <span class="login-divider-text">o</span>
        <div class="login-divider-line"></div>
      </div>


      <!-- Ayuda -->
      <p class="login-help">
        ¿Problemas para acceder?
        <a href="#">Contacte soporte técnico</a>
      </p>

    </div>

    <p class="login-version">v2.4.1 — Plataforma Institucional</p>
  </div>

</div>

<!-- ==================== ESTILOS EXTRA (errores, spinner) ==================== -->
<style>
  .login-field-error {
    font-size: 12px;
    color: #c62828;
    min-height: 16px;
    margin-top: 2px;
    display: block;
  }
  .login-input.error {
    border-color: #c62828;
    box-shadow: 0 0 0 3px rgba(198,40,40,.10);
  }
  .login-spinner {
    display: inline-block;
    width: 16px;
    height: 16px;
    border: 2px solid rgba(255,255,255,.4);
    border-top-color: #fff;
    border-radius: 50%;
    animation: spin .7s linear infinite;
    flex-shrink: 0;
  }
  @keyframes spin { to { transform: rotate(360deg); } }
</style>


</body>
</html>

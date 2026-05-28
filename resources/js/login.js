import '../css/login.css';
/* ── Mostrar / ocultar contraseña ── */
  let passVisible = false;

  document.addEventListener('DOMContentLoaded',function(){
    document.getElementById('eyeBtn').addEventListener('click', togglePassword);
  })

  function togglePassword() {
    passVisible = !passVisible;
    const input = document.getElementById('password');
    const btn   = document.getElementById('eyeBtn');
    input.type  = passVisible ? 'text' : 'password';
    btn.textContent = passVisible ? '🙈' : '👁️';
  }

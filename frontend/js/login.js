const form = document.getElementById('loginForm');
const message = document.getElementById('loginMessage');

form.addEventListener('submit', async (e) => {
  e.preventDefault();

  const email = document.getElementById('usuario').value.trim();
  const password = document.getElementById('password').value.trim();

  try {
    const res = await fetch(
      'https://amibot-be5.nomorebits.com/api/auth/login',
      {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email, password }),
      }
    );

    const data = await res.json();

    if (!res.ok) {
      if (message) message.textContent = data.error || 'Usuario o contraseña incorrectos.';
      else alert(data.error || 'Usuario o contraseña incorrectos.');
      return;
    }

    // En lugar de ir directamente a main.php, llamamos a un callback PHP
    // que crea la sesión en el servidor y luego redirige a main.php.
    const userName = data.name || data.nombre || data.username || data.user || '';
    let callbackUrl = `./php/login_callback.php?id=${encodeURIComponent(
      data.id
    )}`;
    if (userName) callbackUrl += `&name=${encodeURIComponent(userName)}`;
    window.location.href = callbackUrl;
  } catch (err) {
    console.error(err);
    if (message) message.textContent = 'Error de conexión con el servidor.';
    else alert('Error de conexión con el servidor.');
  }
});
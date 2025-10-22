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
      message.textContent = data.error || 'Usuario o contraseña incorrectos.';
      return;
    }

    window.location.href = `main.php?id=${data.id}`;
  } catch (err) {
    console.error(err);
    message.textContent = 'Error de conexión con el servidor.';
  }
});

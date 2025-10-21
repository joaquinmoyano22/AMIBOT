import app from './app.js';

const PORT = process.env.PORT || 3000;

async function start() {
  try {
    app.listen(PORT, () => {
      console.log(`Auth API corriendo en http://localhost:${PORT}`);
    });
  } catch (err) {
    console.error('No se pudo iniciar el servidor:', err);
    process.exit(1);
  }
}

start();

document.addEventListener('DOMContentLoaded', () => {
  const box = document.getElementById('chatbot-box');
  const close = document.getElementById('close-chat');
  const input = document.getElementById('chatbot-input');
  const boton = document.getElementById('consultarGeminis');
  const messages = document.getElementById('chatbot-messages');

  const MATERIA_CURSO = 'ArquitecturaDeSistemas';
  const AMIBOT_BACKEND_URL = 'http://localhost:3000';

  const toggle = document.getElementById('chatbot-toggle');
  if (toggle) {
    toggle.addEventListener('click', () => {
      box.classList.toggle('active');
    });
  }

  if (close) {
    close.addEventListener('click', () => {
      box.classList.remove('active');
    });
  }

  // Enviar con Enter
  input.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') {
      e.preventDefault();
      boton.click();
    }
  });

  // Click en botón
  boton.addEventListener('click', () => {
    const mensaje = input.value.trim();
    if (!mensaje) return;

    agregarMensajeUsuario(mensaje);
    input.value = '';
    consultarAmibotBackend(mensaje);
    mensaje;
  });

  // --- Función para mostrar mensaje del usuario ---
  function agregarMensajeUsuario(texto) {
    const msgDiv = document.createElement('div');
    msgDiv.className = 'user-msg';
    msgDiv.textContent = texto;
    messages.appendChild(msgDiv);
    messages.scrollTop = messages.scrollHeight;

    // Guardar mensaje del usuario (mauri y luana)
    if (window.saveMessage) window.saveMessage(texto, 'user');
  }

  // --- Función para mostrar respuesta del bot ---
  function agregarMensajeBot(texto) {
    const msgDiv = document.createElement('div');
    msgDiv.className = 'bot-msg';
    // Soporta texto con saltos de línea
    msgDiv.innerHTML = texto
      .split('\n')
      .map((l) => `<p>${escapeHtml(l)}</p>`)
      .join('');
    messages.appendChild(msgDiv);
    messages.scrollTop = messages.scrollHeight;

    // Guardar respuesta del bot (MAURI Y LUANA)
    if (window.saveMessage) window.saveMessage(texto, 'assistant');
  }

  // Escape simple para evitar inyecciones accidentales
  function escapeHtml(unsafe) {
    return unsafe
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#039;');
  }

  // --- Indicador de escritura (puntos animados) ---
  function addTypingIndicator() {
    const indicator = document.createElement('div');
    indicator.className = 'bot-msg typing-indicator';
    indicator.innerHTML = `
            <div class="typing-dots" aria-hidden="true">
                <span></span><span></span><span></span>
            </div>
        `;
    messages.appendChild(indicator);
    messages.scrollTop = messages.scrollHeight;
    return indicator;
  }

  function removeTypingIndicator(indicator) {
    if (!indicator) return;
    try {
      indicator.remove();
    } catch (e) {
      if (indicator.parentNode) indicator.parentNode.removeChild(indicator);
    }
  }

  async function consultarAmibotBackend(mensaje) {
    const typing = addTypingIndicator();
    try {
      const res = await fetch(`${AMIBOT_BACKEND_URL}/api/chat`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          materia: MATERIA_CURSO,
          message: mensaje,
          conversationId: localStorage.getItem('conversationId') || 'anon',
        }),
      });

      const data = await res.json();
      removeTypingIndicator(typing);

      if (!res.ok) {
        agregarMensajeBot(
          `❌ Error (${res.status}): ${data?.error || 'falló la consulta'}`
        );
        return;
      }

      const texto = data.text || 'Sin respuesta';
      agregarMensajeBot(texto);

      if (window.saveMessage) window.saveMessage(texto, 'assistant');
    } catch (e) {
      console.error(e);
      removeTypingIndicator(typing);
      agregarMensajeBot('⚠️ Error al consultar AMIBOT.');
    }
  }
});

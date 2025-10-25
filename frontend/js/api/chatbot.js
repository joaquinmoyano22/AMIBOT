document.addEventListener("DOMContentLoaded", () => {
  const box = document.getElementById("chatbot-box");
  const close = document.getElementById("close-chat");
  const input = document.getElementById("chatbot-input");
  const boton = document.getElementById("consultarGeminis");
  const messages = document.getElementById("chatbot-messages");

  const toggle = document.getElementById("chatbot-toggle");
  if (toggle) {
    toggle.addEventListener("click", () => {
      box.classList.toggle("active");
    });
  }

  if (close) {
    close.addEventListener("click", () => {
      box.classList.remove("active");
    });
  }

  // Enviar con Enter
  input.addEventListener("keydown", (e) => {
    if (e.key === "Enter") {
      e.preventDefault();
      boton.click();
    }
  });

  // Click en botón
  boton.addEventListener("click", () => {
    const mensaje = input.value.trim();
    if (!mensaje) return;

    agregarMensajeUsuario(mensaje);
    input.value = "";
    consultarGeminis(mensaje);
  });

  // --- Función para mostrar mensaje del usuario ---
  function agregarMensajeUsuario(texto) {
    const msgDiv = document.createElement("div");
    msgDiv.className = "user-msg";
    msgDiv.textContent = texto;
    messages.appendChild(msgDiv);
    messages.scrollTop = messages.scrollHeight;
  }

  // --- Función para mostrar respuesta del bot ---
  function agregarMensajeBot(texto) {
    const msgDiv = document.createElement("div");
    msgDiv.className = "bot-msg";
    // Soporta texto con saltos de línea
    msgDiv.innerHTML = texto
      .split("\n")
      .map((l) => `<p>${escapeHtml(l)}</p>`)
      .join("");
    messages.appendChild(msgDiv);
    messages.scrollTop = messages.scrollHeight;
  }

  // Escape simple para evitar inyecciones accidentales
  function escapeHtml(unsafe) {
    return unsafe
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
  }

  // --- Indicador de escritura (puntos animados) ---
  function addTypingIndicator() {
    const indicator = document.createElement("div");
    indicator.className = "bot-msg typing-indicator";
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

  // --- Consulta a Gemini (Google Generative Language API) ---
  async function consultarGeminis(pregunta) {
    console.log("Consultando Gemini con:", pregunta);

    // <-- Reemplazá por tu propia API_KEY o mantené la que ya tengas en el proyecto -->
    const API_KEY = "AIzaSyC1r4kzO3JAnbOose1OFkCS_bNGZ6CEDJg";
    const url = `https://generativelanguage.googleapis.com/v1/models/gemini-2.5-pro:generateContent?key=${API_KEY}`;

    const requestBody = {
      // Ajustá el cuerpo según tu necesidad / configuración
      // Aquí usamos el formato que el proyecto ya utilizaba
      contents: [{ parts: [{ text: pregunta }] }],
      generationConfig: { temperature: 0.4, maxOutputTokens: 32768 },
    };

    // Mostrar indicador de escritura
    const typing = addTypingIndicator();

    try {
      const resp = await fetch(url, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(requestBody),
      });

      if (!resp.ok) {
        // Si la API devuelve un error HTTP
        const text = await resp.text();
        console.error("Error HTTP:", resp.status, text);
        removeTypingIndicator(typing);
        agregarMensajeBot(
          "❌ Error al comunicar con el servicio (HTTP " + resp.status + ")."
        );
        return;
      }

      const json = await resp.json();
      console.log("Respuesta JSON completa:", json);

      const parts = json?.candidates?.[0]?.content?.parts;
      if (!parts || !parts.length) {
        removeTypingIndicator(typing);
        agregarMensajeBot(
          "❌ No pude obtener una respuesta, intentá de nuevo."
        );
        return;
      }

      const texto = parts.map((p) => p.text || "").join("\n");
      console.log("Respuesta de Gemini:", texto);

      // Quitar indicador y mostrar respuesta del bot
      removeTypingIndicator(typing);
      agregarMensajeBot(texto);
    } catch (error) {
      console.error("Error al consultar Gemini:", error);
      removeTypingIndicator(typing);
      agregarMensajeBot("⚠️ Ocurrió un error al consultar AMIBOT.");
    }
  }
});

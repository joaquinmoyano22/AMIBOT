<?php
session_start();
$usuario = $_SESSION["nombre_usuario"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Arquitecturas de sistemas DIV-G 2016</title>
  <link rel="icon" type="image/png" href="./../img/logo_uch.png">
  <link rel="stylesheet" href="./../css/estilo_curso_arq.css">
</head>
<body>

<!-- NAVBAR -->
  <nav class="navbar">
    <div class="nav-left">
      <img class="logo" src="./../img/logo_index.png" alt="Logo UCH">
      <span class="brand">CAMPUS UCH</span>
      <ul class="menu">
        <li><a href="#">PÁGINA PRINCIPAL</a></li>
        <li><a href="#">AREA PERSONAL</a></li>
        <li><a href="curso.php">MIS CURSOS</a></li>
        <li><a href="#">AYUDA</a></li>
        <li><a href="#">OTROS ACCESOS</a></li>
      </ul>
    </div>
    <div class="nav-right">
      <!-- Este link abre el modal -->
      <a href="#" id="openModal" class="login-link"><span class="icon">👤</span><?php echo $usuario; ?></a>
    </div>
  </nav>
  <!-- HEADER -->
  <header class="header">
    <h1>ARQUITECTURAS DE SISTEMAS DIV-G 2016</h1>
    <p class="breadcrumb">Página Principal / Mis Cursos / Arquitecturas de sistemas</p>
  </header>

  <!-- NAV DE CURSO -->
  <nav class="tabs">
    <a href="#" class="tab active">Curso</a>
    <a href="#" class="tab">Participantes</a>
    <a href="#" class="tab">Calificaciones</a>
    <a href="#" class="tab">Competencias</a>
  </nav>

  <!-- SECCIÓN DE AVISOS -->
  <section class="avisos">
    <div class="aviso-icon">💬</div>
    <span> Avisos </span>
  </section>

  <!-- UNIDADES -->
  <section class="unidades">
    <div class="unidad-card">
      <img src="./../img/icono_unidad.svg" alt="">
      <p>INTRODUCCIÓN</p>
    </div>

    <div class="unidad-card" id="unidad1">
      <img src="./../img/icono_unidad.svg" alt="">
      <p>Unidad I: Arquitecturas de sistemas</p>
    </div>

    <!-- MODAL UNIDAD I -->
  <div class="modal" id="modalUnidad1">
    <div class="modal-content">
      <span class="close" id="cerrarModal">&times;</span>

      <h2>Unidad I: Arquitecturas de sistemas</h2>
      <p class="intro">
        En esta unidad analizaremos los siguientes temas:
      </p>

      <ul class="temas">
        <li>Atributos de Calidad</li>
        <li>Conceptualización de Arquitectura de Software</li>
        <li>Historia de la Arquitectura de Software</li>
        <li>Definiciones y Áreas vinculadas</li>
        <li>Arquitectura de Procesos y Desarrollo</li>
        <li>Ejemplos de Diseño Arquitectónico</li>
      </ul>

      <h3>Bibliografía obligatoria</h3>
      <ul class="bibliografia">
        <li><strong>Software Architecture in Practice</strong> – Bass, Clements, Kazman, 4ta Ed. Addison-Wesley, 2021.</li>
        <li><strong>Pattern-Oriented Software Architecture</strong> – Buschmann et al., Wiley, 1996.</li>
      </ul>

      <h3>Bibliografía optativa de consulta</h3>
      <ul class="bibliografia">
        <li><strong>Documenting Software Architectures:</strong> Clements et al., Addison-Wesley, 2010.</li>
        <li><strong>Evaluating Software Architectures:</strong> Kazman et al., Addison-Wesley, 2002.</li>
      </ul>

      <h3>Material de clase de la Unidad I</h3>
      <div class="recursos">
        <div class="recurso azul">📘 Unidad I - Video Parte 1</div>
        <div class="recurso azul">📘 Unidad I - Video Parte 2</div>
        <div class="recurso azul">📘 Unidad I - Video Parte 3</div>
        <div class="recurso rojo">❗ Foro de consultas sobre la unidad</div>
        <div class="recurso amarillo">📝 Act.1-1: Compartiendo nuevos conceptos</div>
        <div class="recurso rosa">📚 TP-3: Diseño integral de la arquitectura</div>
        <div class="recurso gris">📄 Síntesis de Documentos de Arquitectura</div>
      </div>
    </div>
  </div>

    <div class="unidad-card">
      <img src="./../img/icono_unidad.svg" alt="">
      <p>Unidad II: Estilos y patrones</p>
    </div>

    <div class="unidad-card">
      <img src="./../img/icono_unidad.svg" alt="">
      <p>Unidad III: Arquitecturas orientadas a servicios</p>
    </div>

    <div class="unidad-card">
      <img src="./../img/icono_unidad.svg" alt="">
      <p>Unidad IV: Ingeniería reversa para la recuperación de la arquitectura</p>
    </div>

    <div class="unidad-card">
      <img src="./../img/icono_unidad.svg" alt="">
      <p>BIBLIOGRAFÍA</p>
    </div>
  </section>

  <!-- CHATBOT FLOTANTE -->
<div class="chatbot-container">
  <!-- BOTÓN FLOTANTE -->
  <button id="chatbot-toggle" class="chatbot-button">
    <img src="./../img/chatbot.webp" alt="AMIBOT" />
  </button>

  <!-- VENTANA DEL CHAT -->
  <div id="chatbot-box" class="chatbot-box">
    <div class="chatbot-header">
      <h3>💬 AMIBOT - ARQUITECTURAS DE SISTEMAS</h3>
      <button id="close-chat" class="close-chat">&times;</button>
    </div>
    <div class="chatbot-messages" id="chatbot-messages">
      <div class="bot-msg">¡Hola! Soy AMIBOT 🤖<br>¿En qué puedo ayudarte hoy?</div>
    </div>
    <div class="chatbot-input-area">
      <input type="text" id="chatbot-input" placeholder="Escribí tu mensaje..." />
      <button id="send-chat">Enviar</button>
    </div>
  </div>
</div>

<script>
    const unidad1 = document.getElementById('unidad1');
    const modal = document.getElementById('modalUnidad1');
    const cerrar = document.getElementById('cerrarModal');

    unidad1.onclick = () => modal.style.display = 'flex';
    cerrar.onclick = () => modal.style.display = 'none';
    window.onclick = (e) => { if (e.target === modal) modal.style.display = 'none'; }

  // JS simple para abrir/cerrar el chat
  const toggle = document.getElementById("chatbot-toggle");
  const box = document.getElementById("chatbot-box");
  const close = document.getElementById("close-chat");
  const send = document.getElementById("send-chat");
  const input = document.getElementById("chatbot-input");
  const messages = document.getElementById("chatbot-messages");

  toggle.addEventListener("click", () => {
    box.classList.toggle("active");
  });

  close.addEventListener("click", () => {
    box.classList.remove("active");
  });

  send.addEventListener("click", () => {
    const msg = input.value.trim();
    if (msg) {
      messages.innerHTML += `<div class='user-msg'>${msg}</div>`;
      input.value = "";
      messages.scrollTop = messages.scrollHeight;
    }
  });

  input.addEventListener("keypress", e => {
    if (e.key === "Enter") send.click();
  });
</script>

</body>
</html>

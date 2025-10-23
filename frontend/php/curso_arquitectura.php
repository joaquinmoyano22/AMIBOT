<?php
session_start();
$usuario = $_SESSION["nombre"];
$isAdmin = $_SESSION["isAdmin"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Arquitecturas de sistemas DIV-G 2016</title>
  <link rel="icon" type="image/png" href="./../img/logo_uch.png">
  <link rel="stylesheet" href="./../css/estilo_curso_arq.css">
  <link rel="stylesheet" href="./../css/estilo_nav_bar.css">
  <link rel="stylesheet" href="./../css/estilo_footer.css">
  <link rel="stylesheet" href="./../css/estilo_amibot.css">
</head>

<body>
  <?php
  include 'nav_bar.php';
  ?>
  <?php
  if ($isAdmin == 0) {
    ?>
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
        <img src="" alt="">
        <p>INTRODUCCIÓN</p>
      </div>

      <div class="unidad-card" id="unidad1">
        <img src="" alt="">
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
            <li><strong>Software Architecture in Practice</strong> – Bass, Clements, Kazman, 4ta Ed. Addison-Wesley, 2021.
            </li>
            <li><strong>Pattern-Oriented Software Architecture</strong> – Buschmann et al., Wiley, 1996.</li>
          </ul>

          <h3>Bibliografía optativa de consulta</h3>
          <ul class="bibliografia">
            <li><strong>Documenting Software Architectures:</strong> Clements et al., Addison-Wesley, 2010.</li>
            <li><strong>Evaluating Software Architectures:</strong> Kazman et al., Addison-Wesley, 2002.</li>
          </ul>

          <h3>Material de clase de la Unidad I</h3>
          <div class="recursos">
            <div class="recurso azul"> Unidad I - Video Parte 1</div>
            <div class="recurso azul"> Unidad I - Video Parte 2</div>
            <div class="recurso azul"> Unidad I - Video Parte 3</div>
            <div class="recurso rojo"> Foro de consultas sobre la unidad</div>
            <div class="recurso amarillo"> Act.1-1: Compartiendo nuevos conceptos</div>
            <div class="recurso rosa"> TP-3: Diseño integral de la arquitectura</div>
            <div class="recurso gris"> Síntesis de Documentos de Arquitectura</div>
          </div>
        </div>
      </div>

      <div class="unidad-card">
        <img src="" alt="">
        <p>Unidad II: Estilos y patrones</p>
      </div>

      <div class="unidad-card">
        <img src="" alt="">
        <p>Unidad III: Arquitecturas orientadas a servicios</p>
      </div>

      <div class="unidad-card">
        <img src="" alt="">
        <p>Unidad IV: Ingeniería reversa para la recuperación de la arquitectura</p>
      </div>

      <div class="unidad-card">
        <img src="" alt="">
        <p>BIBLIOGRAFÍA</p>
      </div>
    </section>


    <?php
  } elseif ($isAdmin == 1) {
    ?>
    <!-- HEADER -->
    <header class="header">
      <h1>ARQUITECTURAS DE SISTEMAS DIV-G 2016</h1>
      <p class="breadcrumb">Página Principal / Mis Cursos / Arquitecturas de sistemas</p>
    </header>

    <!-- NAV DE CURSO -->
    <nav class="tabs">
      <div class="tabs-left">
        <a href="#" class="tab active">Curso</a>
        <a href="#" class="tab">Participantes</a>
        <a href="#" class="tab">Calificaciones</a>
        <a href="#" class="tab">Competencias</a>
      </div>

      <?php if ($isAdmin == 1): ?>
        <div class="tabs-right">
          <!-- Botón para abrir modal de subida de PDF -->
          <button class="btn-subir-archivo" onclick="document.getElementById('modalSubirArchivo').style.display='flex'">
            📄 Subir archivo
          </button>
        </div>
      <?php endif; ?>
    </nav>

    <!-- SECCIÓN DE AVISOS -->
    <section class="avisos">
      <div class="aviso-icon">💬</div>
      <span> Avisos </span>
    </section>

    <!-- UNIDADES -->
    <section class="unidades">
      <div class="unidad-card">
        <img src="" alt="">
        <p>INTRODUCCIÓN</p>
      </div>

      <div class="unidad-card" id="unidad1">
        <img src="" alt="">
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
            <li><strong>Software Architecture in Practice</strong> – Bass, Clements, Kazman, 4ta Ed. Addison-Wesley, 2021.
            </li>
            <li><strong>Pattern-Oriented Software Architecture</strong> – Buschmann et al., Wiley, 1996.</li>
          </ul>

          <h3>Bibliografía optativa de consulta</h3>
          <ul class="bibliografia">
            <li><strong>Documenting Software Architectures:</strong> Clements et al., Addison-Wesley, 2010.</li>
            <li><strong>Evaluating Software Architectures:</strong> Kazman et al., Addison-Wesley, 2002.</li>
          </ul>

          <h3>Material de clase de la Unidad I</h3>
          <div class="recursos">
            <div class="recurso azul"> Unidad I - Video Parte 1</div>
            <div class="recurso azul"> Unidad I - Video Parte 2</div>
            <div class="recurso azul"> Unidad I - Video Parte 3</div>
            <div class="recurso rojo"> Foro de consultas sobre la unidad</div>
            <div class="recurso amarillo"> Act.1-1: Compartiendo nuevos conceptos</div>
            <div class="recurso rosa"> TP-3: Diseño integral de la arquitectura</div>
            <div class="recurso gris"> Síntesis de Documentos de Arquitectura</div>
          </div>
        </div>
      </div>

      <div class="unidad-card">
        <img src="" alt="">
        <p>Unidad II: Estilos y patrones</p>
      </div>

      <div class="unidad-card">
        <img src="" alt="">
        <p>Unidad III: Arquitecturas orientadas a servicios</p>
      </div>

      <div class="unidad-card">
        <img src="" alt="">
        <p>Unidad IV: Ingeniería reversa para la recuperación de la arquitectura</p>
      </div>

      <div class="unidad-card">
        <img src="" alt="">
        <p>BIBLIOGRAFÍA</p>
      </div>
    </section>

    <!-- MODAL SUBIR ARCHIVO -->
    <div class="modal" id="modalSubirArchivo">
      <div class="modal-content" style="max-width:400px;">
        <span class="close" onclick="document.getElementById('modalSubirArchivo').style.display='none'">&times;</span>
        <h3>Subir nuevo archivo</h3>
        <form action="subir_pdf.php" method="POST" enctype="multipart/form-data">
          <label>Unidad:</label>
          <select name="unidad" required>
            <option value="Introduccion">Introduccion</option>
            <option value="Unidad I">Unidad I</option>
            <option value="Unidad II">Unidad II</option>
            <option value="Unidad III">Unidad III</option>
            <option value="Unidad IV">Unidad IV</option>
            <option value="Bibliografia">Bibliografia</option>
          </select>
          <br><br>
          <input type="file" name="pdf_file" accept="application/pdf" required>
          <br><br>
          <button type="submit" class="btn-subir">Subir archivo</button>
        </form>
      </div>
    </div>

    <?php
  }
  ?>
</body>







<!-- CHATBOT FLOTANTE -->
<div class="chatbot-container">
  <!-- BOTÓN FLOTANTE -->
  <button id="chatbot-toggle" class="chatbot-button">
    <img src="./../assets/img/chatbot.webp" alt="AMIBOT" />
  </button>

  <?php
  include 'chatbot.php';
  ?>
</div>
<?php
include 'footer.php';
?>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM listo — inicializando modal');

    // Selección de elementos
    const modal = document.getElementById('modalUnidad1');
    const cerrar = document.getElementById('cerrarModal');

    // Funciones de apertura/cierre
    function abrirModal(target) {
      if (!modal) { console.error('No se encontró el modal (id modalUnidad1)'); return; }
      console.log('Abriendo modal:', target);
      modal.style.display = 'flex';
      modal.setAttribute('aria-hidden', 'false');
      // opcional: bloquear scroll de fondo
      document.body.style.overflow = 'hidden';
    }
    function cerrarModalFn() {
      if (!modal) return;
      console.log('Cerrando modal');
      modal.style.display = 'none';
      modal.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
    }

    // Abrir cuando se clickea la tarjeta con data-target
    document.querySelectorAll('.unidad-card[data-target]').forEach(card => {
      card.addEventListener('click', (e) => {
        const target = card.getAttribute('data-target');
        console.log('Click en unidad-card, data-target=', target);
        if (target === 'modalUnidad1') abrirModal(target);
      });
    });

    // También habilito el click directo sobre el id 'unidad1' por compatibilidad:
    const unidad1 = document.getElementById('unidad1');
    if (unidad1 && !unidad1.hasAttribute('data-target')) {
      unidad1.addEventListener('click', () => abrirModal('modalUnidad1'));
    }

    // Cerrar con la X
    if (cerrar) cerrar.addEventListener('click', cerrarModalFn);

    // Cerrar al clickear fuera del contenido
    window.addEventListener('click', (e) => {
      if (e.target === modal) cerrarModalFn();
    });

    // Cerrar con Esc
    window.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && modal && modal.style.display !== 'none') {
        cerrarModalFn();
      }
    });

    console.log('Modal: listeners añadidos correctamente');

    // Cerrar modal al hacer clic fuera
    window.addEventListener('click', (e) => {
      const modal = document.getElementById('modalSubirArchivo');
      if (e.target === modal) modal.style.display = 'none';
    });

  });
</script>
<script src="../js/api/chatbot.js"></script>

</body>

</html>
<?php
session_start();

$usuario = $_SESSION["nombre_usuario"];
?>

<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Campus UCH</title>
  <link rel="icon" type="image/png" href="./../img/logo_uch.png">
  <link rel="stylesheet" href="./../css/estilo_main.css" />
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

  <!-- HERO -->
  <section class="hero">
    <h1 class="hero-title">¿Ya conociste a AMIBOT?</h1>
    <p class="hero-sub">
      Es mi <b>AMIGO EL BOT</b>, quien te estará acompañando a lo largo de tu carrera<br>
      En donde podrás hacer consultas sobre las materias, calendario, pedir resúmenes, etc.
    </p>
  </section>

  <!-- CURSOS -->
  <section class="cursos-section">
    <h1 class="titulo">Cursos</h1>
    <p class="subtitulo">Ver los cursos disponibles por categoría</p>

    <div class="grid-cursos">
      <div class="card" style="--bg:url('./../img/psogrado.jpeg')">
        <div class="overlay"></div>
        <h3>Posgrado y Cursos</h3>
      </div>

      <div class="card" style="--bg:url('./../img/digitales.jpeg')">
        <div class="overlay"></div>
        <h3>Digitales<br><span>Cursos y capacitaciones en general</span></h3>
      </div>

      <div class="card" style="--bg:url('./../img/empresariales.jpeg')">
        <div class="overlay"></div>
        <h3>Facultad Ciencias Empresariales</h3>
      </div>

      <div class="card" style="--bg:url('./../img/derecho.jpeg')">
        <div class="overlay"></div>
        <h3>Facultad Derecho</h3>
      </div>

      <div class="card" style="--bg:url('./../img/informatica.jpeg')">
        <div class="overlay"></div>
        <h3>Facultad Informática y Diseño</h3>
      </div>

      <div class="card" style="--bg:url('./../img/proyectos.jpeg')">
        <div class="overlay"></div>
        <h3>Proyectos y usos múltiples</h3>
      </div>

      <div class="card" style="--bg:url('./../img/rectorado.jpeg')">
        <div class="overlay"></div>
        <h3>Rectorado</h3>
      </div>

      <div class="card" style="--bg:url('./../img/ambiental.jpeg')">
        <div class="overlay"></div>
        <h3>Curso de Ambientación</h3>
      </div>
    </div>

    <div class="btn-container">
      <a href="#" class="ver-todos">Ver todos los cursos</a>
    </div>
  </section>

  <!-- CHATBOT FLOTANTE -->
  <div class="chatbot-container">
    <!-- BOTÓN FLOTANTE -->
    <button id="chatbot-toggle" class="chatbot-button">
      <img src="./../img/chatbot.webp" alt="AMIBOT" />
    </button>

    <!-- VENTANA DEL CHAT -->

    <?php
    include 'chatbot.php';
    ?>


  </div>

  <!-- FOOTER -->
  <footer class="site-footer">
    <div class="footer-inner">
      <p>© 2025 Universidad Champagnat — Todos los derechos reservados</p>
    </div>
  </footer>




</body>

<script src="../js/chatbot.js"></script>

</html>
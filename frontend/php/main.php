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
  <link rel="stylesheet" href="./../css/estilo_nav_bar.css">
  <link rel="stylesheet" href="./../css/estilo_hero.css" />
  <link rel="stylesheet" href="./../css/estilo_footer.css">
  <link rel="stylesheet" href="./../css/estilo_amibot.css">

</head>

<body>
  
  <?php
    include 'nav_bar.php';
  ?>

  <!-- HERO -->
  <section class="hero">
    <h1 class="hero-title">¿Ya conociste a AMIBOT?</h1>
    <p class="hero-sub">
      Es mi <b>AMIGO EL BOT</b>, quien te estará acompañando a lo largo de tu carrera<br>
      En donde podrás hacer consultas sobre las materias, calendario, pedir resúmenes, etc.
    </p>
  </section>

  <?php
    include 'cursos-section.php';
  ?>

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

  <div id="chatbot-messages">
  <!-- mensajes aparecen acá -->
  <div id="chatbot-typing" class="chatbot-typing" style="display: none;">
    <span></span><span></span><span></span>
  </div>
</div>

  </div>

  <?php
    include 'footer.php';
  ?>




</body>

<script src="./../js/api/chatbot.js"></script>

</html>
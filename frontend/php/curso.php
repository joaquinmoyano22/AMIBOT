<?php
session_start();

$usuario = $_SESSION["nombre_usuario"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cursos - Campus UCH</title>
  <link rel="icon" type="image/png" href="./../img/logo_uch.png">
  <link rel="stylesheet" href="./../css/estilo_curso.css">
  <link rel="stylesheet" href="./../css/estilo_nav_bar.css">
  <link rel="stylesheet" href="./../css/estilo_footer.css">
</head>
<body>

  <?php 
    include 'nav_bar.php'; 
  ?>


  <section class="cursos-container">

    <a href="curso_arquitectura.php" class="curso-card enlace-curso">
  <img src="./../img/img_curso1.svg" alt="Arquitecturas de sistemas">
  <div class="curso-info">
    <p class="carrera">Licenciatura en Sistemas de Información</p>
    <h2>Arquitecturas de sistemas DIV-G 2016</h2>
    <div class="estado">
      <span class="publicado">Publicado</span>
      <span class="estrella">⭐</span>
    </div>
    <div class="progreso">
      <div class="barra">
        <div class="relleno" style="width: 70%;"></div>
      </div>
      <p>70% completado</p>
    </div>
  </div>
</a>


    <div class="curso-card">
      <img src="./../img/img_curso2.svg" alt="Auditoría">
      <div class="curso-info">
        <p class="carrera">Licenciatura en Sistemas de Información</p>
        <h2>AUDITORIA DIV-G 2016</h2>
        <div class="estado">
          <span class="publicado">Publicado</span>
        </div>
        <div class="progreso">
          <div class="barra">
            <div class="relleno" style="width: 100%;"></div>
          </div>
          <p>100% completado</p>
        </div>
      </div>
    </div>

    <div class="curso-card">
      <img src="./../img/img_curso3.svg" alt="Calidad de software">
      <div class="curso-info">
        <p class="carrera">Licenciatura en Sistemas de Información</p>
        <h2>Calidad de software I DIV-G 2016</h2>
        <div class="estado">
          <span class="publicado">Publicado</span>
        </div>
        <div class="progreso">
          <div class="barra">
            <div class="relleno" style="width: 100%;"></div>
          </div>
          <p>100% completado</p>
        </div>
      </div>
    </div>

    <div class="curso-card">
      <img src="./../img/img_curso1.svg" alt="Calidad de software II">
      <div class="curso-info">
        <p class="carrera">Licenciatura en Sistemas de Información</p>
        <h2>Calidad de software II DIV-G 2016</h2>
        <div class="estado">
          <span class="publicado">Publicado</span>
        </div>
        <div class="progreso">
          <div class="barra">
            <div class="relleno" style="width: 10%;"></div>
          </div>
          <p>10% completado</p>
        </div>
      </div>
    </div>

    <div class="curso-card">
      <img src="./../img/img_curso4.svg" alt="Gestion de proyectos">
      <div class="curso-info">
        <p class="carrera">Licenciatura en Sistemas de Información</p>
        <h2>Gestion de proyectos DIV-G 2016</h2>
        <div class="estado">
          <span class="publicado">Publicado</span>
        </div>
        <div class="progreso">
          <div class="barra">
            <div class="relleno" style="width: 80%;"></div>
          </div>
          <p>80% completado</p>
        </div>
      </div>
    </div>

    <div class="curso-card">
      <img src="./../img/img_curso2.svg" alt="Probabilidad y estadística">
      <div class="curso-info">
        <p class="carrera">Licenciatura en Sistemas de Información</p>
        <h2>Probabilidad y estadística DIV-G 2016</h2>
        <div class="estado">
          <span class="publicado">Publicado</span>
        </div>
        <div class="progreso">
          <div class="barra">
            <div class="relleno" style="width: 100%;"></div>
          </div>
          <p>100% completado</p>
        </div>
      </div>
    </div>

    <div class="curso-card">
      <img src="./../img/img_curso3.svg" alt="Proceso de desarrollo de software">
      <div class="curso-info">
        <p class="carrera">Licenciatura en Sistemas de Información</p>
        <h2>Proceso de desarrollo de software DIV-G 2016</h2>
        <div class="estado">
          <span class="publicado">Publicado</span>
        </div>
        <div class="progreso">
          <div class="barra">
            <div class="relleno" style="width: 100%;"></div>
          </div>
          <p>100% completado</p>
        </div>
      </div>
    </div>

    <div class="curso-card">
      <img src="./../img/img_curso4.svg" alt="Teoria de la computación III">
      <div class="curso-info">
        <p class="carrera">Licenciatura en Sistemas de Información</p>
        <h2>Teoria de la computación III DIV-G 2016</h2>
        <div class="estado">
          <span class="publicado">Publicado</span>
        </div>
        <div class="progreso">
          <div class="barra">
            <div class="relleno" style="width: 60%;"></div>
          </div>
          <p>60% completado</p>
        </div>
      </div>
    </div>

    <div class="curso-card">
      <img src="./../img/img_curso1.svg" alt="Seguridad">
      <div class="curso-info">
        <p class="carrera">Licenciatura en Sistemas de Información</p>
        <h2>Seguridad DIV-G 2016</h2>
        <div class="estado">
          <span class="publicado">Publicado</span>
        </div>
        <div class="progreso">
          <div class="barra">
            <div class="relleno" style="width: 10%;"></div>
          </div>
          <p>10% completado</p>
        </div>
      </div>
    </div>

  </section>

  <?php 
    include 'footer.php';
  ?>

</body>
</html>

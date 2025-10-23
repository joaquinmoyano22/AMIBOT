<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- NAVBAR -->
  <nav class="navbar">
    <div class="nav-left">
      <img class="logo" src="./../img/logo_index.png" alt="Logo UCH">
      <span class="brand">CAMPUS UCH</span>
      <ul class="menu">
        <li><a href="main.php">PÁGINA PRINCIPAL</a></li>
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
</body>
</html>
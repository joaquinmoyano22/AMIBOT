<?php
// Recibe id (y opcionalmente name) por GET, crea la sesión PHP y redirige a main.php
session_start();

$id = isset($_GET['id']) ? trim($_GET['id']) : null;
$nombre = isset($_GET['nombre']) ? trim($_GET['nombre']) : null;
$isAdmin = isset($_GET['isAdmin']) ? trim($_GET['isAdmin']) : null;

if ($id) {
  // Guardamos el id en la sesión
  $_SESSION['id'] = $id;

  // Si viene nombre, lo guardamos como 'nombre' para compatibilidad con main.php
  if ($nombre !== null && $nombre !== '') {
    $_SESSION['nombre'] = $nombre;
  }
  // Si viene nombre, lo guardamos como 'nombre' para compatibilidad con main.php
  if ($isAdmin !== null && $isAdmin !== '') {
    $_SESSION['isAdmin'] = $isAdmin;
  }
}

// Redirigimos a main.php (ruta relativa dentro de la carpeta php)
header('Location: main.php');
exit;

?>

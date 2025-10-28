<?php
// Recibe id (y opcionalmente name) por GET, crea la sesión PHP y redirige a main.php
session_start();

$id = isset($_GET['id']) ? $_GET['id'] : null;
$name = isset($_GET['name']) ? $_GET['name'] : null;
$is_admin = isset($_GET['is_admin']) ? $_GET['is_admin'] : null;



if ($id) {
  // Guardamos el id en la sesión
  $_SESSION['id'] = $id;

  // Si viene nombre, lo guardamos como 'nombre' para compatibilidad con main.php
  if ($name !== null && $name !== '') {
    $_SESSION['name'] = $name;
  }
  // Si viene nombre, lo guardamos como 'nombre' para compatibilidad con main.php
  if ($is_admin !== null && $is_admin !== '') {
    $_SESSION['is_admin'] = $is_admin;
  }
}

// Redirigimos a main.php (ruta relativa dentro de la carpeta php)
header('Location: main.php');
exit;

?>
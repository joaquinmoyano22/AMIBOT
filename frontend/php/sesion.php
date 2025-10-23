<?php
session_start(); // 🔹 Siempre al inicio del archivo

include 'conexion.php';

// Capturamos los datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Consulta a la base de datos
$consulta = "SELECT * FROM usuario WHERE email = '$email' AND password = '$password'";
$resultado = mysqli_query($conexion, $consulta);

// Verificamos si se encontró el usuario
if ($fila = mysqli_fetch_array($resultado)) {
    // Guardamos datos en la sesión
    $_SESSION['id'] = $fila['id'];
    $_SESSION['nombre'] = $fila['nombre'];
    $_SESSION['isAdmin'] = $fila['isAdmin'];

    echo "<h3>✅ Sesión iniciada correctamente</h3>";
    echo "Bienvenido, " . $_SESSION['nombre'] . "<br><br>";


    // Redirigir a main.php
    header("Location: main.php");
    exit;
} else {
    echo "<h3>❌ Usuario o contraseña incorrectos</h3>";
}

// Cerramos la conexión
mysqli_close($conexion);
?>
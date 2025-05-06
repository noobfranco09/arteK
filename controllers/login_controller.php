<?php
session_start();

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Verificar las credenciales
    if ($usuario == 'ADMIN' && $contrasena == '12345') {
        // Si las credenciales son correctas, guardamos el usuario en la sesión
        $_SESSION['usuario'] = 'ADMIN';

        // Redirigimos al dashboard
        header("Location: ../views/dashboard.php");
        exit();
    } else {
        // Si las credenciales son incorrectas, redirigimos con un error
        header("Location: ../views/login.php?error=1");
        exit();
    }
}
?>
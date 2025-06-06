<?php

session_start();


if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: adminDashboard.php'); // Redirige al panel de administración
    exit;
}

// Procesa el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Credenciales del administrador (puedes mover esto a un archivo de configuración)
    $adminUsername = 'admin';
    $adminPassword = 'admin123'; // Asegúrate de usar contraseñas seguras y encriptadas

    if ($username === $adminUsername && $password === $adminPassword) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: adminDashboard.php'); // Redirige al panel de administración
        exit;
    } else {
        $error = 'Usuario o contraseña incorrectos.';
    }
}
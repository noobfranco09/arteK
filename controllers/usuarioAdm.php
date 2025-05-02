<?php
session_start();

// Credenciales del administrador (puedes mover esto a un archivo de configuración seguro)
$adminUsername = 'admin';
$adminPassword = 'admin123';

// Procesa el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $adminUsername && $password === $adminPassword) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: adminDashboard.php'); // Redirige al panel de administración
        exit;
    } else {
        $error = 'Usuario o contraseña incorrectos.';
    }
}
?>
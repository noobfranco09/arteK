<?php
session_start();
session_destroy(); 
header('Location: ../views/inicioSesion.php'); // Redirige al inicio de sesión
exit;
?>
<?php
session_start();

// Eliminar todos los datos de la sesión
session_unset();
session_destroy();

// Redirigir al login
header("Location: ../views/login.php?logout=1");
exit;
?>

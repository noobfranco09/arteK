<?php
require_once '../models/MySQL.php';

$mysql = new MySQL;
$mysql->conectar();

// Validar y sanitizar el ID
if (!isset($_GET['id']) || !preg_match('/^\d+$/', $_GET['id'])) {
    die("Error: ID inválido.");
}

$id = intval($_GET['id']);

// Cambiar estado del producto a inactivo (0)
$consulta = "UPDATE productos SET estado = 0 WHERE id = $id";
$mysql->efectuarConsulta($consulta);

$mysql->desconectar();

// Redirigir al dashboard
header("Location: ../views/dashboard.php");
exit;
?>

<?php
require_once '../models/MySQL.php';
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID inválido.");
}
$id = intval($_GET['id']);
$mysql = new MySQL;
$mysql->conectar();
$mysql->efectuarConsulta("DELETE FROM productos WHERE id = $id");
$mysql->desconectar();
header("Location: ../views/eliminar_listado.php");
exit();

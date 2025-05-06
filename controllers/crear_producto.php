<?php
require_once '../models/MySQL.php';

function limpiarTexto($texto) {
    return htmlspecialchars(trim($texto), ENT_QUOTES, 'UTF-8');
}

$mysql = new MySQL;
$mysql->conectar();

// Validar campos requeridos
$campos = ['nombreProducto', 'descripcion'];
foreach ($campos as $campo) {
    if (empty($_POST[$campo])) {
        die("Error: El campo '$campo' es obligatorio.");
    }
}

$nombre = limpiarTexto($_POST['nombreProducto']);
$descripcion = limpiarTexto($_POST['descripcion']);
$estado = 1; // activo por defecto

$foto = ''; // valor por defecto si no se sube imagen

if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $permitidos = ['image/jpeg', 'image/png', 'image/jpg'];
    $tipo = mime_content_type($_FILES['foto']['tmp_name']);

    if (in_array($tipo, $permitidos)) {
        $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $nombre_unico = date("His") . microtime(true) . '.' . $ext;

        $ruta_relativa = 'fotos_productos/' . $nombre_unico; // ruta para la DB
        $ruta_absoluta = __DIR__ . '/../' . $ruta_relativa;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_absoluta)) {
            $foto = $ruta_relativa;
        } else {
            die("Error al subir la imagen.");
        }
    } else {
        die("Formato de imagen no permitido.");
    }
}

// Insertar producto
$consulta = "INSERT INTO productos 
(nombreProducto, descripcion, estado, foto) 
VALUES 
('$nombre', '$descripcion', $estado, '$foto')";
$mysql->efectuarConsulta($consulta);

$mysql->desconectar();
header("Location: ../views/dashboard.php");
exit;


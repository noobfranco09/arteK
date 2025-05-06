<?php
require_once '../models/MySQL.php';

function limpiarTexto($texto)
{
    return htmlspecialchars(trim($texto), ENT_QUOTES, 'UTF-8');
}

$mysql = new MySQL;
$mysql->conectar();

// Validar campos requeridos
$campos = ['id', 'nombreProducto', 'descripcion', 'estado'];
foreach ($campos as $campo) {
    if (!isset($_POST[$campo]) || $_POST[$campo] === '') {
        die("Error: El campo '$campo' es obligatorio.");
    }
}

$id = intval($_POST['id']);
$nombre = limpiarTexto($_POST['nombreProducto']);
$descripcion = limpiarTexto($_POST['descripcion']);
$estado = intval($_POST['estado']);

$foto_actual = $_POST['foto_actual'];
$nueva_foto = $foto_actual;

if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $permitidos = ['image/jpeg', 'image/png', 'image/jpg'];
    $tipo = mime_content_type($_FILES['foto']['tmp_name']);

    if (in_array($tipo, $permitidos)) {
        $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $nombre_unico = date("His") . microtime(true) . '.' . $ext;

        $ruta_relativa = 'fotos_productos/' . $nombre_unico;
        $ruta_absoluta = __DIR__ . '/../' . $ruta_relativa;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_absoluta)) {
            if (!empty($foto_actual) && file_exists('../' . $foto_actual)) {
                unlink('../' . $foto_actual);
            }
            $nueva_foto = $ruta_relativa;
        } else {
            die("Error al guardar la nueva imagen.");
        }
    } else {
        die("Formato de imagen no permitido.");
    }
}

// Actualizar producto
$consulta = "UPDATE productos SET 
    nombreProducto = '$nombre', 
    descripcion = '$descripcion',
    estado = $estado,
    foto = '$nueva_foto'
WHERE id = $id";

$mysql->efectuarConsulta($consulta);
$mysql->desconectar();

header("Location: ../views/dashboard.php");
exit;


<?php
require_once '../models/MySQL.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID inválido.");
}

$mysql = new MySQL;
$mysql->conectar();

$id = intval($_GET['id']);
$consulta = $mysql->efectuarConsulta("SELECT * FROM productos WHERE id = $id");
$producto = mysqli_fetch_assoc($consulta);
$mysql->desconectar();

if (!$producto) {
    die("Producto no encontrado.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card mx-auto shadow rounded-4" style="max-width: 700px;">
            <div class="card-body">
                <h3 class="text-center mb-4 text-warning">Editar Producto</h3>
                <form action="../controllers/actualizar_producto.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                    <input type="hidden" name="foto_actual" value="<?= $producto['foto'] ?>">

                    <div class="mb-3">
                        <label class="form-label">Nombre del Producto</label>
                        <input type="text" class="form-control" name="nombreProducto" value="<?= htmlspecialchars($producto['nombreProducto']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea class="form-control" name="descripcion" rows="4" required><?= htmlspecialchars($producto['descripcion']) ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Estado</label>
                        <select class="form-select" name="estado" required>
                            <option value="1" <?= $producto['estado'] == 1 ? 'selected' : '' ?>>Activo</option>
                            <option value="0" <?= $producto['estado'] == 0 ? 'selected' : '' ?>>Inactivo</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto actual</label><br>
                        <?php if (!empty($producto['foto'])): ?>
                            <img src="../<?= $producto['foto'] ?>" alt="Foto actual" class="img-thumbnail mb-2" width="150"><br>
                        <?php endif; ?>
                        <input type="file" class="form-control" name="foto" accept="image/*">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="dashboard.php" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


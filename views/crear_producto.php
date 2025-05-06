<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card mx-auto shadow rounded-4" style="max-width: 600px;">
            <div class="card-body">
                <h3 class="text-center mb-4 text-primary">Crear Nuevo Producto</h3>
                <form action="../controllers/crear_producto.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nombreProducto" class="form-label">Nombre del Producto</label>
                        <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="dashboard.php" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-success">Guardar Producto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>



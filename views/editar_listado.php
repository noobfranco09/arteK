<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
require_once '../models/MySQL.php';
$mysql = new MySQL;
$mysql->conectar();
$resultado = $mysql->efectuarConsulta("SELECT * FROM productos;");
$mysql->desconectar();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/estilos.css" rel="stylesheet">
</head>

<body>
    <header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Arte K - Dashboard</a>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="btn btn-success" href="../controllers/logout.php">Cerrar sesión</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <img src="../fotos_productos/LOGO.png" id="imagenLogo" alt="">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">
                                <i class="fas fa-tachometer-alt me-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="editar_listado.php">
                                <i class="fas fa-edit me-2"></i>
                                <strong>Editar Productos</strong>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="eliminar_listado.php">
                                <i class="fas fa-trash-alt me-2"></i>
                                Eliminar Productos
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="pt-3 pb-2 mb-3 border-bottom">
                    <h2>Listado para Editar Productos</h2>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover shadow rounded">
                        <thead style="background-color: #d1e7dd; color: #0f5132;">
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Foto</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($producto = mysqli_fetch_assoc($resultado)): ?>
                                <tr class="align-middle">
                                    <td class="text-center"><?= $producto['id']; ?></td>
                                    <td><?= htmlspecialchars($producto['nombreProducto']); ?></td>
                                    <td class="text-center">
                                        <img src="/Arte K/<?= htmlspecialchars($producto['foto']); ?>" width="80" class="img-thumbnail rounded shadow-sm">
                                    </td>
                                    <td class="text-center">
                                        <a href="editar_producto.php?id=<?= $producto['id']; ?>" class="btn btn-sm text-white" style="background-color: #0d6efd;">
                                            Editar
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>

                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
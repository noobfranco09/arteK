<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Aquí puedes continuar con el código del dashboard
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
    <title>Dashboard - Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../estilos.css" rel="stylesheet">
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
                            <a class="nav-link active" href="dashboard.php">
                                <i class="fas fa-tachometer-alt me-2"></i>
                                <strong>Dashboard</strong>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="editar_listado.php">
                                <i class="fas fa-edit me-2"></i>
                                Editar Productos
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


            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Welcome, <?php echo htmlspecialchars($_SESSION['usuario']); ?></h1>
                </div>

                <div class="container py-4">
                    <h1 class="text-center mb-4">Productos</h1>

                    <div class="d-flex justify-content-end mb-3">
                        <a href="crear_producto.php" class="btn btn-success">Crear Producto</a>
                    </div>

                    <?php if (mysqli_num_rows($resultado) > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover shadow rounded">
                                <thead style="background-color: #f8d7da; color: #6c0032;">
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                        <th>Foto</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($producto = mysqli_fetch_assoc($resultado)): ?>
                                        <tr class="align-middle">
                                            <td class="text-center"><?= $producto['id']; ?></td>
                                            <td><?= htmlspecialchars($producto['nombreProducto']); ?></td>
                                            <td><?= htmlspecialchars($producto['descripcion']); ?></td>
                                            <td class="text-center">
                                                <?= $producto['estado'] == 1
                                                    ? '<span class="badge rounded-pill bg-success px-3 py-2">Activo</span>'
                                                    : '<span class="badge rounded-pill bg-danger px-3 py-2">Inactivo</span>' ?>
                                            </td>
                                            <td class="text-center">
                                                <img src="/Arte K/<?= htmlspecialchars($producto['foto']); ?>" width="80" class="img-thumbnail rounded shadow-sm">
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-sm text-white" style="background-color: #ff914d;" onclick="confirmarDesactivacion(<?= $producto['id']; ?>)">
                                                    Desactivar
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>

                    <?php else: ?>
                        <div class="alert alert-info">No hay productos registrados.</div>
                    <?php endif; ?>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../app.js"></script>
</body>

</html>
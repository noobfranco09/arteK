function confirmarDesactivacion(id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "El producto se desactivará.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Sí, desactivar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirige al controlador PHP
            window.location.href = '../controllers/eliminar_producto.php?id=' + id;
        }
    });
}

function confirmarEliminacion(id) {
    Swal.fire({
        title: '¿Eliminar producto?',
        text: 'Esta acción no se puede deshacer.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '../controllers/eliminar_definitivo.php?id=' + id;
        }
    });
}
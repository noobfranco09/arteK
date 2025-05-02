<!-- pages/about.php -->
<?php
require_once '../config/config.php';
include '../includes/header.php';
include '../includes/navigation.php';
?>

<main class="container">
    <section id="about">
        <h2>Sobre ARTE-K</h2>
        <div class="about-content">
            <div class="about-image">
                <img src="<?php echo $imagesUrl; ?>/about-artisan.jpg" alt="Artesano de ARTE-K">
            </div>
            <div class="about-text">
                <h3>Nuestra Historia</h3>
                <p>ARTE-K nació de la pasión por preservar y celebrar el arte de la cerámica. Fundada por Damian Sanchez, nuestra empresa se dedica a la importación y restauración de piezas de cerámica, manteniendo vivas técnicas tradicionales mientras incorporamos innovaciones modernas.</p>
                
                <h3>Nuestra Misión</h3>
                <p>Nuestra misión es ofrecer productos de cerámica de la más alta calidad, respetando las tradiciones artesanales y apoyando a artesanos locales. Además, nos dedicamos a restaurar piezas valiosas, devolviéndoles su belleza original y preservando su valor histórico y sentimental.</p>
                
                <h3>Nuestro Compromiso</h3>
                <p>En ARTE-K, nos comprometemos con la excelencia en cada pieza que importamos o restauramos. Trabajamos con materiales de primera calidad y técnicas probadas que garantizan resultados excepcionales para nuestros clientes.</p>
            </div>
        </div>
    </section>
</main>

<?php include '../includes/whatsapp-button.php'; ?>
<?php include '../includes/footer.php'; ?>
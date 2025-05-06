<?php
require_once __DIR__ . '/../controllers/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($siteDescription); ?>">
    <meta name="author" content="<?php echo htmlspecialchars($siteAuthor); ?>">
    <title><?php echo htmlspecialchars($siteName); ?> - <?php echo htmlspecialchars($siteDescription); ?></title>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($assetsUrl); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo htmlspecialchars($assetsUrl); ?>/css/product-card.css">
    <link rel="stylesheet" href="<?php echo htmlspecialchars($assetsUrl); ?>/css/modal.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">
            <img src="<?php echo htmlspecialchars($imagesUrl); ?>/logoT.png" alt="<?php echo htmlspecialchars($siteName); ?>" class="logo">
        </div>
    </header>

    <nav>
        <div class="container">
            <ul>
                <li><a href="/arteK/views/index.php">Inicio</a></li>
                <li><a href="/arteK/views/productos.php">Productos</a></li>
                <li><a href="/arteK/views/aboutUs.php">Nosotros</a></li>
                <li><a href="/arteK/views/contacto.php">Contacto</a></li>
            </ul>
        </div>
    </nav>   
    <main class="container">
        <section id="about">
            <h2>Sobre ARTE-K</h2>
            <div class="about-content">
                <div class="about-text">
                    <h1>Nuestra Historia</h1>
                    <p>ARTE-K nació de la pasión por preservar y celebrar el arte de la cerámica. Fundada por Damian Sanchez, nuestra empresa se dedica a la importación y restauración de piezas de cerámica, manteniendo vivas técnicas tradicionales mientras incorporamos innovaciones modernas.</p>
                    
                    <h2>Nuestra Misión</h2>
                    <p>Es una empresa que se dedica al mejoramiento y embellecimiento de espacios, vivienda, oficinas, iglesias, jardines y como complemento darle una emoción nueva a cada persona que adquiera una experiencia con la pieza...</p>
                    
                    <h2>Nuestra Visión</h2>
                    <p>En aproximadamente 5 años veo un crecimiento laboral y profesional motivando a los consumidores que se enamoren más de nosotros con nuestro portafolio de productos innovadores...</p>
                    
                    <h2>Objetivos corporativos</h2>
                    <ul>
                        <li>Satisfacer al cliente con productos de calidad según sus necesidades.</li>
                        <li>Innovar combinando lo antiguo con lo moderno para mantenerse competitiva.</li>
                        <li>Actuar con responsabilidad social y ambiental.</li>
                        <li>Expandir su cuota de mercado.</li>
                        <li>Crear productos únicos y auténticos.</li>
                        <li>Preservar las técnicas tradicionales.</li>
                        <li>Garantizar una alta calidad en cada detalle.</li>
                    </ul>
                    
                    <h2>Políticas</h2>
                    <p>Nos basamos en mantener la calidad del producto hecho a mano, promover técnicas tradicionales, fomentar la sostenibilidad...</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
    <div class="container footer-container">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="<?php echo htmlspecialchars($imagesUrl); ?>/logo.png" alt="<?php echo htmlspecialchars($siteName); ?>" class="logo-small">
                <p><?php echo htmlspecialchars($siteName); ?> - <?php echo htmlspecialchars($siteDescription); ?></p>
            </div>
            <div class="footer-contact">
                <h3>Contacto</h3>
                <p><strong>WhatsApp:</strong> <?php echo htmlspecialchars(formatPhoneNumber($whatsappNumber)); ?></p>
                <p><strong>Email:</strong> <a href="mailto:<?php echo htmlspecialchars($emailContact); ?>"><?php echo htmlspecialchars($emailContact); ?></a></p>
            </div>
            <div class="footer-social">
                <h3>Síguenos</h3>
                <div class="social-icons">
                <a href="#" class="social-icon">
            <img src="<?php echo htmlspecialchars($imagesUrl); ?>/social.png" alt="Instagram" class="footer-icon">        </a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($siteName); ?>. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>
            <div class="footer-copyright">
                <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($siteName); ?>. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
    <button id="backToTop" class="back-to-top">↑</button>
    <script>
    const backToTop = document.getElementById('backToTop');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            backToTop.style.display = 'block';
        } else {
            backToTop.style.display = 'none';
        }
    });

    backToTop.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>
<script>
    const sections = document.querySelectorAll('section');
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1 });

    sections.forEach(section => observer.observe(section));
</script>
    <script src="<?php echo htmlspecialchars($assetsUrl); ?>/js/main.js"></script>
</body>
</html>
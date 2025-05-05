<?php
require_once __DIR__ . '/../controllers/config.php';
require_once __DIR__ . '/../functions/funcionProductos.php';
require_once __DIR__ . '/../productos.php'; // Incluye las variables $categories y $products
?>
<!DOCTYPE html>
<html lang="es">
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
            <img src="<?php echo htmlspecialchars($imagesUrl); ?>/logo.png" alt="<?php echo htmlspecialchars($siteName); ?>" class="logo">
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
        
        
        <section id="products">
            <h2 class="products-title">Nuestros Productos</h2>
            <div class="category-tabs">
                <div class="category-tab active" data-category="all">Todos</div>
                <?php $categories = $categories ?? []; ?>
                <?php foreach ($categories as $category): ?>
                    <div class="category-tab" data-category="<?php echo htmlspecialchars($category); ?>">
                        <?php echo htmlspecialchars($category); ?>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="products-grid">
                <?php $products = $products ?? []; ?>
                <?php foreach ($products as $product): ?>
                <div class="product-card" data-category="<?php echo htmlspecialchars($product['category']); ?>" data-id="<?php echo $product['id']; ?>">
                    <img class="product-image" src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <div class="product-info">
                        <div class="product-name"><?php echo htmlspecialchars($product['name']); ?></div>
                        <div class="product-price"><?php echo htmlspecialchars($product['price']); ?></div>
                        <div class="product-description"><?php echo htmlspecialchars($product['short_description']); ?></div>
                    </div>
                </div>
                <?php endforeach; ?>
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
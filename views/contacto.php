<?php
require_once '../controllers/config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($assetsUrl); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo htmlspecialchars($assetsUrl); ?>/css/product-card.css">
    <link rel="stylesheet" href="<?php echo htmlspecialchars($assetsUrl); ?>/css/modal.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body class="contact-page">
<header>
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
    <section id="contact">
        <h2>Contacto</h2>
        <div class="contact-content">
            <div class="contact-info">
                <h3>Información de Contacto</h3>
                <p><strong><img src="<?php echo $imagesUrl; ?>/whatsapp-icon.png" alt="WhatsApp" style="width: 20px;"> WhatsApp:</strong> <?php echo $whatsappNumber; ?></p>
                <p><strong><img src="<?php echo $imagesUrl; ?>/email-icon.png" alt="Email" style="width: 20px;"> Email:</strong> <?php echo $emailContact; ?></p>
                <p><strong>Horario de Atención:</strong> Lunes a Viernes de 9:00 a 18:00</p>
                
                <div class="contact-social">
                    <h3>Síguenos en Redes Sociales</h3>
                    <div class="social-icons">
                    <a href="#" class="social-icon" title="Instagram">
    <img src="<?php echo $imagesUrl; ?>/social.png" alt="Instagram" style="width: 40px; height: 40px; border-radius: 50%;">
</a>
                    </div>
                </div>
            </div>
            
            <div class="contact-message">
                <h3>¡Contáctanos Ahora!</h3>
                <p>¿Tienes alguna pregunta? Estamos aquí para ayudarte. Escríbenos directamente por WhatsApp.</p>
                <a href="https://wa.me/<?php echo $whatsappNumber; ?>" class="whatsapp-button" target="_blank">Enviar Mensaje</a>
                <form action="/arteK/controllers/contact-form.php" method="POST" class="contact-form">
    <input type="text" name="name" placeholder="Tu Nombre" required>
    <input type="email" name="email" placeholder="Tu Email" required>
    <textarea name="message" placeholder="Tu Mensaje" rows="4" required></textarea>
    <button type="submit" class="submit-button">Enviar</button>
</form>
            </div>
        </div>
    </section>
</main>

<footer>
    <p>&copy; 2025 ArteK. Todos los derechos reservados.</p>
</footer>
</body>
</html>
</html>
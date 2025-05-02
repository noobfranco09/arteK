<?php
require_once '../config/config.php';
include '../includes/header.php';
include '../includes/navigation.php';
?>

<main class="container">
    <section id="contact">
        <h2>Contacto</h2>
        <div class="contact-content">
            <div class="contact-info">
                <h3>Información de Contacto</h3>
                <p><strong>WhatsApp:</strong> <?php echo formatPhoneNumber($whatsappNumber); ?></p>
                <p><strong>Email:</strong> <?php echo $emailContact; ?></p>
                <p><strong>Horario de Atención:</strong> Lunes a Viernes de 9:00 a 18:00</p>
                
                <div class="contact-social">
                    <h3>Síguenos en Redes Sociales</h3>
                    <div class="social-icons">
                        <a href="#" class="social-icon" title="Facebook">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                            </svg>
                        </a>
                        <a href="#" class="social-icon" title="Instagram">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="contact-message">
                <h3>Envíanos un Mensaje</h3>
                <p>Puedes contactarnos directamente por WhatsApp haciendo clic en el botón flotante que aparece en la esquina inferior derecha de la pantalla.</p>
            </div>
        </div>
    </section>
</main>

<?php include '../includes/whatsapp-button.php'; ?>
<?php include '../includes/footer.php'; ?>
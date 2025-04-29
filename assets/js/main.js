document.addEventListener('DOMContentLoaded', function() {
    // Inicializar módulos
    console.log('ARTE-K - Sitio web cargado correctamente');
    
    // Detectar si es móvil para ajustes específicos
    const isMobile = window.innerWidth <= 768;
    
    // Efectos de transición para elementos de la página
    const animateElements = document.querySelectorAll('.product-card, .category-tab, h2');
    
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });
        
        animateElements.forEach(el => {
            el.classList.add('animate-ready');
            observer.observe(el);
        });
    } else {
        // Fallback para navegadores sin soporte
        animateElements.forEach(el => el.classList.add('animate-in'));
    }
    
    // Manejar eventos de redimensionamiento
    window.addEventListener('resize', function() {
        // Ajustes específicos si es necesario
    });
});

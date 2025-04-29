document.addEventListener('DOMContentLoaded', function() {
    // Filtrado por categorías
    const categoryTabs = document.querySelectorAll('.category-tab');
    const productCards = document.querySelectorAll('.product-card');
    
    categoryTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            // Marcar la pestaña activa
            categoryTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            
            // Filtrar productos con animación
            productCards.forEach(card => {
                // Aplicar fade out primero
                card.style.opacity = '0';
                card.style.transform = 'scale(0.95)';
                
                setTimeout(() => {
                    if (category === 'all' || card.getAttribute('data-category') === category) {
                        card.style.display = 'block';
                        // Luego fade in
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'scale(1)';
                        }, 50);
                    } else {
                        card.style.display = 'none';
                    }
                }, 300);
            });
        });
    });
});
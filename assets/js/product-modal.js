document.addEventListener('DOMContentLoaded', function() {
    // Modal de productos
    const modal = document.getElementById('productModal');
    const closeModal = document.querySelector('.close-modal');
    const productCards = document.querySelectorAll('.product-card');
    const modalProductName = document.getElementById('modalProductName');
    const modalProductImage = document.getElementById('modalProductImage');
    const modalProductPrice = document.getElementById('modalProductPrice');
    const modalProductDescription = document.getElementById('modalProductDescription');
    
    // Obtener el array de productos desde PHP
    let products = [];
    
    // Intentar obtener productos si están disponibles globalmente
    if (typeof window.productsData !== 'undefined') {
        products = window.productsData;
    }
    
    // Función para abrir modal
    function openModal(productId) {
        // Buscar el producto por ID
        const productData = products.find(p => p.id == productId);
        
        if (productData) {
            modalProductName.textContent = productData.name;
            modalProductImage.src = productData.image_large || productData.image;
            modalProductImage.alt = productData.name;
            modalProductPrice.textContent = productData.price;
            modalProductDescription.textContent = productData.full_description;
            
            // Mostrar modal con animación
            modal.style.display = 'flex';
            setTimeout(() => {
                modal.classList.add('show');
            }, 10);
            
            // Bloquear scroll del body
            document.body.style.overflow = 'hidden';
        }
    }
    
    // Función para cerrar modal
    function closeModalFunc() {
        modal.classList.remove('show');
        setTimeout(() => {
            modal.style.display = 'none';
        }, 300);
        
        // Restaurar scroll
        document.body.style.overflow = '';
    }
    
    // Abrir modal al hacer clic en un producto
    productCards.forEach(card => {
        card.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            openModal(productId);
        });
    });
    
    // Cerrar modal con botón X
    closeModal.addEventListener('click', closeModalFunc);
    
    // Cerrar modal al hacer clic fuera del contenido
    modal.addEventListener('click', function(event) {
        if (event.target === modal) {
            closeModalFunc();
        }
    });
    
    // Cerrar modal con tecla ESC
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && modal.style.display === 'flex') {
            closeModalFunc();
        }
    });
});
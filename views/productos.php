<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<section id="products">
    <h2>Nuestros Productos</h2>
    
    <!-- Pestañas de categorías -->
    <div class="category-tabs">
        <div class="category-tab active" data-category="all">Todos</div>
        <?php foreach ($categories as $category): ?>
            <div class="category-tab" data-category="<?php echo htmlspecialchars($category); ?>">
                <?php echo htmlspecialchars($category); ?>
            </div>
        <?php endforeach; ?>
    </div>
    
    <!-- Productos -->
    <div class="products-grid">
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
</body>
</html>
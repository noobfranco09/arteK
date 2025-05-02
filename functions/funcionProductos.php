
<?php

function getAllProducts() {
    global $products;
    return $products;
}


function getProductsByCategory($category) {
    global $products;
    return array_filter($products, function($product) use ($category) {
        return $product['category'] === $category;
    });
}


function getProductById($id) {
    global $products;
    foreach ($products as $product) {
        if ($product['id'] == $id) {
            return $product;
        }
    }
    return null;
}



function formatPhoneNumber($phone) {
    // Eliminar caracteres no numéricos
    $phone = preg_replace('/[^0-9]/', '', $phone);
    
    // Formato para Colombia
    if (strlen($phone) == 10) {
        // Número local
        return '(' . substr($phone, 0, 3) . ') ' . substr($phone, 3, 3) . '-' . substr($phone, 6);
    } elseif (strlen($phone) > 10) {

        return '+' . substr($phone, 0, strlen($phone) - 10) . ' (' . 
               substr($phone, -10, 3) . ') ' . 
               substr($phone, -7, 3) . '-' . 
               substr($phone, -4);
    }
    
    return $phone;
}
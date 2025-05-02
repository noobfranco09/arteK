<?php
// Configuración del sitio
$siteName = "Arte K";
$siteDescription = "transformamos cada grieta";
$siteAuthor = "asp";

// Configuración de contacto
$whatsappNumber = "123456789"; // Reemplazar con el número real

// Configuración de base de datos (si se usa en el futuro)
$dbHost = "localhost";
//$dbUser = "usuario";
//$dbPass = "contraseña";
//$dbName = "arte_k_db";
$emailContact = $emailContact ?? 'correo@ejemplo.com';


// Categorías de productos
$categories = ["Cerámica", "Restauración", "Decoración"];

// Configuración de rutas y URLs
$baseUrl = "http://localhost/arteK"; 
$assetsUrl = $baseUrl . "/assets";
$imagesUrl = $assetsUrl . "/img";
$productsImagesUrl = $imagesUrl . "/products";

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="description" content="Dulces Regionales Doña Solina">
    <meta name="keywords" content="Dulces Regionales Doña Solina,Dulces Regionales,Dulces">
    <meta name="author" content="Dulces Regionales Doña Solina-RisterTech">
    <title>Dulces Regionales Doña Solina</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" href="/dulces_regionales/imagenes/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/dulces_regionales/assets/css/global.css">
    <?php
    $viewController = isset($_GET['controller']) ? $_GET['controller'] : 'auth';
    $cssFile = "/dulces_regionales/assets/css/views/{$viewController}.css";
    ?>
    <link rel="stylesheet" href="<?php echo $cssFile; ?>">
</head>

<body>
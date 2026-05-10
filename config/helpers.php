<?php

function sessionStart() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

function isLoggedIn() {
    return isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']);
}

function isAdmin() {
    return isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin';
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: /dulces_regionales/index.php?controller=auth&action=login');
        exit;
    }
}

function requireAdmin() {
    requireLogin();
    if (!isAdmin()) {
        header('Location: /dulces_regionales/index.php?controller=home&action=dashboard');
        exit;
    }
}

function redirect($url) {
    header("Location: /dulces_regionales/$url");
    exit;
}

function flash($key, $message, $type = 'info') {
    $_SESSION['flash'][$key] = ['message' => $message, 'type' => $type];
}

function getFlash($key) {
    if (isset($_SESSION['flash'][$key])) {
        $flash = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]);
        return $flash;
    }
    return null;
}

function sanitize($data) {
    if (is_array($data)) {
        return array_map('sanitize', $data);
    }
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

function formatCurrency($amount) {
    return 'S/ ' . number_format($amount, 2);
}

function getStatusClass($status) {
    $classes = [
        'pendiente' => 'warning',
        'pagado' => 'info',
        'enviado' => 'primary',
        'entregado' => 'success',
        'cancelado' => 'danger'
    ];
    return $classes[$status] ?? 'secondary';
}
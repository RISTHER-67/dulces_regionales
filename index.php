<?php

require_once 'config/database.php';
require_once 'config/helpers.php';
require_once 'model/Usuario.php';
require_once 'model/Cliente.php';
require_once 'model/ProductoRegional.php';
require_once 'model/Pedido.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'auth';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

$controllerFile = 'controller/' . ucfirst($controller) . 'Controller.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerName = ucfirst($controller) . 'Controller';
    $obj = new $controllerName();
    
    if (method_exists($obj, $action)) {
        $obj->$action();
    } else {
        http_response_code(404);
        echo "<h1>404 - Página no encontrada</h1>";
        echo "<p>La acción '$action' no existe en el controlador '$controllerName'.</p>";
        echo "<a href='/dulces_regionales/index.php?controller=home&action=dashboard'>Volver al inicio</a>";
    }
} else {
    http_response_code(404);
    echo "<h1>404 - Página no encontrada</h1>";
    echo "<p>El controlador '$controller' no existe.</p>";
    echo "<a href='/dulces_regionales/index.php?controller=auth&action=login'>Ir al login</a>";
}
<?php

class AuthController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
        sessionStart();
    }

    public function login() {
        if (isLoggedIn()) {
            redirect('index.php?controller=home&action=dashboard');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = sanitize($_POST['correo']);
            $contrasena = $_POST['contrasena'];

            if (empty($correo) || empty($contrasena)) {
                flash('error', 'Por favor complete todos los campos');
                redirect('index.php?controller=auth&action=login');
            }

            $user = $this->usuarioModel->login($correo, $contrasena);

            if ($user) {
                $_SESSION['id_usuario'] = $user['id_usuario'];
                $_SESSION['nombre_usuario'] = $user['nombre_usuario'];
                $_SESSION['correo'] = $user['correo'];
                $_SESSION['rol'] = $user['rol'];

                flash('success', 'Bienvenido ' . $user['nombre_usuario']);
                redirect('index.php?controller=home&action=dashboard');
            } else {
                flash('error', 'Credenciales incorrectas');
                redirect('index.php?controller=auth&action=login');
            }
        }

        require_once 'views/auth/login.php';
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        flash('success', 'Sesión cerrada correctamente');
        redirect('index.php?controller=auth&action=login');
    }
}
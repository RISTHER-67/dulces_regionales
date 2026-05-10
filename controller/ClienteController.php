<?php

class ClienteController {
    private $clienteModel;

    public function __construct() {
        sessionStart();
        requireLogin();
        $this->clienteModel = new Cliente();
    }

    public function index() {
        $search = isset($_GET['search']) ? sanitize($_GET['search']) : '';
        $clientes = $this->clienteModel->getAll($search);
        require_once 'views/clientes/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nombre' => sanitize($_POST['nombre']),
                'apellido' => sanitize($_POST['apellido']),
                'dni' => sanitize($_POST['dni']),
                'telefono' => sanitize($_POST['telefono']),
                'direccion' => sanitize($_POST['direccion']),
                'correo' => sanitize($_POST['correo'])
            ];

            if (empty($data['nombre']) || empty($data['apellido']) || empty($data['dni'])) {
                flash('error', 'Los campos nombre, apellido y DNI son obligatorios');
                redirect('index.php?controller=cliente&action=create');
            }

            if ($this->clienteModel->create($data)) {
                flash('success', 'Cliente registrado correctamente');
                redirect('index.php?controller=cliente&action=index');
            } else {
                flash('error', 'Error al registrar el cliente');
                redirect('index.php?controller=cliente&action=create');
            }
        }

        require_once 'views/clientes/create.php';
    }

    public function edit() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $cliente = $this->clienteModel->getById($id);

        if (!$cliente) {
            flash('error', 'Cliente no encontrado');
            redirect('index.php?controller=cliente&action=index');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nombre' => sanitize($_POST['nombre']),
                'apellido' => sanitize($_POST['apellido']),
                'dni' => sanitize($_POST['dni']),
                'telefono' => sanitize($_POST['telefono']),
                'direccion' => sanitize($_POST['direccion']),
                'correo' => sanitize($_POST['correo'])
            ];

            if ($this->clienteModel->update($id, $data)) {
                flash('success', 'Cliente actualizado correctamente');
                redirect('index.php?controller=cliente&action=index');
            } else {
                flash('error', 'Error al actualizar el cliente');
                redirect('index.php?controller=cliente&action=edit&id=' . $id);
            }
        }

        require_once 'views/clientes/edit.php';
    }

    public function show() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $cliente = $this->clienteModel->getById($id);

        if (!$cliente) {
            flash('error', 'Cliente no encontrado');
            redirect('index.php?controller=cliente&action=index');
        }

        require_once 'views/clientes/show.php';
    }

    public function delete() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        if ($this->clienteModel->delete($id)) {
            flash('success', 'Cliente eliminado correctamente');
        } else {
            flash('error', 'Error al eliminar el cliente');
        }

        redirect('index.php?controller=cliente&action=index');
    }
}
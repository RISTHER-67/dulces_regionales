<?php

class PedidoController {
    private $pedidoModel;

    public function __construct() {
        sessionStart();
        requireLogin();
        $this->pedidoModel = new Pedido();
    }

    public function index() {
        $search = isset($_GET['search']) ? sanitize($_GET['search']) : '';
        $pedidos = $this->pedidoModel->getAll($search);
        require_once 'views/pedidos/index.php';
    }

    public function create() {
        $clientes = $this->pedidoModel->getClientes();
        $productos = $this->pedidoModel->getProductos();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id_cliente' => sanitize($_POST['id_cliente']),
                'id_producto' => sanitize($_POST['id_producto']),
                'cantidad' => sanitize($_POST['cantidad'])
            ];

            if (empty($data['id_cliente']) || empty($data['id_producto']) || empty($data['cantidad'])) {
                flash('error', 'Todos los campos son obligatorios');
                redirect('index.php?controller=pedido&action=create');
            }

            if ($data['cantidad'] < 1) {
                flash('error', 'La cantidad debe ser mayor a 0');
                redirect('index.php?controller=pedido&action=create');
            }

            if ($this->pedidoModel->create($data)) {
                flash('success', 'Pedido registrado correctamente');
                redirect('index.php?controller=pedido&action=index');
            } else {
                flash('error', 'Error al registrar el pedido. Verifique que haya stock disponible');
                redirect('index.php?controller=pedido&action=create');
            }
        }

        require_once 'views/pedidos/create.php';
    }

    public function edit() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $pedido = $this->pedidoModel->getById($id);

        if (!$pedido) {
            flash('error', 'Pedido no encontrado');
            redirect('index.php?controller=pedido&action=index');
        }

        $clientes = $this->pedidoModel->getClientes();
        $productos = $this->pedidoModel->getProductos();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id_cliente' => sanitize($_POST['id_cliente']),
                'id_producto' => sanitize($_POST['id_producto']),
                'cantidad' => sanitize($_POST['cantidad']),
                'estado_pedido' => sanitize($_POST['estado_pedido'])
            ];

            if ($this->pedidoModel->update($id, $data)) {
                flash('success', 'Pedido actualizado correctamente');
                redirect('index.php?controller=pedido&action=index');
            } else {
                flash('error', 'Error al actualizar el pedido');
                redirect('index.php?controller=pedido&action=edit&id=' . $id);
            }
        }

        require_once 'views/pedidos/edit.php';
    }

    public function show() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $pedido = $this->pedidoModel->getById($id);

        if (!$pedido) {
            flash('error', 'Pedido no encontrado');
            redirect('index.php?controller=pedido&action=index');
        }

        require_once 'views/pedidos/show.php';
    }

    public function delete() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        if ($this->pedidoModel->delete($id)) {
            flash('success', 'Pedido eliminado correctamente');
        } else {
            flash('error', 'Error al eliminar el pedido');
        }

        redirect('index.php?controller=pedido&action=index');
    }

    public function updateStatus() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $estado = isset($_GET['estado']) ? sanitize($_GET['estado']) : '';

        if ($this->pedidoModel->updateStatus($id, $estado)) {
            flash('success', 'Estado actualizado correctamente');
        } else {
            flash('error', 'Error al actualizar el estado');
        }

        redirect('index.php?controller=pedido&action=index');
    }
}
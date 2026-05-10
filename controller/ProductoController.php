<?php

class ProductoController {
    private $productoModel;

    public function __construct() {
        sessionStart();
        requireLogin();
        $this->productoModel = new ProductoRegional();
    }

    public function index() {
        $search = isset($_GET['search']) ? sanitize($_GET['search']) : '';
        $productos = $this->productoModel->getAll($search);
        require_once 'views/productos/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nombre_producto' => sanitize($_POST['nombre_producto']),
                'categoria' => sanitize($_POST['categoria']),
                'region_origen' => sanitize($_POST['region_origen']),
                'precio' => sanitize($_POST['precio']),
                'stock' => sanitize($_POST['stock']),
                'descripcion' => sanitize($_POST['descripcion'])
            ];

            if (empty($data['nombre_producto']) || empty($data['categoria']) || empty($data['precio'])) {
                flash('error', 'Los campos nombre, categoría y precio son obligatorios');
                redirect('index.php?controller=producto&action=create');
            }

            if ($this->productoModel->create($data)) {
                flash('success', 'Producto registrado correctamente');
                redirect('index.php?controller=producto&action=index');
            } else {
                flash('error', 'Error al registrar el producto');
                redirect('index.php?controller=producto&action=create');
            }
        }

        require_once 'views/productos/create.php';
    }

    public function edit() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $producto = $this->productoModel->getById($id);

        if (!$producto) {
            flash('error', 'Producto no encontrado');
            redirect('index.php?controller=producto&action=index');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nombre_producto' => sanitize($_POST['nombre_producto']),
                'categoria' => sanitize($_POST['categoria']),
                'region_origen' => sanitize($_POST['region_origen']),
                'precio' => sanitize($_POST['precio']),
                'stock' => sanitize($_POST['stock']),
                'descripcion' => sanitize($_POST['descripcion'])
            ];

            if ($this->productoModel->update($id, $data)) {
                flash('success', 'Producto actualizado correctamente');
                redirect('index.php?controller=producto&action=index');
            } else {
                flash('error', 'Error al actualizar el producto');
                redirect('index.php?controller=producto&action=edit&id=' . $id);
            }
        }

        require_once 'views/productos/edit.php';
    }

    public function show() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $producto = $this->productoModel->getById($id);

        if (!$producto) {
            flash('error', 'Producto no encontrado');
            redirect('index.php?controller=producto&action=index');
        }

        require_once 'views/productos/show.php';
    }

    public function delete() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        if ($this->productoModel->delete($id)) {
            flash('success', 'Producto eliminado correctamente');
        } else {
            flash('error', 'Error al eliminar el producto');
        }

        redirect('index.php?controller=producto&action=index');
    }
}
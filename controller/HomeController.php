<?php

class HomeController {
    private $clienteModel;
    private $productoModel;
    private $pedidoModel;

    public function __construct() {
        sessionStart();
        requireLogin();
        $this->clienteModel = new Cliente();
        $this->productoModel = new ProductoRegional();
        $this->pedidoModel = new Pedido();
    }

    public function dashboard() {
        $totalClientes = $this->clienteModel->getTotal();
        $totalProductos = $this->productoModel->getTotal();
        $totalPedidos = $this->pedidoModel->getTotal();
        $productosLowStock = $this->productoModel->getLowStock(10);
        $pedidosRecientes = $this->pedidoModel->getRecent(5);

        require_once 'views/home/dashboard.php';
    }
}
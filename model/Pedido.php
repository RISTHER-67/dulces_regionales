<?php

class Pedido {
    private $db;

    public function __construct() {
        $this->db = getDB();
    }

    public function getAll($search = '') {
        if ($search) {
            $stmt = $this->db->prepare("
                SELECT p.*, c.nombre as cliente_nombre, c.apellido as cliente_apellido, pr.nombre_producto 
                FROM pedido p
                JOIN cliente c ON p.id_cliente = c.id_cliente
                JOIN producto_regional pr ON p.id_producto = pr.id_producto
                WHERE c.nombre LIKE ? OR c.apellido LIKE ? OR pr.nombre_producto LIKE ?
                ORDER BY p.id_pedido DESC
            ");
            $searchTerm = "%$search%";
            $stmt->execute([$searchTerm, $searchTerm, $searchTerm]);
        } else {
            $stmt = $this->db->query("
                SELECT p.*, c.nombre as cliente_nombre, c.apellido as cliente_apellido, pr.nombre_producto 
                FROM pedido p
                JOIN cliente c ON p.id_cliente = c.id_cliente
                JOIN producto_regional pr ON p.id_producto = pr.id_producto
                ORDER BY p.id_pedido DESC
            ");
        }
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->db->prepare("
            SELECT p.*, c.nombre as cliente_nombre, c.apellido as cliente_apellido, c.dni as cliente_dni, c.telefono as cliente_telefono,
                   pr.nombre_producto, pr.precio as precio_unitario
            FROM pedido p
            JOIN cliente c ON p.id_cliente = c.id_cliente
            JOIN producto_regional pr ON p.id_producto = pr.id_producto
            WHERE p.id_pedido = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $productoModel = new ProductoRegional();
        $producto = $productoModel->getById($data['id_producto']);

        if (!$producto || $producto['stock'] < $data['cantidad']) {
            return false;
        }

        $total = $producto['precio'] * $data['cantidad'];

        $stmt = $this->db->prepare("INSERT INTO pedido (id_cliente, id_producto, fecha_pedido, cantidad, total, estado_pedido) VALUES (?, ?, NOW(), ?, ?, 'pendiente')");
        $result = $stmt->execute([
            $data['id_cliente'],
            $data['id_producto'],
            $data['cantidad'],
            $total
        ]);

        if ($result) {
            $productoModel->updateStock($data['id_producto'], $data['cantidad']);
        }

        return $result;
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE pedido SET id_cliente = ?, id_producto = ?, cantidad = ?, estado_pedido = ? WHERE id_pedido = ?");
        return $stmt->execute([
            $data['id_cliente'],
            $data['id_producto'],
            $data['cantidad'],
            $data['estado_pedido'],
            $id
        ]);
    }

    public function updateStatus($id, $estado) {
        $stmt = $this->db->prepare("UPDATE pedido SET estado_pedido = ? WHERE id_pedido = ?");
        return $stmt->execute([$estado, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM pedido WHERE id_pedido = ?");
        return $stmt->execute([$id]);
    }

    public function getTotal() {
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM pedido");
        return $stmt->fetch()['total'];
    }

    public function getRecent($limit = 5) {
        $stmt = $this->db->prepare("
            SELECT p.*, c.nombre as cliente_nombre, c.apellido as cliente_apellido, pr.nombre_producto
            FROM pedido p
            JOIN cliente c ON p.id_cliente = c.id_cliente
            JOIN producto_regional pr ON p.id_producto = pr.id_producto
            ORDER BY p.fecha_pedido DESC
            LIMIT ?
        ");
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getClientes() {
        $stmt = $this->db->query("SELECT id_cliente, nombre, apellido, dni FROM cliente ORDER BY nombre");
        return $stmt->fetchAll();
    }

    public function getProductos() {
        $stmt = $this->db->query("SELECT id_producto, nombre_producto, precio, stock, categoria FROM producto_regional WHERE stock > 0 ORDER BY nombre_producto");
        return $stmt->fetchAll();
    }
}
<?php

class ProductoRegional {
    private $db;

    public function __construct() {
        $this->db = getDB();
    }

    public function getAll($search = '') {
        if ($search) {
            $stmt = $this->db->prepare("SELECT * FROM producto_regional WHERE nombre_producto LIKE ? OR categoria LIKE ? ORDER BY id_producto DESC");
            $searchTerm = "%$search%";
            $stmt->execute([$searchTerm, $searchTerm]);
        } else {
            $stmt = $this->db->query("SELECT * FROM producto_regional ORDER BY id_producto DESC");
        }
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM producto_regional WHERE id_producto = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO producto_regional (nombre_producto, categoria, region_origen, precio, stock, descripcion) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['nombre_producto'],
            $data['categoria'],
            $data['region_origen'],
            $data['precio'],
            $data['stock'],
            $data['descripcion']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE producto_regional SET nombre_producto = ?, categoria = ?, region_origen = ?, precio = ?, stock = ?, descripcion = ? WHERE id_producto = ?");
        return $stmt->execute([
            $data['nombre_producto'],
            $data['categoria'],
            $data['region_origen'],
            $data['precio'],
            $data['stock'],
            $data['descripcion'],
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM producto_regional WHERE id_producto = ?");
        return $stmt->execute([$id]);
    }

    public function getTotal() {
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM producto_regional");
        return $stmt->fetch()['total'];
    }

    public function getLowStock($limit = 10) {
        $stmt = $this->db->prepare("SELECT * FROM producto_regional WHERE stock < ? ORDER BY stock ASC");
        $stmt->execute([$limit]);
        return $stmt->fetchAll();
    }

    public function updateStock($id, $cantidad) {
        $stmt = $this->db->prepare("UPDATE producto_regional SET stock = stock - ? WHERE id_producto = ? AND stock >= ?");
        return $stmt->execute([$cantidad, $id, $cantidad]);
    }
}
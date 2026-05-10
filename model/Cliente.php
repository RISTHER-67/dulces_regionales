<?php

class Cliente {
    private $db;

    public function __construct() {
        $this->db = getDB();
    }

    public function getAll($search = '') {
        if ($search) {
            $stmt = $this->db->prepare("SELECT * FROM cliente WHERE nombre LIKE ? OR apellido LIKE ? OR dni LIKE ? ORDER BY id_cliente DESC");
            $searchTerm = "%$search%";
            $stmt->execute([$searchTerm, $searchTerm, $searchTerm]);
        } else {
            $stmt = $this->db->query("SELECT * FROM cliente ORDER BY id_cliente DESC");
        }
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM cliente WHERE id_cliente = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO cliente (nombre, apellido, dni, telefono, direccion, correo) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['nombre'],
            $data['apellido'],
            $data['dni'],
            $data['telefono'],
            $data['direccion'],
            $data['correo']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE cliente SET nombre = ?, apellido = ?, dni = ?, telefono = ?, direccion = ?, correo = ? WHERE id_cliente = ?");
        return $stmt->execute([
            $data['nombre'],
            $data['apellido'],
            $data['dni'],
            $data['telefono'],
            $data['direccion'],
            $data['correo'],
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM cliente WHERE id_cliente = ?");
        return $stmt->execute([$id]);
    }

    public function getTotal() {
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM cliente");
        return $stmt->fetch()['total'];
    }
}
<?php

class Usuario {
    private $db;

    public function __construct() {
        $this->db = getDB();
    }

    public function login($correo, $contrasena) {
        $stmt = $this->db->prepare("SELECT * FROM usuario WHERE correo = ? AND estado = 'activo'");
        $stmt->execute([$correo]);
        $user = $stmt->fetch();

        if ($user && $contrasena === $user['contrasena']) {
            return $user;
        }
        return false;
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT id_usuario, nombre_usuario, correo, rol, estado FROM usuario WHERE id_usuario = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($nombre_usuario, $correo, $contrasena, $rol = 'usuario') {
        $hash = password_hash($contrasena, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO usuario (nombre_usuario, correo, contrasena, rol, estado) VALUES (?, ?, ?, ?, 'activo')");
        return $stmt->execute([$nombre_usuario, $correo, $hash, $rol]);
    }

    public function update($id, $nombre_usuario, $correo, $rol, $estado) {
        $stmt = $this->db->prepare("UPDATE usuario SET nombre_usuario = ?, correo = ?, rol = ?, estado = ? WHERE id_usuario = ?");
        return $stmt->execute([$nombre_usuario, $correo, $rol, $estado, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM usuario WHERE id_usuario = ?");
        return $stmt->execute([$id]);
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT id_usuario, nombre_usuario, correo, rol, estado FROM usuario ORDER BY id_usuario DESC");
        return $stmt->fetchAll();
    }
}
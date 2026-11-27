<?php
require_once __DIR__ . '/../config/Database.php';

class Genero {
    private $db;
    private $tabela = "generos";

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar() {
        $stmt = $this->db->query("SELECT * FROM $this->tabela ORDER BY nome ASC");
        return $stmt->fetchAll();
    }

    public function salvar($nome, $descricao) {
        $sql = "INSERT INTO $this->tabela (nome, descricao) VALUES (:nome, :descricao)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nome'      => $nome,
            ':descricao' => $descricao
        ]);
    }

    public function atualizar($id, $nome, $descricao) {
        $sql = "UPDATE $this->tabela SET nome = :nome, descricao = :descricao WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id'        => $id,
            ':nome'      => $nome,
            ':descricao' => $descricao
        ]);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM $this->tabela WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function excluir($id) {
        $sql = "DELETE FROM $this->tabela WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
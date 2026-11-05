<?php
require_once __DIR__ . '/../config/Database.php';

class Editora {
    private $db;
    private $tabela = "editoras";

    public function __construct() { $this->db = Database::getConnection(); }

    public function listar() {
        return $this->db->query("SELECT * FROM $this->tabela ORDER BY nome ASC")->fetchAll();
    }

    public function salvar($nome, $cidade, $site) {
        $sql = "INSERT INTO $this->tabela (nome, cidade, site) VALUES (:nome, :cidade, :site)";
        return $this->db->prepare($sql)->execute([
            ':nome' => $nome, ':cidade' => $cidade, ':site' => $site
        ]);
    }

    public function atualizar($id, $nome, $cidade, $site) {
        $sql = "UPDATE $this->tabela SET nome=:nome, cidade=:cidade, site=:site WHERE id=:id";
        return $this->db->prepare($sql)->execute([
            ':id' => $id, ':nome' => $nome, ':cidade' => $cidade, ':site' => $site
        ]);
    }

    public function buscarPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM $this->tabela WHERE id=:id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function excluir($id) {
        $stmt = $this->db->prepare("DELETE FROM $this->tabela WHERE id=:id");
        return $stmt->execute([':id' => $id]);
    }
}
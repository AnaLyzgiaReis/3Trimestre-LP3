<?php
require_once __DIR__ . '/../config/Database.php';

class Autor {
    private $db;
    private $tabela = "autores";

    public function __construct() { $this->db = Database::getConnection(); }

    public function listar() {
        return $this->db->query("SELECT * FROM $this->tabela ORDER BY nome ASC")->fetchAll();
    }

    public function salvar($nome, $nacionalidade, $sexo, $biografia, $foto) {
        $sql = "INSERT INTO $this->tabela (nome, nacionalidade, sexo, biografia, foto)
                VALUES (:nome, :nacionalidade, :sexo, :biografia, :foto)";
        return $this->db->prepare($sql)->execute([
            ':nome' => $nome, ':nacionalidade' => $nacionalidade,
            ':sexo' => $sexo, ':biografia' => $biografia, ':foto' => $foto
        ]);
    }

    public function atualizar($id, $nome, $nacionalidade, $sexo, $biografia, $foto) {
        $sql = "UPDATE $this->tabela SET nome=:nome, nacionalidade=:nacionalidade,
                sexo=:sexo, biografia=:biografia, foto=:foto WHERE id=:id";
        return $this->db->prepare($sql)->execute([
            ':id' => $id, ':nome' => $nome, ':nacionalidade' => $nacionalidade,
            ':sexo' => $sexo, ':biografia' => $biografia, ':foto' => $foto
        ]);
    }

    public function buscarPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM $this->tabela WHERE id=:id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function excluir($id) {
        // Apaga a foto do disco
        $autor = $this->buscarPorId($id);
        if ($autor && !empty($autor['foto'])) {
            $caminho = __DIR__ . '/../uploads/autores/' . $autor['foto'];
            if (file_exists($caminho)) unlink($caminho);
        }
        $stmt = $this->db->prepare("DELETE FROM $this->tabela WHERE id=:id");
        return $stmt->execute([':id' => $id]);
    }
}
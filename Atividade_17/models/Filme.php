<?php
require_once __DIR__ . '/../config/Database.php';

class Filme {
    private $db;
    private $tabela = "filmes";

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar() {
        $stmt = $this->db->query("SELECT * FROM $this->tabela ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function salvar($filme, $diretor, $duracao, $imagem) {
        $sql = "INSERT INTO $this->tabela (filme, diretor, duracao, imagem)
                VALUES (:filme, :diretor, :duracao, :imagem)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':filme'   => $filme,
            ':diretor' => $diretor,
            ':duracao' => $duracao,
            ':imagem'  => $imagem
        ]);
    }

    public function atualizar($id, $filme, $diretor, $duracao, $imagem) {
        $sql = "UPDATE $this->tabela
                SET filme = :filme, diretor = :diretor,
                    duracao = :duracao, imagem = :imagem
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id'      => $id,
            ':filme'   => $filme,
            ':diretor' => $diretor,
            ':duracao' => $duracao,
            ':imagem'  => $imagem
        ]);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM $this->tabela WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function excluir($id) {
        // Antes de excluir do banco, apaga a imagem do disco (se existir)
        $filme = $this->buscarPorId($id);
        if ($filme && !empty($filme['imagem'])) {
            $caminho = __DIR__ . '/../uploads/filmes/' . $filme['imagem'];
            if (file_exists($caminho)) {
                unlink($caminho);
            }
        }

        $sql = "DELETE FROM $this->tabela WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
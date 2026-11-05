<?php
require_once __DIR__ . '/../config/Database.php';

class Emprestimo {
    private $db;
    private $tabela = "emprestimos";

    public function __construct() { $this->db = Database::getConnection(); }

    // JOIN duplo: traz título do livro + nome do usuário
    public function listar() {
        $sql = "SELECT e.*,
                       l.titulo AS livro_titulo,
                       u.nome   AS usuario_nome
                FROM $this->tabela e
                LEFT JOIN livros   l ON l.id = e.id_livro
                LEFT JOIN usuarios u ON u.id = e.id_usuario
                ORDER BY e.id DESC";
        return $this->db->query($sql)->fetchAll();
    }

    public function salvar($id_livro, $id_usuario, $data_devolucao, $status) {
        $sql = "INSERT INTO $this->tabela (id_livro, id_usuario, data_devolucao, status)
                VALUES (:id_livro, :id_usuario, :data_devolucao, :status)";
        return $this->db->prepare($sql)->execute([
            ':id_livro'       => $id_livro,
            ':id_usuario'     => $id_usuario,
            ':data_devolucao' => $data_devolucao,
            ':status'         => $status
        ]);
    }

    public function atualizar($id, $id_livro, $id_usuario, $data_devolucao, $status) {
        $sql = "UPDATE $this->tabela
                SET id_livro=:id_livro, id_usuario=:id_usuario,
                    data_devolucao=:data_devolucao, status=:status
                WHERE id=:id";
        return $this->db->prepare($sql)->execute([
            ':id'             => $id,
            ':id_livro'       => $id_livro,
            ':id_usuario'     => $id_usuario,
            ':data_devolucao' => $data_devolucao,
            ':status'         => $status
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
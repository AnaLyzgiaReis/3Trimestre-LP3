<?php
require_once __DIR__ . '/../config/Database.php';

class Livro {
    private $db;
    private $tabela = "livros";

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    // JOIN com generos para exibir o nome do gênero na listagem
    public function listar() {
        $sql = "SELECT l.*, g.nome AS genero_nome
                FROM $this->tabela l
                LEFT JOIN generos g ON g.id = l.id_genero
                ORDER BY l.id DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    public function salvar($titulo, $autor, $isbn, $ano_publicacao, $sinopse, $capa, $id_genero) {
        $sql = "INSERT INTO $this->tabela
                (titulo, autor, isbn, ano_publicacao, sinopse, capa, id_genero)
                VALUES
                (:titulo, :autor, :isbn, :ano_publicacao, :sinopse, :capa, :id_genero)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':titulo'         => $titulo,
            ':autor'          => $autor,
            ':isbn'           => $isbn,
            ':ano_publicacao' => $ano_publicacao,
            ':sinopse'        => $sinopse,
            ':capa'           => $capa,
            ':id_genero'      => $id_genero
        ]);
    }

    public function atualizar($id, $titulo, $autor, $isbn, $ano_publicacao, $sinopse, $capa, $id_genero) {
        $sql = "UPDATE $this->tabela
                SET titulo = :titulo,
                    autor = :autor,
                    isbn = :isbn,
                    ano_publicacao = :ano_publicacao,
                    sinopse = :sinopse,
                    capa = :capa,
                    id_genero = :id_genero
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id'             => $id,
            ':titulo'         => $titulo,
            ':autor'          => $autor,
            ':isbn'           => $isbn,
            ':ano_publicacao' => $ano_publicacao,
            ':sinopse'        => $sinopse,
            ':capa'           => $capa,
            ':id_genero'      => $id_genero
        ]);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM $this->tabela WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function excluir($id) {
        // Apaga a capa do disco antes de deletar do banco
        $livro = $this->buscarPorId($id);
        if ($livro && !empty($livro['capa'])) {
            $caminho = __DIR__ . '/../uploads/livros/' . $livro['capa'];
            if (file_exists($caminho)) {
                unlink($caminho);
            }
        }

        $sql = "DELETE FROM $this->tabela WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
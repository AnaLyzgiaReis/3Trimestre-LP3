<?php
require_once __DIR__ . '/../config/Database.php';

class Funcionario {
    private $db;
    private $tabela = "funcionarios";

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar() {
        $stmt = $this->db->query("SELECT * FROM $this->tabela ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function salvar($nome, $cargo, $salario, $data_admissao, $observacoes) {
        $sql = "INSERT INTO $this->tabela
                (nome, cargo, salario, data_admissao, observacoes)
                VALUES
                (:nome, :cargo, :salario, :data_admissao, :observacoes)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nome'            => $nome,
            ':cargo'           => $cargo,
            ':salario'         => $salario,
            ':data_admissao'   => $data_admissao,
            ':observacoes'     => $observacoes
        ]);
    }

    public function atualizar($id, $nome, $cargo, $salario, $data_admissao, $observacoes) {
        $sql = "UPDATE $this->tabela
                SET nome = :nome,
                    cargo = :cargo,
                    salario = :salario,
                    data_admissao = :data_admissao,
                    observacoes = :observacoes
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id'             => $id,
            ':nome'           => $nome,
            ':cargo'          => $cargo,
            ':salario'        => $salario,
            ':data_admissao'  => $data_admissao,
            ':observacoes'    => $observacoes
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
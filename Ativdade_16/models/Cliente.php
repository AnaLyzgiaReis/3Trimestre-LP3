<?php
require_once __DIR__ . '/../config/Database.php';

class Cliente {
    private $db;
    private $tabela = "clientes";

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar() {
        $stmt = $this->db->query("SELECT * FROM $this->tabela ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function salvar($nome, $email, $cpf, $salario, $sexo, $data, $obs) {
        $sql = "INSERT INTO $this->tabela (nome, email, cpf, salario, sexo, data, obs)
                VALUES (:nome, :email, :cpf, :salario, :sexo, :data, :obs)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nome'    => $nome,
            ':email'   => $email,
            ':cpf'     => $cpf,
            ':salario' => $salario,
            ':sexo'    => $sexo,
            ':data'    => $data,
            ':obs'     => $obs
        ]);
    }

    public function atualizar($id, $nome, $email, $cpf, $salario, $sexo, $data, $obs) {
        $sql = "UPDATE $this->tabela
                SET nome = :nome, email = :email, cpf = :cpf,
                    salario = :salario, sexo = :sexo, data = :data, obs = :obs
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id'      => $id,
            ':nome'    => $nome,
            ':email'   => $email,
            ':cpf'     => $cpf,
            ':salario' => $salario,
            ':sexo'    => $sexo,
            ':data'    => $data,
            ':obs'     => $obs
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
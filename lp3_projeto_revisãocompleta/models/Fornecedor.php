<?php
require_once __DIR__ . '/../config/Database.php';

class Fornecedor {
    private $db;
    private $tabela = "fornecedores";

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar() {
        $stmt = $this->db->query("SELECT * FROM $this->tabela ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function salvar($razao_social, $cnpj, $email, $telefone, $endereco, $cidade, $uf, $valor_contrato, $data_cadastro, $observacoes) {
        $sql = "INSERT INTO $this->tabela
                (razao_social, cnpj, email, telefone, endereco, cidade, uf, valor_contrato, data_cadastro, observacoes)
                VALUES
                (:razao_social, :cnpj, :email, :telefone, :endereco, :cidade, :uf, :valor_contrato, :data_cadastro, :observacoes)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':razao_social'   => $razao_social,
            ':cnpj'           => $cnpj,
            ':email'          => $email,
            ':telefone'       => $telefone,
            ':endereco'       => $endereco,
            ':cidade'         => $cidade,
            ':uf'             => $uf,
            ':valor_contrato' => $valor_contrato,
            ':data_cadastro'  => $data_cadastro,
            ':observacoes'    => $observacoes
        ]);
    }

    public function atualizar($id, $razao_social, $cnpj, $email, $telefone, $endereco, $cidade, $uf, $valor_contrato, $data_cadastro, $observacoes) {
        $sql = "UPDATE $this->tabela
                SET razao_social = :razao_social,
                    cnpj = :cnpj,
                    email = :email,
                    telefone = :telefone,
                    endereco = :endereco,
                    cidade = :cidade,
                    uf = :uf,
                    valor_contrato = :valor_contrato,
                    data_cadastro = :data_cadastro,
                    observacoes = :observacoes
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id'             => $id,
            ':razao_social'   => $razao_social,
            ':cnpj'           => $cnpj,
            ':email'          => $email,
            ':telefone'       => $telefone,
            ':endereco'       => $endereco,
            ':cidade'         => $cidade,
            ':uf'             => $uf,
            ':valor_contrato' => $valor_contrato,
            ':data_cadastro'  => $data_cadastro,
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
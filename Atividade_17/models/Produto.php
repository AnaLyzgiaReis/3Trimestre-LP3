<?php
require_once __DIR__ . '/../config/Database.php';

class Produto{
    private $db;
    private $tabela = "produtos";

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar() {
        $stmt = $this->db->query("select * from $this->tabela order by id desc");
        return $stmt->fetchAll();
    }

    public function salvar(string $produto, string $descricao){
        $sql = "insert into $this->tabela (produto, descricao) values (:produto, :descricao)";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':produto' => $produto,
            ':descricao' => $descricao
        ];
        return $stmt->execute($values);

    }

    public function atualizar(int $id, string $produto, string $descricao){
        $sql = "update $this->tabela set produto=:produto, descricao=:descricao where id=:id";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':produto' => $produto,
            ':descricao' => $descricao,
            ':id' => $id
        ];
        return $stmt->execute($values);
        
    }
    
    public function buscarPorid(int $id){
        $sql = "select * from $this->tabela where id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [':id' => $id];
        $stmt->execute($values);
        return $stmt->fetch();
    }
    public function excluir(int $id){
        $sql = "delete from $this->tabela where id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [':id' => $id];
        return $stmt->execute($values);
    }


}

?>
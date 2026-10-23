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

    public function salvar(string $produto, float $valor, int $categoria_id, string $descricao){
        $sql = "insert into $this->tabela (produto, valor, categoria_id, descricao) values (:produto, :valor, :categoria_id, :descricao)";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':produto' => $produto,
            ':valor' => $valor,
            ':categoria_id' => $categoria_id,
            ':descricao' => $descricao
        ];
        return $stmt->execute($values);

    }

    public function atualizar(int $id, string $produto, float $valor, int $categoria_id, string $descricao){
        $sql = "update $this->tabela set produto=:produto, valor=:valor, categoria_id=:categoria_id, descricao=:descricao where id=:id";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':produto' => $produto,
            ':descricao' => $descricao,
            ':valor' => $valor,
            ':categoria_id' => $categoria_id,
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
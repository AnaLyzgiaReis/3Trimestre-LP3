<?php
require_once __DIR__ . '/../config/Database.php';

class Cliente{
    private $db;
    private $tabela = "clientes";

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar() {
        $stmt = $this->db->query("select * from $this->tabela order by id desc");
        return $stmt->fetchAll();
    }

    public function salvar(string $nome, string $email, int $cpf, float $salario, string $sexo, int $data){
        $sql = "insert into $this->tabela (nome, email, cpf, salario, sexo, data) values (:nome, :email, :cpf, :salario, :sexo, :data)";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':nome' => $nome,
            ':email' => $email,
            ':cpf' => $cpf,
            ':salario' => $salario,
            'sexo' => $sexo,
            'data' => $data
        ];
        return $stmt->execute($values);

    }

    public function atualizar(int $id, string $nome, string $email, int $cpf, float $salario, string $sexo, int $data){
        $sql = "update $this->tabela set nome=:nome, email=:email, cpf=:cpf, salario=:salario, sexo=:sexo, data=:data where id=:id";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':nome' => $nome,
            ':email' => $email,
            ':id' => $id,
            ':cpf' => $cpf,
            ':salario' => $salario,
            'sexo' => $sexo,
            'data' => $data
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
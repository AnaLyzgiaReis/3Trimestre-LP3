<?php
require_once __DIR__ . '/../config/Database.php';
class Categoria
{
    private PDO $db;
    public function __construct()
    {
        $this->db = DataBase::getConnection();
    }
    public function listar()
    {
        $stmt = $this->db->query("select * from categorias order by id desc");
        return $stmt->fetchAll();
    }
    public function salvar(string $categoria, string $desc)
    {
        $sql = "insert into categorias (categoria, descricao) values (:categoria, :desc)";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':categoria' => $categoria,
            ':desc' => $desc,
        ];
        return $stmt->execute($values);
    }
    public function atualizar(int $id, string $categoria, string $desc)
    {
        $sgl = "update  categorias set categoria=:categoria, descricao=:desc where id=:id";
        $stmt = $this->db->prepare($sgl);
        $values = [
            ':id' => $id,
            ':categoria' => $categoria,
            ':desc' => $desc,
        ];
        return $stmt->execute($values);
    }
    public function bucarPorId(int $id)
    {
        $sql = "select * from categorias where id= :id";
        $stmt = $this->db->prepare($sql);
        $values = ['id' => $id,];
        $stmt->execute($values);
        return  $stmt->fetch();
    }
    public function excluir(int $id)
    {
        $sql = "delete from categorias where id= :id";
        $stmt = $this->db->prepare($sql);
        $values = ['id' => $id,];
        return $stmt->execute($values);
    }
}

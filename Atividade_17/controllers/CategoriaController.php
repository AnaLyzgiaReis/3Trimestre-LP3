<?php
class CategoriaController{
    private $model;

    public function __construct()
    {
        $this->model = new Categoria();
    }

    public function index(){
        $dados = $this->model->listar();
        require __DIR__ . '/../views/categorias/index.php';
    }

    public function adicionar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);

            if($categoria && $descricao){
                $this->model->salvar($categoria, $descricao);
                header('Location: /lp3_projeto/categorias');
                exit;
            }
        }
        require __DIR__ . '/../views/categorias/criar.php';
    }
    
    public function editar(){
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if(!$id){
            header('Location: /lp3_projeto/categorias');
            exit;
        }
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_VALIDATE_EMAIL);

            if($categoria && $descricao){
                $this->model->atualizar($id, $categoria, $descricao);
                header('Location: /lp3_projeto/categorias');
                exit;
            }
    }
    //busca os dados do usuario e carrega tela com os dados
    $dados = $this->model->buscarPorid($id);

    if(!$dados){
        header('Location: /lp3_projeto/categorias');
        exit;
    }
     require __DIR__ . '/../views/categorias/editar.php';
}

public function excluir(){
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if($id){
            $this->model->excluir($id);
        }
        header('Location: /lp3_projeto/categorias');
        exit;
        
    }
}
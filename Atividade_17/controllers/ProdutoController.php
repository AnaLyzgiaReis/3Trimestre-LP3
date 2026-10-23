<?php
class ProdutoController{
    private $model;

    public function __construct()
    {
        $this->model = new Produto();
    }

    public function index(){
        $dados = $this->model->listar();
        require __DIR__ . '/../views/produtos/index.php';
    }

    public function adicionar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $produto = filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);

            if($produto && $descricao){
                $this->model->salvar($produto, $descricao);
                header('Location: /lp3_projeto/produtos');
                exit;
            }
        }
        require __DIR__ . '/../views/produtos/criar.php';
    }
    
    public function editar(){
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if(!$id){
            header('Location: /lp3_projeto/produtos');
            exit;
        }
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $produto = filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);

            if($produto && $descricao){
                $this->model->atualizar($id, $produto, $descricao);
                header('Location: /lp3_projeto/produtos');
                exit;
            }
    }
    //busca os dados do usuario e carrega tela com os dados
    $dados = $this->model->buscarPorid($id);

    if(!$dados){
        header('Location: /lp3_projeto/produtos');
        exit;
    }
     require __DIR__ . '/../views/produtos/editar.php';
}

public function excluir(){
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if($id){
            $this->model->excluir($id);
        }
        header('Location: /lp3_projeto/produtos');
        exit;
        
    }
}
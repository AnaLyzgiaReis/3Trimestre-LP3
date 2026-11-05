<?php
class ClienteController{
    private $model;

    public function __construct()
    {
        $this->model = new Cliente();
    }

    public function index(){
        $dados = $this->model->listar();
        require __DIR__ . '/../views/clientes/index.php';
    }

    public function adicionar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
            $salario = filter_input(INPUT_POST, 'salario', FILTER_VALIDATE_FLOAT);
            $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_SPECIAL_CHARS);
            $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_SPECIAL_CHARS);
    

            if($nome && $email && $cpf && $salario && $sexo && $data){
                $this->model->salvar($nome, $email, $cpf, $salario, $sexo, $data);
                header('Location: /lp3_projeto/clientes');
                exit;
            }
        }
        require __DIR__ . '/../views/clientes/criar.php';
    }
    
    public function editar(){
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if(!$id){
            header('Location: /lp3_projeto/clientes');
            exit;
        }
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
            $salario = filter_input(INPUT_POST, 'salario', FILTER_VALIDATE_FLOAT);
            $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_SPECIAL_CHARS);
            $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_SPECIAL_CHARS);

            if($nome && $email && $cpf && $salario && $sexo && $data){
                $this->model->atualizar($id, $nome, $email, $cpf, $salario, $sexo, $data);
                header('Location: /lp3_projeto/clientes');
                exit;
            }
    }
    //busca os dados do usuario e carrega tela com os dados
    $dados = $this->model->buscarPorid($id);

    if(!$dados){
        header('Location: /lp3_projeto/clientes');
        exit;
    }
     require __DIR__ . '/../views/clientes/editar.php';
}

public function excluir(){
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if($id){
            $this->model->excluir($id);
        }
        header('Location: /lp3_projeto/clientes');
        exit;
        
    }
}
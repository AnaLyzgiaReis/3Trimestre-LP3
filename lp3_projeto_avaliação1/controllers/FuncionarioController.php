<?php
class FuncionarioController {
    private $model;

    public function __construct()
    {
        $this->model = new Funcionario();
    }

    public function index() {
        $funcionarios = $this->model->listar();
        require __DIR__ . '/../views/funcionarios/index.php';
    }

    public function adicionar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = $this->capturarDados();

            if ($dados) {
                $this->model->salvar(
                    $dados['nome'], $dados['cargo'], $dados['salario'],
                    $dados['data_admissao'], $dados['observacoes']
                );
                header('Location: /lp3_projeto/funcionarios');
                exit;
            }
        }
        require __DIR__ . '/../views/funcionarios/criar.php';
    }

    public function editar() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: /lp3_projeto/funcionarios');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = $this->capturarDados();

            if ($dados) {
                $this->model->atualizar(
                    $id, $dados['nome'], $dados['cargo'], $dados['salario'],
                    $dados['data_admissao'], $dados['observacoes']
                );
                header('Location: /lp3_projeto/funcionarios');
                exit;
            }
        }

        $funcionario = $this->model->buscarPorId($id);
        if (!$funcionario) {
            header('Location: /lp3_projeto/funcionarios');
            exit;
        }
        require __DIR__ . '/../views/funcionarios/editar.php';
    }

    public function excluir() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) {
            $this->model->excluir($id);
        }
        header('Location: /lp3_projeto/funcionarios');
        exit;
    }

    private function capturarDados() {
        $nome   = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $cargo           = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_SPECIAL_CHARS);
        $salario          = filter_input(INPUT_POST, 'salario', FILTER_SANITIZE_SPECIAL_CHARS);
        $data_admissao       = filter_input(INPUT_POST, 'data_admissao', FILTER_SANITIZE_SPECIAL_CHARS);
        $observacoes    = filter_input(INPUT_POST, 'observacoes', FILTER_SANITIZE_SPECIAL_CHARS);

        // Validações obrigatórias (NOT NULL na tabela)
        if (!$nome ) {
            return false;
        }

        return [
            'nome'            => $nome,
            'cargo'           => $cargo ?: null,
            'salario'         => $salario ?: null,
            'data_admissao'   => $data_admissao ?: null,
            'observacoes'     => $observacoes ?: null,
        ];
    }
}
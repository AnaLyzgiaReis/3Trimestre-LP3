<?php
class FornecedorController {
    private $model;

    public function __construct()
    {
        $this->model = new Fornecedor();
    }

    public function index() {
        $fornecedores = $this->model->listar();
        require __DIR__ . '/../views/fornecedores/index.php';
    }

    public function adicionar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = $this->capturarDados();

            if ($dados) {
                $this->model->salvar(
                    $dados['razao_social'], $dados['cnpj'], $dados['email'],
                    $dados['telefone'], $dados['endereco'], $dados['cidade'],
                    $dados['uf'], $dados['valor_contrato'],
                    $dados['data_cadastro'], $dados['observacoes']
                );
                header('Location: /lp3_projeto/fornecedores');
                exit;
            }
        }
        require __DIR__ . '/../views/fornecedores/criar.php';
    }

    public function editar() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: /lp3_projeto/fornecedores');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = $this->capturarDados();

            if ($dados) {
                $this->model->atualizar(
                    $id, $dados['razao_social'], $dados['cnpj'], $dados['email'],
                    $dados['telefone'], $dados['endereco'], $dados['cidade'],
                    $dados['uf'], $dados['valor_contrato'],
                    $dados['data_cadastro'], $dados['observacoes']
                );
                header('Location: /lp3_projeto/fornecedores');
                exit;
            }
        }

        $fornecedor = $this->model->buscarPorId($id);
        if (!$fornecedor) {
            header('Location: /lp3_projeto/fornecedores');
            exit;
        }
        require __DIR__ . '/../views/fornecedores/editar.php';
    }

    public function excluir() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) {
            $this->model->excluir($id);
        }
        header('Location: /lp3_projeto/fornecedores');
        exit;
    }

    private function capturarDados() {
        $razao_social   = filter_input(INPUT_POST, 'razao_social', FILTER_SANITIZE_SPECIAL_CHARS);
        $cnpj           = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_SPECIAL_CHARS);
        $email          = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $telefone       = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
        $endereco       = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS);
        $cidade         = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
        $uf             = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_SPECIAL_CHARS);
        $valor_contrato = filter_input(INPUT_POST, 'valor_contrato', FILTER_VALIDATE_FLOAT);
        $data_cadastro  = filter_input(INPUT_POST, 'data_cadastro', FILTER_SANITIZE_SPECIAL_CHARS);
        $observacoes    = filter_input(INPUT_POST, 'observacoes', FILTER_SANITIZE_SPECIAL_CHARS);

        // Validações obrigatórias (NOT NULL na tabela)
        if (!$razao_social || !$cnpj) {
            return false;
        }

        return [
            'razao_social'   => $razao_social,
            'cnpj'           => $cnpj,
            'email'          => $email ?: null,
            'telefone'       => $telefone,
            'endereco'       => $endereco,
            'cidade'         => $cidade,
            'uf'             => $uf ?: null,
            'valor_contrato' => $valor_contrato !== false ? $valor_contrato : null,
            'data_cadastro'  => $data_cadastro ?: null,
            'observacoes'    => $observacoes
        ];
    }
}
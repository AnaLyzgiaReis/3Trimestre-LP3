<?php
class EmprestimoController {
    private $model;
    private $livroModel;
    private $usuarioModel;

    public function __construct() {
        $this->model        = new Emprestimo();
        $this->livroModel   = new Livro();
        $this->usuarioModel = new Usuario();
    }

    public function index() {
        $emprestimos = $this->model->listar();
        require __DIR__ . '/../views/emprestimos/index.php';
    }

    public function adicionar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_livro       = filter_input(INPUT_POST, 'id_livro', FILTER_VALIDATE_INT);
            $id_usuario     = filter_input(INPUT_POST, 'id_usuario', FILTER_VALIDATE_INT);
            $data_devolucao = filter_input(INPUT_POST, 'data_devolucao', FILTER_SANITIZE_SPECIAL_CHARS);
            $status         = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($id_livro && $id_usuario && $status) {
                $this->model->salvar($id_livro, $id_usuario, $data_devolucao ?: null, $status);
                header('Location: /lp3_projeto/emprestimos');
                exit;
            }
        }
        $livros   = $this->livroModel->listar();
        $usuarios = $this->usuarioModel->listar();
        require __DIR__ . '/../views/emprestimos/criar.php';
    }

    public function editar() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) { header('Location: /lp3_projeto/emprestimos'); exit; }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_livro       = filter_input(INPUT_POST, 'id_livro', FILTER_VALIDATE_INT);
            $id_usuario     = filter_input(INPUT_POST, 'id_usuario', FILTER_VALIDATE_INT);
            $data_devolucao = filter_input(INPUT_POST, 'data_devolucao', FILTER_SANITIZE_SPECIAL_CHARS);
            $status         = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($id_livro && $id_usuario && $status) {
                $this->model->atualizar($id, $id_livro, $id_usuario, $data_devolucao ?: null, $status);
                header('Location: /lp3_projeto/emprestimos');
                exit;
            }
        }

        $emprestimo = $this->model->buscarPorId($id);
        if (!$emprestimo) { header('Location: /lp3_projeto/emprestimos'); exit; }
        $livros   = $this->livroModel->listar();
        $usuarios = $this->usuarioModel->listar();
        require __DIR__ . '/../views/emprestimos/editar.php';
    }

    public function excluir() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) $this->model->excluir($id);
        header('Location: /lp3_projeto/emprestimos');
        exit;
    }
}
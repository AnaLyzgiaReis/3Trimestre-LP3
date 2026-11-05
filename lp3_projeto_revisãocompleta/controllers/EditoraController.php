<?php
class EditoraController {
    private $model;

    public function __construct() { $this->model = new Editora(); }

    public function index() {
        $editoras = $this->model->listar();
        require __DIR__ . '/../views/editoras/index.php';
    }

    public function adicionar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome   = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
            $site   = filter_input(INPUT_POST, 'site', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($nome) {
                $this->model->salvar($nome, $cidade, $site);
                header('Location: /lp3_projeto/editoras');
                exit;
            }
        }
        require __DIR__ . '/../views/editoras/criar.php';
    }

    public function editar() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) { header('Location: /lp3_projeto/editoras'); exit; }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome   = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
            $site   = filter_input(INPUT_POST, 'site', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($nome) {
                $this->model->atualizar($id, $nome, $cidade, $site);
                header('Location: /lp3_projeto/editoras');
                exit;
            }
        }

        $editora = $this->model->buscarPorId($id);
        if (!$editora) { header('Location: /lp3_projeto/editoras'); exit; }
        require __DIR__ . '/../views/editoras/editar.php';
    }

    public function excluir() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) $this->model->excluir($id);
        header('Location: /lp3_projeto/editoras');
        exit;
    }
}
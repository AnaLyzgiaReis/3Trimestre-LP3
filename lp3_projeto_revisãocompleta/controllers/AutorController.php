<?php
class AutorController {
    private $model;
    private $pastaUpload;

    public function __construct() {
        $this->model = new Autor();
        $this->pastaUpload = __DIR__ . '/../uploads/autores/';
    }

    public function index() {
        $autores = $this->model->listar();
        require __DIR__ . '/../views/autores/index.php';
    }

    public function adicionar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome          = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $nacionalidade = filter_input(INPUT_POST, 'nacionalidade', FILTER_SANITIZE_SPECIAL_CHARS);
            $sexo          = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_SPECIAL_CHARS);
            $biografia     = filter_input(INPUT_POST, 'biografia', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($nome) {
                $foto = $this->fazerUpload();
                $this->model->salvar($nome, $nacionalidade, $sexo, $biografia, $foto);
                header('Location: /lp3_projeto/autores');
                exit;
            }
        }
        require __DIR__ . '/../views/autores/criar.php';
    }

    public function editar() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) { header('Location: /lp3_projeto/autores'); exit; }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome          = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $nacionalidade = filter_input(INPUT_POST, 'nacionalidade', FILTER_SANITIZE_SPECIAL_CHARS);
            $sexo          = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_SPECIAL_CHARS);
            $biografia     = filter_input(INPUT_POST, 'biografia', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($nome) {
                $atual = $this->model->buscarPorId($id);
                $novaFoto = $this->fazerUpload();
                if ($novaFoto === null) {
                    $novaFoto = $atual['foto'];
                } else if (!empty($atual['foto']) && file_exists($this->pastaUpload . $atual['foto'])) {
                    unlink($this->pastaUpload . $atual['foto']);
                }
                $this->model->atualizar($id, $nome, $nacionalidade, $sexo, $biografia, $novaFoto);
                header('Location: /lp3_projeto/autores');
                exit;
            }
        }

        $autor = $this->model->buscarPorId($id);
        if (!$autor) { header('Location: /lp3_projeto/autores'); exit; }
        require __DIR__ . '/../views/autores/editar.php';
    }

    public function excluir() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) $this->model->excluir($id);
        header('Location: /lp3_projeto/autores');
        exit;
    }

    private function fazerUpload() {
        if (!isset($_FILES['foto']) || $_FILES['foto']['error'] === UPLOAD_ERR_NO_FILE) return null;
        $arq = $_FILES['foto'];
        if ($arq['error'] !== UPLOAD_ERR_OK) return null;
        if ($arq['size'] > 2 * 1024 * 1024) return null;
        $ext = strtolower(pathinfo($arq['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, ['jpg','jpeg','png','gif','webp'])) return null;
        if (!is_dir($this->pastaUpload)) mkdir($this->pastaUpload, 0777, true);
        $nome = 'autor_' . uniqid() . '.' . $ext;
        return move_uploaded_file($arq['tmp_name'], $this->pastaUpload . $nome) ? $nome : null;
    }
}
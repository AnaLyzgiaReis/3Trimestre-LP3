<?php
class LivroController {
    private $model;
    private $generoModel;
    private $pastaUpload;

    public function __construct()
    {
        $this->model       = new Livro();
        $this->generoModel = new Genero();
        $this->pastaUpload = __DIR__ . '/../uploads/livros/';
    }

    public function index() {
        $livros = $this->model->listar();
        require __DIR__ . '/../views/livros/index.php';
    }

    public function adicionar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = $this->capturarDados();

            if ($dados) {
                $capa = $this->fazerUpload();
                $this->model->salvar(
                    $dados['titulo'], $dados['autor'], $dados['isbn'],
                    $dados['ano_publicacao'], $dados['sinopse'],
                    $capa, $dados['id_genero']
                );
                header('Location: /lp3_projeto/livros');
                exit;
            }
        }
        // Precisa dos gêneros para o <select> do formulário
        $generos = $this->generoModel->listar();
        require __DIR__ . '/../views/livros/criar.php';
    }

    public function editar() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: /lp3_projeto/livros');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = $this->capturarDados();

            if ($dados) {
                $atual = $this->model->buscarPorId($id);

                $novaCapa = $this->fazerUpload();
                if ($novaCapa === null) {
                    $novaCapa = $atual['capa']; // mantém a antiga
                } else {
                    // apaga a antiga
                    if (!empty($atual['capa']) && file_exists($this->pastaUpload . $atual['capa'])) {
                        unlink($this->pastaUpload . $atual['capa']);
                    }
                }

                $this->model->atualizar(
                    $id, $dados['titulo'], $dados['autor'], $dados['isbn'],
                    $dados['ano_publicacao'], $dados['sinopse'],
                    $novaCapa, $dados['id_genero']
                );
                header('Location: /lp3_projeto/livros');
                exit;
            }
        }

        $livro = $this->model->buscarPorId($id);
        if (!$livro) {
            header('Location: /lp3_projeto/livros');
            exit;
        }
        $generos = $this->generoModel->listar();
        require __DIR__ . '/../views/livros/editar.php';
    }

    public function excluir() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) {
            $this->model->excluir($id);
        }
        header('Location: /lp3_projeto/livros');
        exit;
    }

    private function capturarDados() {
        $titulo         = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
        $autor          = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_SPECIAL_CHARS);
        $isbn           = filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_SPECIAL_CHARS);
        $ano_publicacao = filter_input(INPUT_POST, 'ano_publicacao', FILTER_VALIDATE_INT);
        $sinopse        = filter_input(INPUT_POST, 'sinopse', FILTER_SANITIZE_SPECIAL_CHARS);
        $id_genero      = filter_input(INPUT_POST, 'id_genero', FILTER_VALIDATE_INT);

        if (!$titulo || !$autor) {
            return false;
        }

        return [
            'titulo'         => $titulo,
            'autor'          => $autor,
            'isbn'           => $isbn ?: null,
            'ano_publicacao' => $ano_publicacao ?: null,
            'sinopse'        => $sinopse,
            'id_genero'      => $id_genero ?: null
        ];
    }

    private function fazerUpload() {
        if (!isset($_FILES['capa']) || $_FILES['capa']['error'] === UPLOAD_ERR_NO_FILE) {
            return null;
        }
        $arquivo = $_FILES['capa'];
        if ($arquivo['error'] !== UPLOAD_ERR_OK) return null;
        if ($arquivo['size'] > 2 * 1024 * 1024) return null;

        $ext = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) return null;

        if (!is_dir($this->pastaUpload)) {
            mkdir($this->pastaUpload, 0777, true);
        }

        $nomeArquivo = 'capa_' . uniqid() . '.' . $ext;
        $destino = $this->pastaUpload . $nomeArquivo;

        if (move_uploaded_file($arquivo['tmp_name'], $destino)) {
            return $nomeArquivo;
        }
        return null;
    }
}
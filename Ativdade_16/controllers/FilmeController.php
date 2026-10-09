<?php
class FilmeController {
    private $model;
    private $pastaUpload;

    public function __construct()
    {
        $this->model = new Filme();
        // Pasta onde as imagens ficam salvas fisicamente
        $this->pastaUpload = __DIR__ . '/../uploads/filmes/';
    }

    public function index() {
        $filmes = $this->model->listar();
        require __DIR__ . '/../views/filmes/index.php';
    }

    public function adicionar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $filme   = filter_input(INPUT_POST, 'filme',   FILTER_SANITIZE_SPECIAL_CHARS);
            $diretor = filter_input(INPUT_POST, 'diretor', FILTER_SANITIZE_SPECIAL_CHARS);
            $duracao = filter_input(INPUT_POST, 'duracao', FILTER_VALIDATE_INT);

            if ($filme && $diretor) {
                // Faz o upload (se houver arquivo) e retorna o nome salvo
                $nomeImagem = $this->fazerUpload();

                $this->model->salvar(
                    $filme, $diretor,
                    $duracao ?: null,
                    $nomeImagem
                );
                header('Location: /lp3_projeto/filmes');
                exit;
            }
        }
        require __DIR__ . '/../views/filmes/criar.php';
    }

    public function editar() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: /lp3_projeto/filmes');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $filme   = filter_input(INPUT_POST, 'filme',   FILTER_SANITIZE_SPECIAL_CHARS);
            $diretor = filter_input(INPUT_POST, 'diretor', FILTER_SANITIZE_SPECIAL_CHARS);
            $duracao = filter_input(INPUT_POST, 'duracao', FILTER_VALIDATE_INT);

            if ($filme && $diretor) {
                // Busca o registro atual para saber se já tinha imagem
                $atual = $this->model->buscarPorId($id);

                // Se enviou nova imagem, apaga a antiga e usa a nova.
                // Se não enviou, mantém a que já existia.
                $nomeImagem = $this->fazerUpload();
                if ($nomeImagem === null) {
                    $nomeImagem = $atual['imagem'];
                } else {
                    // Apaga a antiga do disco
                    if (!empty($atual['imagem']) && file_exists($this->pastaUpload . $atual['imagem'])) {
                        unlink($this->pastaUpload . $atual['imagem']);
                    }
                }

                $this->model->atualizar(
                    $id, $filme, $diretor,
                    $duracao ?: null,
                    $nomeImagem
                );
                header('Location: /lp3_projeto/filmes');
                exit;
            }
        }

        $filme = $this->model->buscarPorId($id);
        if (!$filme) {
            header('Location: /lp3_projeto/filmes');
            exit;
        }
        require __DIR__ . '/../views/filmes/editar.php';
    }

    public function excluir() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) {
            $this->model->excluir($id); // já apaga a imagem no model
        }
        header('Location: /lp3_projeto/filmes');
        exit;
    }

    /**
     * Faz o upload da imagem enviada em $_FILES['imagem'].
     * Retorna o nome do arquivo salvo, ou null se não houve upload / houve erro.
     */
    private function fazerUpload() {
        // Nenhum arquivo enviado?
        if (!isset($_FILES['imagem']) || $_FILES['imagem']['error'] === UPLOAD_ERR_NO_FILE) {
            return null;
        }

        $arquivo = $_FILES['imagem'];

        // Erro no upload?
        if ($arquivo['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        // Valida tamanho (máx 2 MB)
        if ($arquivo['size'] > 2 * 1024 * 1024) {
            return null;
        }

        // Valida extensão
        $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $ext = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, $extensoesPermitidas)) {
            return null;
        }

        // Garante que a pasta existe
        if (!is_dir($this->pastaUpload)) {
            mkdir($this->pastaUpload, 0777, true);
        }

        // Gera nome único para evitar colisão
        // Ex.: filme_6512a3b4c5d6e.jpg
        $nomeArquivo = 'filme_' . uniqid() . '.' . $ext;
        $destino = $this->pastaUpload . $nomeArquivo;

        // Move do temp para a pasta final
        if (move_uploaded_file($arquivo['tmp_name'], $destino)) {
            return $nomeArquivo;
        }

        return null;
    }
}
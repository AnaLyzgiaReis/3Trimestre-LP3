<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Cadastrar Novo Livro</h3>
        </div>

        <form action="/lp3_projeto/livros/adicionar" method="POST"
              enctype="multipart/form-data" class="card-form">

            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required maxlength="200" class="form-control" placeholder="Ex: Dom Casmurro">
            </div>

            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" required maxlength="150" class="form-control" placeholder="Ex: Machado de Assis">
            </div>

            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isbn" maxlength="20" class="form-control" placeholder="Ex: 9788525406958">
            </div>

            <div class="form-group">
                <label for="ano_publicacao">Ano de Publicação:</label>
                <input type="number" id="ano_publicacao" name="ano_publicacao" min="1" max="9999" class="form-control" placeholder="Ex: 1899">
            </div>

            <div class="form-group">
                <label for="id_genero">Gênero:</label>
                <select id="id_genero" name="id_genero" class="form-control">
                    <option value="">-- Selecione --</option>
                    <?php foreach ($generos as $g): ?>
                        <option value="<?= $g['id'] ?>"><?= htmlspecialchars($g['nome']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="sinopse">Sinopse:</label>
                <textarea class="form-control" name="sinopse" id="sinopse" placeholder="Resumo do livro..."></textarea>
            </div>

            <div class="form-group">
                <label for="capa">Capa (imagem):</label>
                <input type="file" id="capa" name="capa" accept="image/*" class="form-control">
                <small class="text-muted">Formatos: JPG, PNG, GIF, WEBP. Máx 2MB.</small>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="/lp3_projeto/livros" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
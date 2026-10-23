<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Editar Livro</h3>
        </div>

        <form action="/lp3_projeto/livros/editar?id=<?= $livro['id'] ?>" method="POST"
              enctype="multipart/form-data" class="card-form">

            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($livro['titulo']) ?>" required maxlength="200" class="form-control">
            </div>

            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" value="<?= htmlspecialchars($livro['autor']) ?>" required maxlength="150" class="form-control">
            </div>

            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isbn" value="<?= htmlspecialchars($livro['isbn']) ?>" maxlength="20" class="form-control">
            </div>

            <div class="form-group">
                <label for="ano_publicacao">Ano de Publicação:</label>
                <input type="number" id="ano_publicacao" name="ano_publicacao" value="<?= htmlspecialchars($livro['ano_publicacao']) ?>" min="1" max="9999" class="form-control">
            </div>

            <div class="form-group">
                <label for="id_genero">Gênero:</label>
                <select id="id_genero" name="id_genero" class="form-control">
                    <option value="">-- Selecione --</option>
                    <?php foreach ($generos as $g): ?>
                        <option value="<?= $g['id'] ?>" <?= ($livro['id_genero'] == $g['id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($g['nome']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="sinopse">Sinopse:</label>
                <textarea class="form-control" name="sinopse" id="sinopse"><?= htmlspecialchars($livro['sinopse']) ?></textarea>
            </div>

            <div class="form-group">
                <label>Capa atual:</label><br>
                <?php if (!empty($livro['capa'])): ?>
                    <img src="/lp3_projeto/uploads/livros/<?= htmlspecialchars($livro['capa']) ?>"
                         alt="Capa atual" style="max-width: 100px; border-radius: 6px; margin-bottom: 10px;">
                <?php else: ?>
                    <p class="text-muted">Nenhuma capa cadastrada.</p>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="capa">Trocar capa (opcional):</label>
                <input type="file" id="capa" name="capa" accept="image/*" class="form-control">
                <small class="text-muted">Deixe em branco para manter a capa atual.</small>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-warning">Atualizar</button>
                <a href="/lp3_projeto/livros" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer
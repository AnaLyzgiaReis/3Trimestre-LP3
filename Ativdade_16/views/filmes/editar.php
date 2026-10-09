<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Editar Filme</h3>
        </div>

        <form action="/lp3_projeto/filmes/editar?id=<?= $filme['id'] ?>" method="POST" class="card-form">
            <div class="form-group">
                <label for="filme">Filme:</label>
                <input type="text" id="filme" name="filme" value="<?= htmlspecialchars($filme['filme']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="diretor">Diretor:</label>
                <input type="text" id="diretor" name="diretor" value="<?= htmlspecialchars($filme['diretor']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="duracao">Duração (min):</label>
                <input type="number" min="1" id="duracao" name="duracao"
                       value="<?= htmlspecialchars($filme['duracao']) ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="imagem">Imagem (nome do arquivo):</label>
                <input type="text" id="imagem" name="imagem" maxlength="45"
                       value="<?= htmlspecialchars($filme['imagem']) ?>" class="form-control">
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-warning">Atualizar</button>
                <a href="/lp3_projeto/filmes" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Editar filme</h3>
        </div>

        <form action="/lp3_projeto/filmes/editar" method="POST" enctype="multipart/form-data" class="card-form">
            <div class="form-group">
                <label for="nome">Filme:</label>
                <input type="text" id="filme" name="filme" value="<?= htmlspecialchars($dados['filme']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="nome">Diretor:</label>
                <input type="text" id="diretor" name="diretor" value="<?= htmlspecialchars($dados['diretor']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="nome">Duração:</label>
                <input type="text" id="duracao" name="duracao" value="<?= htmlspecialchars($dados['duracao']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="nome">Imagem do filme:</label>
                <?php if(!empty($dados['imagem'])): ?>
                                <img src="/lp3_projeto/uploads/filmes/<?= rawurlencode($dados['imagem']) ?>" alt=""
                                style="max-width: 100px; height: auto;">
                                <?php endif; ?>
                <input type="file" id="imagem" name="imagem" accept="image/jpeg,image/png,image/gif,image/webp" required class="form-control" >
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-warning">Atualizar</button>
                <a href="/lp3_projeto/filmes" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
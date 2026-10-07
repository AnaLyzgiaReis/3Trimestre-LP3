<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Editar categoria</h3>
        </div>

        <form action="/lp3_projeto/categorias/editar?id=<?= $dados['id'] ?>" method="POST" class="card-form">
            <div class="form-group">
                <label for="nome">Categoria:</label>
                <input type="text" id="categoria" name="categoria" value="<?= htmlspecialchars($dados['categoria']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Descrição:</label>
                <textarea class="form-control" name="descricao" id="descricao" <? htmlspecialchars($dados['descricao']) ?></textarea>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-warning">Atualizar</button>
                <a href="/lp3_projeto/categorias" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
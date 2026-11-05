<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action"><h3>Editar Editora</h3></div>

        <form action="/lp3_projeto/editoras/editar?id=<?= $editora['id'] ?>" method="POST" class="card-form">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($editora['nome']) ?>" required maxlength="120" class="form-control">
            </div>
            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade" value="<?= htmlspecialchars($editora['cidade']) ?>" maxlength="100" class="form-control">
            </div>
            <div class="form-group">
                <label for="site">Site:</label>
                <input type="url" id="site" name="site" value="<?= htmlspecialchars($editora['site']) ?>" maxlength="150" class="form-control">
            </div>
            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-warning">Atualizar</button>
                <a href="/lp3_projeto/editoras" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
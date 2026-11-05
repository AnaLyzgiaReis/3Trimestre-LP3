<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action"><h3>Editar Autor</h3></div>

        <form action="/lp3_projeto/autores/editar?id=<?= $autor['id'] ?>" method="POST" enctype="multipart/form-data" class="card-form">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($autor['nome']) ?>" required maxlength="150" class="form-control">
            </div>
            <div class="form-group">
                <label for="nacionalidade">Nacionalidade:</label>
                <input type="text" id="nacionalidade" name="nacionalidade" value="<?= htmlspecialchars($autor['nacionalidade']) ?>" maxlength="80" class="form-control">
            </div>
            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select id="sexo" name="sexo" class="form-control">
                    <option value="">-- Selecione --</option>
                    <option value="M" <?= $autor['sexo']==='M'?'selected':'' ?>>Masculino</option>
                    <option value="F" <?= $autor['sexo']==='F'?'selected':'' ?>>Feminino</option>
                    <option value="O" <?= $autor['sexo']==='O'?'selected':'' ?>>Outro</option>
                </select>
            </div>
            <div class="form-group">
                <label for="biografia">Biografia:</label>
                <textarea class="form-control" name="biografia" id="biografia"><?= htmlspecialchars($autor['biografia']) ?></textarea>
            </div>
            <div class="form-group">
                <label>Foto atual:</label><br>
                <?php if (!empty($autor['foto'])): ?>
                    <img src="/lp3_projeto/uploads/autores/<?= htmlspecialchars($autor['foto']) ?>"
                         style="max-width:80px;border-radius:50%;margin-bottom:10px;">
                <?php else: ?>
                    <p class="text-muted">Sem foto.</p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="foto">Trocar foto (opcional):</label>
                <input type="file" id="foto" name="foto" accept="image/*" class="form-control">
            </div>
            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-warning">Atualizar</button>
                <a href="/lp3_projeto/autores" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action"><h3>Editar Empréstimo</h3></div>

        <form action="/lp3_projeto/emprestimos/editar?id=<?= $emprestimo['id'] ?>" method="POST" class="card-form">
            <div class="form-group">
                <label for="id_livro">Livro:</label>
                <select id="id_livro" name="id_livro" required class="form-control">
                    <?php foreach ($livros as $l): ?>
                        <option value="<?= $l['id'] ?>" <?= $emprestimo['id_livro'] == $l['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($l['titulo']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_usuario">Usuário:</label>
                <select id="id_usuario" name="id_usuario" required class="form-control">
                    <?php foreach ($usuarios as $u): ?>
                        <option value="<?= $u['id'] ?>" <?= $emprestimo['id_usuario'] == $u['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($u['nome']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="data_devolucao">Data de Devolução:</label>
                <input type="date" id="data_devolucao" name="data_devolucao"
                       value="<?= htmlspecialchars($emprestimo['data_devolucao']) ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" required class="form-control">
                    <option value="emprestado" <?= $emprestimo['status']==='emprestado'?'selected':'' ?>>Emprestado</option>
                    <option value="devolvido"  <?= $emprestimo['status']==='devolvido' ?'selected':'' ?>>Devolvido</option>
                    <option value="atrasado"   <?= $emprestimo['status']==='atrasado'  ?'selected':'' ?>>Atrasado</option>
                </select>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-warning">Atualizar</button>
                <a href="/lp3_projeto/emprestimos" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
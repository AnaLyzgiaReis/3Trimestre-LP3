<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action"><h3>Novo Empréstimo</h3></div>

        <form action="/lp3_projeto/emprestimos/adicionar" method="POST" class="card-form">
            <div class="form-group">
                <label for="id_livro">Livro:</label>
                <select id="id_livro" name="id_livro" required class="form-control">
                    <option value="">-- Selecione o livro --</option>
                    <?php foreach ($livros as $l): ?>
                        <option value="<?= $l['id'] ?>"><?= htmlspecialchars($l['titulo']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_usuario">Usuário:</label>
                <select id="id_usuario" name="id_usuario" required class="form-control">
                    <option value="">-- Selecione o usuário --</option>
                    <?php foreach ($usuarios as $u): ?>
                        <option value="<?= $u['id'] ?>"><?= htmlspecialchars($u['nome']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="data_devolucao">Data de Devolução (prevista):</label>
                <input type="date" id="data_devolucao" name="data_devolucao" class="form-control">
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" required class="form-control">
                    <option value="emprestado" selected>Emprestado</option>
                    <option value="devolvido">Devolvido</option>
                    <option value="atrasado">Atrasado</option>
                </select>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="/lp3_projeto/emprestimos" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
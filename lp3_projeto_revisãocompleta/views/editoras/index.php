<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Editoras Cadastradas</h3>
            <a href="/lp3_projeto/editoras/adicionar" class="btn btn-success btn-sm">+ Nova Editora</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th><th>Nome</th><th>Cidade</th><th>Site</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($editoras)): ?>
                    <?php foreach ($editoras as $e): ?>
                        <tr>
                            <td><?= $e['id'] ?></td>
                            <td><?= htmlspecialchars($e['nome']) ?></td>
                            <td><?= htmlspecialchars($e['cidade']) ?></td>
                            <td><?= htmlspecialchars($e['site']) ?></td>
                            <td class="text-center">
                                <a href="/lp3_projeto/editoras/editar?id=<?= $e['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="/lp3_projeto/editoras/excluir?id=<?= $e['id'] ?>" class="btn btn-danger btn-sm"
                                   onclick="return confirm('Excluir esta editora?');">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="5" style="text-align:center;">Nenhuma editora cadastrada.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
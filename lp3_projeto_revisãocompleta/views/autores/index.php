<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Autores Cadastrados</h3>
            <a href="/lp3_projeto/autores/adicionar" class="btn btn-success btn-sm">+ Novo Autor</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th><th>Foto</th><th>Nome</th><th>Nacionalidade</th>
                    <th>Sexo</th><th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($autores)): ?>
                    <?php foreach ($autores as $a): ?>
                        <tr>
                            <td><?= $a['id'] ?></td>
                            <td>
                                <?php if (!empty($a['foto'])): ?>
                                    <img src="/lp3_projeto/uploads/autores/<?= htmlspecialchars($a['foto']) ?>"
                                         style="width:50px;height:50px;object-fit:cover;border-radius:50%;">
                                <?php else: ?>
                                    <span class="text-muted">—</span>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($a['nome']) ?></td>
                            <td><?= htmlspecialchars($a['nacionalidade']) ?></td>
                            <td>
                                <?= $a['sexo'] === 'M' ? 'Masculino' : ($a['sexo'] === 'F' ? 'Feminino' : ($a['sexo'] === 'O' ? 'Outro' : '—')) ?>
                            </td>
                            <td class="text-center">
                                <a href="/lp3_projeto/autores/editar?id=<?= $a['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="/lp3_projeto/autores/excluir?id=<?= $a['id'] ?>" class="btn btn-danger btn-sm"
                                   onclick="return confirm('Excluir este autor?');">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="6" style="text-align:center;">Nenhum autor cadastrado.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
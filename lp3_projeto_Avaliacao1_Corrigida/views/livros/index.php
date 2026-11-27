<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Livros Cadastrados</h3>
            <a href="/lp3_projeto/livros/adicionar" class="btn btn-success btn-sm">+ Novo Livro</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Capa</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Ano</th>
                    <th>Gênero</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($livros)): ?>
                    <?php foreach ($livros as $l): ?>
                        <tr>
                            <td><?= $l['id'] ?></td>
                            <td>
                                <?php if (!empty($l['capa'])): ?>
                                    <img src="/lp3_projeto/uploads/livros/<?= htmlspecialchars($l['capa']) ?>"
                                         alt="<?= htmlspecialchars($l['titulo']) ?>"
                                         style="width: 50px; height: 70px; object-fit: cover; border-radius: 4px;">
                                <?php else: ?>
                                    <span class="text-muted">—</span>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($l['titulo']) ?></td>
                            <td><?= htmlspecialchars($l['autor']) ?></td>
                            <td><?= htmlspecialchars($l['ano_publicacao']) ?></td>
                            <td>
                                <?= $l['genero_nome']
                                    ? htmlspecialchars($l['genero_nome'])
                                    : '<span class="text-muted">Sem gênero</span>' ?>
                            </td>
                            <td class="text-center">
                                <a href="/lp3_projeto/livros/editar?id=<?= $l['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="/lp3_projeto/livros/excluir?id=<?= $l['id'] ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Tem certeza que deseja excluir este livro?');">
                                   Excluir
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" style="text-align: center;">Nenhum livro cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
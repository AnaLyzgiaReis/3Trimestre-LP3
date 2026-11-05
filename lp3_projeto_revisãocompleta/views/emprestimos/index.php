<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Empréstimos</h3>
            <a href="/lp3_projeto/emprestimos/adicionar" class="btn btn-success btn-sm">+ Novo Empréstimo</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th><th>Livro</th><th>Usuário</th>
                    <th>Empréstimo</th><th>Devolução</th><th>Status</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($emprestimos)): ?>
                    <?php foreach ($emprestimos as $e): ?>
                        <tr>
                            <td><?= $e['id'] ?></td>
                            <td><?= htmlspecialchars($e['livro_titulo']) ?></td>
                            <td><?= htmlspecialchars($e['usuario_nome']) ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($e['data_emprestimo'])) ?></td>
                            <td><?= $e['data_devolucao'] ? date('d/m/Y', strtotime($e['data_devolucao'])) : '—' ?></td>
                            <td>
                                <?php
                                $cores = ['emprestado' => 'primary', 'devolvido' => 'success', 'atrasado' => 'danger'];
                                $cor = $cores[$e['status']] ?? 'secondary';
                                ?>
                                <span class="badge bg-<?= $cor ?>"><?= ucfirst($e['status']) ?></span>
                            </td>
                            <td class="text-center">
                                <a href="/lp3_projeto/emprestimos/editar?id=<?= $e['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="/lp3_projeto/emprestimos/excluir?id=<?= $e['id'] ?>" class="btn btn-danger btn-sm"
                                   onclick="return confirm('Excluir este empréstimo?');">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="7" style="text-align:center;">Nenhum empréstimo registrado.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Fornecedores Cadastrados</h3>
            <a href="/lp3_projeto/fornecedores/adicionar" class="btn btn-success btn-sm">+ Novo Fornecedor</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Razão Social</th>
                    <th>CNPJ</th>
                    <th>Cidade/UF</th>
                    <th>Telefone</th>
                    <th>Valor Contrato</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($fornecedores)): ?>
                    <?php foreach ($fornecedores as $f): ?>
                        <tr>
                            <td><?= $f['id'] ?></td>
                            <td><?= htmlspecialchars($f['razao_social']) ?></td>
                            <td><?= htmlspecialchars($f['cnpj']) ?></td>
                            <td>
                                <?= htmlspecialchars($f['cidade']) ?>
                                <?= $f['uf'] ? '/' . htmlspecialchars($f['uf']) : '' ?>
                            </td>
                            <td><?= htmlspecialchars($f['telefone']) ?></td>
                            <td>R$ <?= number_format((float)$f['valor_contrato'], 2, ',', '.') ?></td>
                            <td class="text-center">
                                <a href="/lp3_projeto/fornecedores/editar?id=<?= $f['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="/lp3_projeto/fornecedores/excluir?id=<?= $f['id'] ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Tem certeza que deseja excluir este fornecedor?');">
                                   Excluir
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" style="text-align: center;">Nenhum fornecedor cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
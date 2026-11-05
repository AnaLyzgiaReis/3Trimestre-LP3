<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Editar Cliente</h3>
        </div>

        <form action="/lp3_projeto/clientes/editar?id=<?= $dados['id'] ?>" method="POST" class="card-form">
           <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($dados['nome']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($dados['email']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="nome">Cpf:</label>
                <input type="text" id="cpf" name="cpf" value="<?= htmlspecialchars($dados['cpf']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="nome">Salário:</label>
                <input type="text" id="salario" name="salario" value="<?= htmlspecialchars($dados['salario']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="nome">Sexo:</label>
                <input type="text" id="sexo" name="sexo" value="<?= htmlspecialchars($dados['sexo']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="nome">Data:</label>
                <input type="text" id="data" name="data" value="<?= htmlspecialchars($dados['data']) ?>" required class="form-control">
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-warning">Atualizar</button>
                <a href="/lp3_projeto/clientes" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
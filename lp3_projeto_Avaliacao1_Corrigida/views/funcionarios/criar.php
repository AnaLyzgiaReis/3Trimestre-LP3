<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Cadastrar Novo Funcionário</h3>
        </div>

        <form action="/lp3_projeto/funcionarios/adicionar" method="POST" class="card-form">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required maxlength="100" class="form-control" placeholder="Ex: Ana Souza">
            </div>

            <div class="form-group">
                <label for="cargo">Cargo:</label>
                <input type="text" id="cargo" name="cargo" maxlength="60" class="form-control" placeholder="Ex: Analista de RH">
            </div>

            <div class="form-group">
                <label for="salario">Salário:</label>
                <input type="number" step="0.01" min="0" id="salario" name="salario" class="form-control" placeholder="Ex: 3500.00">
            </div>

            <div class="form-group">
                <label for="data_admissao">Data de Admissão:</label>
                <input type="date" id="data_admissao" name="data_admissao" class="form-control">
            </div>

            <div class="form-group">
                <label for="observacoes">Observações:</label>
                <textarea class="form-control" name="observacoes" id="observacoes" placeholder="Informações adicionais..."></textarea>
            </div>

            <div class="form-group">
                <label>
                    <!-- Hidden ANTES: garante que "desmarcado" envie 0 -->
                    <input type="hidden" name="ativo" value="0">
                    <input type="checkbox" name="ativo" value="1" checked>
                    Funcionário ativo
                </label>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="/lp3_projeto/funcionarios" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
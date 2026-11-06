<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Cadastrar Novo Funcionario</h3>
        </div>

        <form action="/lp3_projeto/funcionarios/adicionar" method="POST" class="card-form">
            <div class="form-group">
                <label for="razao_social">Nome</label>
                <input type="text" id="nome" name="nome" required maxlength="150" class="form-control" placeholder="Ex: Ana Lygia">
            </div>

            <div class="form-group">
                <label for="cnpj">Cargo:</label>
                <input type="text" id="cargo" name="cargo" required maxlength="18" class="form-control" placeholder="Ex: Administrador Geral">
            </div>

            <div class="form-group">
                <label for="valor_contrato">Salario:</label>
                <input type="number" step="0.01" min="0" id="salario" name="salario" class="form-control" placeholder="Ex: 3.500">
            </div>
            
            <div class="form-group">
                <label for="data_cadastro">Data de Admissao:</label>
                <input type="date" id="data_admissao" name="data_admissao" class="form-control">
            </div>

            <div class="form-group">
                <label for="observacoes">Observações:</label>
                <textarea class="form-control" name="observacoes" id="observacoes" placeholder="Informações Adicionais..."></textarea>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="/lp3_projeto/fornecedores" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
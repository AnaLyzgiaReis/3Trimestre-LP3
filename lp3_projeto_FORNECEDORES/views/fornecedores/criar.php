<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Cadastrar Novo Fornecedor</h3>
        </div>

        <form action="/lp3_projeto/fornecedores/adicionar" method="POST" class="card-form">
            <div class="form-group">
                <label for="razao_social">Razão Social:</label>
                <input type="text" id="razao_social" name="razao_social" required maxlength="150" class="form-control" placeholder="Ex: Distribuidora Alpha LTDA">
            </div>

            <div class="form-group">
                <label for="cnpj">CNPJ:</label>
                <input type="text" id="cnpj" name="cnpj" required maxlength="18" class="form-control" placeholder="Ex: 12.345.678/0001-90">
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" maxlength="100" class="form-control" placeholder="Ex: contato@empresa.com">
            </div>

            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" maxlength="20" class="form-control" placeholder="Ex: (11) 98765-4321">
            </div>

            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="endereco" maxlength="255" class="form-control" placeholder="Ex: Rua A, 100">
            </div>

            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade" maxlength="100" class="form-control" placeholder="Ex: São Paulo">
            </div>

            <div class="form-group">
                <label for="uf">UF:</label>
                <input type="text" id="uf" name="uf" maxlength="2" class="form-control" placeholder="Ex: SP" style="text-transform: uppercase;">
            </div>

            <div class="form-group">
                <label for="valor_contrato">Valor do Contrato:</label>
                <input type="number" step="0.01" min="0" id="valor_contrato" name="valor_contrato" class="form-control" placeholder="Ex: 15000.00">
            </div>

            <div class="form-group">
                <label for="data_cadastro">Data de Cadastro:</label>
                <input type="date" id="data_cadastro" name="data_cadastro" class="form-control">
            </div>

            <div class="form-group">
                <label for="observacoes">Observações:</label>
                <textarea class="form-control" name="observacoes" id="observacoes" placeholder="Informações adicionais..."></textarea>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="/lp3_projeto/fornecedores" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Cadastrar Novo Cliente</h3>
        </div>

        <form action="/lp3_projeto/clientes/adicionar" method="POST" class="card-form">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required class="form-control" placeholder="Ex: carol">
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required class="form-control" placeholder="Ex: carolsilvv@email.com">
            </div>

        
            <div class="form-group">
                <label for="nome">Cpf:</label>
                <input type="text" id="cpf" name="cpf" required class="form-control" placeholder="Ex: 12345678-90">
            </div>

            <form action="/lp3_projeto/clientes/adicionar" method="POST" class="card-form">
            <div class="form-group">
                <label for="nome">Salário:</label>
                <input type="text" id="salario" name="salario" required class="form-control" placeholder="Ex: 12345.60">
            </div>

            <form action="/lp3_projeto/clientes/adicionar" method="POST" class="card-form">
            <div class="form-group">
                <label for="nome">Sexo:</label>
                <input type="text" id="sexo" name="sexo" required class="form-control" placeholder="Ex: feminino">
            </div>

            <form action="/lp3_projeto/clientes/adicionar" method="POST" class="card-form">
            <div class="form-group">
                <label for="nome">Data:</label>
                <input type="text" id="data" name="data" required class="form-control" placeholder="Ex: 10/08/92">
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="/lp3_projeto/clientes" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>

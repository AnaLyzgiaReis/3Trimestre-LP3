<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Cadastrar Novo produto</h3>
        </div>

        <form action="/lp3_projeto/produtos/adicionar" method="POST" class="card-form">
            <div class="form-group">
                <label for="nome">Produto:</label>
                <input type="text" id="produto" name="produto" required class="form-control" placeholder="Ex: camisa da loja">
            </div>

            <div class="form-group">
                <label for="email">Descrição:</label>
                <textarea class="form-control" name="descricao" id="descricao" placeholder="Ex: última edição"></textarea>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="/lp3_projeto/produtos" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>

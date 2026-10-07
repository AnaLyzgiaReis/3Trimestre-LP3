<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Cadastrar Nova Categoria</h3>
        </div>

        <form action="/lp3_projeto/categorias/adicionar" method="POST" class="card-form">
            <div class="form-group">
                <label for="nome">Categoria:</label>
                <input type="text" id="categoria" name="categoria" required class="form-control" placeholder="Ex: boné">
            </div>

            <div class="form-group">
                <label for="email">Descrição:</label>
                <textarea class="form-control" name="descricao" id="descricao" placeholder="Ex: meias natalinas"></textarea>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="/lp3_projeto/categorias" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>

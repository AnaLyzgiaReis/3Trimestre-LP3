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
                <label for="valor">Valor:</label>
                <input type="number" id="valor" name="valor" step="0.01" required class="form-control" placeholder="Ex: 99.99">
            </div>
            <div class="form-group">
                <label for="categoria_id">Categoria:</label>
                <select name="categoria_id" id="categoria_id" class="form-select" required>
                <option value="">Selecione uma categoria</option>
                <?php foreach($categorias as $categoria) {?>
                <option value="<?= $categoria['id'] ?>"> <?= $categoria['categoria'] ?></option>
                <?php }?>
            </select>
                
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

<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Cadastrar Novo filme</h3>
        </div>

        <form action="/lp3_projeto/filmes/adicionar" method="POST" class="card-form">
            <div class="form-group">
                <label for="nome">Filme:</label>
                <input type="text" id="filme" name="filme" required class="form-control" placeholder="Ex: Senhor dos anéis">
            </div>

            <div class="form-group">
                <label for="nome">Diretor:</label>
                <input type="text" id="diretor" name="diretor" required class="form-control" placeholder="Ex: Tim Burton">
            </div>

            <div class="form-group">
                <label for="nome">Duração:</label>
                <input type="text" id="duracao" name="duracao" required class="form-control" placeholder="Ex: 120">
            </div>

            <div class="form-group">
                <label for="nome">Imagem do filme:</label>
                <input type="text" id="imagem" name="imagem" required class="form-control" placeholder="Ex: senhor_dos_anéis.jpg">
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="/lp3_projeto/filmes" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>

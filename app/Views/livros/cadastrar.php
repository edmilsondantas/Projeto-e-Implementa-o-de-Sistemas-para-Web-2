<?php $erro = isset($_GET['erro']); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Livro - Biblioteca Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">

    <h2 class="mb-4">📖 Cadastrar novo livro</h2>

    <?php if ($erro): ?>
        <div class="alert alert-danger">Preencha os campos obrigatórios: título, autor e categoria.</div>
    <?php endif; ?>

    <form action="/livros/cadastrar" method="POST" class="bg-white p-4 rounded shadow-sm">

        <div class="mb-3">
            <label class="form-label">Título *</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Autor *</label>
                <select name="id_autor" class="form-select" required>
                    <option value="">Selecione</option>
                    <?php foreach ($autores as $autor): ?>
                        <option value="<?= $autor['id_autor'] ?>"><?= htmlspecialchars($autor['nome']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Categoria *</label>
                <select name="id_categoria" class="form-select" required>
                    <option value="">Selecione</option>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?= $categoria['id_categoria'] ?>"><?= htmlspecialchars($categoria['nome']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">ISBN</label>
                <input type="text" name="isbn" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Editora</label>
                <input type="text" name="editora" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Ano de publicação</label>
                <input type="number" name="ano_publicacao" class="form-control" min="1000" max="2100">
            </div>
        </div>

        <div class="mb-3 col-md-4">
            <label class="form-label">Quantidade</label>
            <input type="number" name="quantidade" class="form-control" value="1" min="1">
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="/livros" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>

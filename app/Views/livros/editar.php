<?php
$mensagens = [
    'titulo'         => 'O título é obrigatório.',
    'autor'          => 'Selecione um autor.',
    'categoria'      => 'Selecione uma categoria.',
    'isbn'           => 'ISBN inválido. Informe 10 ou 13 dígitos.',
    'ano'            => 'Ano de publicação inválido.',
    'quantidade'     => 'A quantidade deve ser pelo menos 1.',
    'status'         => 'Status inválido.',
    'isbn_existente' => 'Já existe um livro cadastrado com este ISBN.',
];
$erros = array_filter(explode(',', $_GET['erro'] ?? ''));
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Editar Livro - Biblioteca Digital</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
    <h2 class="mb-4">📖 Editar livro</h2>

    <?php if (!empty($erros)): ?>
    <div class="alert alert-danger">
        <strong>Corrija os seguintes erros:</strong>
        <ul class="mb-0 mt-1">
            <?php foreach ($erros as $codigo): ?>
                <?php if (isset($mensagens[$codigo])): ?>
                    <li><?= $mensagens[$codigo] ?></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

    <form action="/livros/atualizar/<?= $livro['id_livro'] ?>" method="POST" class="bg-white p-4 rounded shadow-sm">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Título *</label>
                <input type="text" name="titulo" class="form-control" value="<?= htmlspecialchars($livro['titulo']) ?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">ISBN</label>
                <input type="text" name="isbn" class="form-control" value="<?= htmlspecialchars($livro['isbn']) ?>">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Autor *</label>
                <select name="id_autor" class="form-select" required>
                    <option value="">Selecione</option>
                    <?php foreach ($autores as $autor): ?>
                        <option value="<?= $autor['id_autor'] ?>" <?= $autor['id_autor'] == $livro['id_autor'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($autor['nome']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Categoria *</label>
                <select name="id_categoria" class="form-select" required>
                    <option value="">Selecione</option>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?= $categoria['id_categoria'] ?>" <?= $categoria['id_categoria'] == $livro['id_categoria'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($categoria['nome']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Editora</label>
                <input type="text" name="editora" class="form-control" value="<?= htmlspecialchars($livro['editora']) ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Ano de publicação</label>
                <input type="number" name="ano_publicacao" class="form-control" min="1900" max="2100" value="<?= htmlspecialchars($livro['ano_publicacao']) ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Quantidade</label>
                <input type="number" name="quantidade" class="form-control" min="1" value="<?= htmlspecialchars($livro['quantidade']) ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="DISPONIVEL" <?= $livro['status'] === 'DISPONIVEL' ? 'selected' : '' ?>>Disponível</option>
                    <option value="INDISPONIVEL" <?= $livro['status'] === 'INDISPONIVEL' ? 'selected' : '' ?>>Indisponível</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar alterações</button>
        <a href="/livros" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>

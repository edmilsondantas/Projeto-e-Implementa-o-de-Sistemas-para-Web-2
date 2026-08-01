<?php $sucesso = isset($_GET['sucesso']); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Livros - Biblioteca Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>📚 Livros cadastrados</h2>
        <a href="/livros/cadastrar" class="btn btn-primary">+ Novo Livro</a>
    </div>

    <?php if ($sucesso): ?>
        <div class="alert alert-success">Livro cadastrado com sucesso!</div>
    <?php endif; ?>

    <?php if (empty($livros)): ?>
        <div class="alert alert-info">Nenhum livro cadastrado ainda.</div>
    <?php else: ?>
        <table class="table table-striped table-bordered bg-white align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>ISBN</th>
                    <th>Editora</th>
                    <th>Ano</th>
                    <th>Qtd.</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livros as $livro): ?>
                    <tr>
                        <td><?= htmlspecialchars($livro['id_livro']) ?></td>
                        <td><?= htmlspecialchars($livro['titulo']) ?></td>
                        <td><?= htmlspecialchars($livro['isbn'] ?? '') ?></td>
                        <td><?= htmlspecialchars($livro['editora'] ?? '') ?></td>
                        <td><?= htmlspecialchars($livro['ano_publicacao'] ?? '') ?></td>
                        <td><?= htmlspecialchars($livro['quantidade']) ?></td>
                        <td>
                            <span class="badge <?= $livro['status'] === 'DISPONIVEL' ? 'bg-success' : 'bg-secondary' ?>">
                                <?= htmlspecialchars($livro['status']) ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <a href="/" class="btn btn-secondary mt-3">&larr; Voltar</a>
</div>
</body>
</html>

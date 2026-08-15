<?php
$sucesso   = isset($_GET['sucesso']);
$atualizado = isset($_GET['atualizado']);
$excluido  = isset($_GET['excluido']);
?>
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
    <?php if ($atualizado): ?>
        <div class="alert alert-success">Livro atualizado com sucesso!</div>
    <?php endif; ?>
    <?php if ($excluido): ?>
        <div class="alert alert-success">Livro excluído com sucesso!</div>
    <?php endif; ?>

    <?php if (empty($livros)): ?>
        <div class="alert alert-info">Nenhum livro cadastrado ainda.</div>
    <?php else: ?>
        <table class="table table-striped table-hover bg-white rounded shadow-sm align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>ISBN</th>
                    <th>Editora</th>
                    <th>Ano</th>
                    <th>Qtd</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livros as $livro): ?>
                    <tr>
                        <td><?= $livro['id_livro'] ?></td>
                        <td><?= htmlspecialchars($livro['titulo']) ?></td>
                        <td><?= htmlspecialchars($livro['isbn']) ?></td>
                        <td><?= htmlspecialchars($livro['editora']) ?></td>
                        <td><?= $livro['ano_publicacao'] ?></td>
                        <td><?= $livro['quantidade'] ?></td>
                        <td>
                            <span class="badge bg-<?= $livro['status'] === 'DISPONIVEL' ? 'success' : 'secondary' ?>">
                                <?= $livro['status'] ?>
                            </span>
                        </td>
                        <td>
                            <a href="/livros/editar/<?= $livro['id_livro'] ?>" class="btn btn-sm btn-outline-primary">Editar</a>
                            <form action="/livros/excluir/<?= $livro['id_livro'] ?>" method="POST" class="d-inline"
                                  onsubmit="return confirm('Excluir o livro &quot;<?= htmlspecialchars($livro['titulo']) ?>&quot;?');">
                                <button type="submit" class="btn btn-sm btn-outline-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
</body>
</html>

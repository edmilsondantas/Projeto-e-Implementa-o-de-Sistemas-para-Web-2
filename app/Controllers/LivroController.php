<?php

require_once __DIR__ . '/../Models/Livro.php';

class LivroController
{
    public function listar()
    {
        $livroModel = new Livro();

        $livros = $livroModel->listar();

        require __DIR__ . '/../Views/livros/listar.php';
    }

    public function cadastrar()
    {
        $livroModel = new Livro();

        $autores = $livroModel->listarAutores();
        $categorias = $livroModel->listarCategorias();

        require __DIR__ . '/../Views/livros/cadastrar.php';
    }

    public function salvar()
    {
        $dados = [
            'id_autor'       => $_POST['id_autor'] ?? '',
            'id_categoria'   => $_POST['id_categoria'] ?? '',
            'titulo'         => trim($_POST['titulo'] ?? ''),
            'isbn'           => trim($_POST['isbn'] ?? ''),
            'editora'        => trim($_POST['editora'] ?? ''),
            'ano_publicacao' => $_POST['ano_publicacao'] ?: null,
            'quantidade'     => $_POST['quantidade'] ?: 1,
            'status'         => 'DISPONIVEL',
        ];

        if ($dados['titulo'] === '' || $dados['id_autor'] === '' || $dados['id_categoria'] === '') {
            header('Location: /livros/cadastrar?erro=1');
            exit;
        }

        $livroModel = new Livro();
        $livroModel->cadastrar($dados);

        header('Location: /livros?sucesso=1');
        exit;
    }
    public function editar($id)
{
    $livroModel = new Livro();
    $livro = $livroModel->buscarPorId((int) $id);

    if (!$livro) {
        http_response_code(404);
        require __DIR__ . '/../Views/errors/404.php';
        exit;
    }

    $autores = $livroModel->listarAutores();
    $categorias = $livroModel->listarCategorias();

    require __DIR__ . '/../Views/livros/editar.php';
}

public function atualizar($id)
{
    $dados = [
        'id_autor'       => $_POST['id_autor'] ?? '',
        'id_categoria'   => $_POST['id_categoria'] ?? '',
        'titulo'         => trim($_POST['titulo'] ?? ''),
        'isbn'           => trim($_POST['isbn'] ?? ''),
        'editora'        => trim($_POST['editora'] ?? ''),
        'ano_publicacao' => $_POST['ano_publicacao'] ?: null,
        'quantidade'     => $_POST['quantidade'] ?: 1,
        'status'         => $_POST['status'] ?? 'DISPONIVEL',
    ];

    if ($dados['titulo'] === '' || $dados['id_autor'] === '' || $dados['id_categoria'] === '') {
        header('Location: /livros/editar/' . $id . '?erro=1');
        exit;
    }

    $livroModel = new Livro();
    $livroModel->atualizar((int) $id, $dados);

    header('Location: /livros?atualizado=1');
    exit;
}

public function excluir($id)
{
    $livroModel = new Livro();
    $livroModel->excluir((int) $id);

    header('Location: /livros?excluido=1');
    exit;
}
}

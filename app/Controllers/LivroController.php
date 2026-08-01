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
}

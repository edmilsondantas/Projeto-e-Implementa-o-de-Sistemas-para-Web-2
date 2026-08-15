<?php
return [
    'GET' => [
        '/' => ['HomeController', 'index'],
        '/usuarios' => ['UsuarioController', 'listar'],
        '/livros' => ['LivroController', 'listar'],
        '/livros/cadastrar' => ['LivroController', 'cadastrar'],
        '/livros/editar/{id}' => ['LivroController', 'editar'],
        '/autores' => ['AutorController', 'listar'],
        '/categorias' => ['CategoriaController', 'listar'],
        '/emprestimos' => ['EmprestimoController', 'listar'],
    ],
    'POST' => [
        '/livros/cadastrar' => ['LivroController', 'salvar'],
        '/livros/atualizar/{id}' => ['LivroController', 'atualizar'],
        '/livros/excluir/{id}' => ['LivroController', 'excluir'],
    ],
];

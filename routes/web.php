<?php

return [
    'GET' => [
        '/' => ['HomeController', 'index'],
        '/usuarios' => ['UsuarioController', 'listar'],
        '/livros' => ['LivroController', 'listar'],
        '/livros/cadastrar' => ['LivroController', 'cadastrar'],
        '/autores' => ['AutorController', 'listar'],
        '/categorias' => ['CategoriaController', 'listar'],
        '/emprestimos' => ['EmprestimoController', 'listar'],
    ],
    'POST' => [
        '/livros/cadastrar' => ['LivroController', 'salvar'],
    ],
];

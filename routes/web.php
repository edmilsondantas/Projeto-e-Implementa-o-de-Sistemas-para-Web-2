<?php

return [
    'GET' => [
        '/' => ['HomeController', 'index'],
        '/usuarios' => ['UsuarioController', 'listar'],
        '/livros' => ['LivroController', 'listar'],
        '/autores' => ['AutorController', 'listar'],
        '/categorias' => ['CategoriaController', 'listar'],
        '/emprestimos' => ['EmprestimoController', 'listar'],
    ],
];

<?php

require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/UsuarioController.php';
require_once __DIR__ . '/../app/Controllers/LivroController.php';
require_once __DIR__ . '/../app/Controllers/AutorController.php';
require_once __DIR__ . '/../app/Controllers/CategoriaController.php';
require_once __DIR__ . '/../app/Controllers/EmprestimoController.php';

$rotas = require __DIR__ . '/../routes/web.php';

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$caminho = rtrim($caminho, '/');

if ($caminho == '') {
    $caminho = '/';
}

$rota = $rotas[$metodo][$caminho] ?? null;

if (!$rota) {
    http_response_code(404);
    require __DIR__ . '/../app/Views/errors/404.php';
    exit;
}

$controllerNome = $rota[0];
$acao = $rota[1];

$controller = new $controllerNome();
$controller->$acao();

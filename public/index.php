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
$caminho = rtrim($caminho, '/') ?: '/';

function rotear(array $rotas, string $metodo, string $caminho): ?array
{
    foreach ($rotas[$metodo] ?? [] as $padrao => $acao) {
        $regex = preg_replace('#\{[a-zA-Z_]+\}#', '([^/]+)', $padrao);
        $regex = '#^' . $regex . '$#';

        if (preg_match($regex, $caminho, $matches)) {
            array_shift($matches); // remove o match completo
            return ['acao' => $acao, 'parametros' => $matches];
        }
    }
    return null;
}

$rota = rotear($rotas, $metodo, $caminho);

if ($rota === null) {
    http_response_code(404);
    require __DIR__ . '/../app/Views/errors/404.php';
    exit;
}

[$controller, $metodoAcao] = $rota['acao'];
$controller = new $controller();
call_user_func_array([$controller, $metodoAcao], $rota['parametros']);

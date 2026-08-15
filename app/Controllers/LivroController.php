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

        $erros = $this->validar($dados);

        if (!empty($erros)) {
            header('Location: /livros/cadastrar?erro=' . implode(',', $erros));
            exit;
        }

        $livroModel = new Livro();

        if ($dados['isbn'] !== '' && $livroModel->buscarPorIsbn($dados['isbn'])) {
            header('Location: /livros/cadastrar?erro=isbn_existente');
            exit;
        }

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

        $erros = $this->validar($dados);

        if (!empty($erros)) {
            header('Location: /livros/editar/' . $id . '?erro=' . implode(',', $erros));
            exit;
        }

        $livroModel = new Livro();

        if ($dados['isbn'] !== '' && $livroModel->buscarPorIsbn($dados['isbn'], (int) $id)) {
            header('Location: /livros/editar/' . $id . '?erro=isbn_existente');
            exit;
        }

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

    private function validar(array $dados): array
    {
        $erros = [];

        if (trim($dados['titulo']) === '') {
            $erros[] = 'titulo';
        }

        if ($dados['id_autor'] === '') {
            $erros[] = 'autor';
        }

        if ($dados['id_categoria'] === '') {
            $erros[] = 'categoria';
        }

        if ($dados['isbn'] !== '') {
            $isbnLimpo = preg_replace('/[^0-9]/', '', $dados['isbn']);
            if (!preg_match('/^\d{10}(\d{3})?$/', $isbnLimpo)) {
                $erros[] = 'isbn';
            }
        }

        if ($dados['ano_publicacao'] !== null && $dados['ano_publicacao'] !== '') {
            $ano = (int) $dados['ano_publicacao'];
            if ($ano < 1000 || $ano > (int) date('Y') + 1) {
                $erros[] = 'ano';
            }
        }

        if ((int) $dados['quantidade'] < 1) {
            $erros[] = 'quantidade';
        }

        if (!in_array($dados['status'], ['DISPONIVEL', 'INDISPONIVEL'], true)) {
            $erros[] = 'status';
        }

        return $erros;
    }
}

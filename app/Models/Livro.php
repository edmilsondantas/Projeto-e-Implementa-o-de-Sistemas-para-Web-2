<?php

require_once __DIR__ . '/Conexao.php';

class Livro
{
    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::conectar();
    }

    public function listar()
    {
        $sql = "SELECT * FROM livros";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cadastrar(array $dados)
    {
        $sql = "INSERT INTO livros
                    (id_autor, id_categoria, titulo, isbn, editora, ano_publicacao, quantidade, status)
                VALUES
                    (:id_autor, :id_categoria, :titulo, :isbn, :editora, :ano_publicacao, :quantidade, :status)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(':id_autor', $dados['id_autor']);
        $stmt->bindValue(':id_categoria', $dados['id_categoria']);
        $stmt->bindValue(':titulo', $dados['titulo']);
        $stmt->bindValue(':isbn', $dados['isbn']);
        $stmt->bindValue(':editora', $dados['editora']);
        $stmt->bindValue(':ano_publicacao', $dados['ano_publicacao']);
        $stmt->bindValue(':quantidade', $dados['quantidade']);
        $stmt->bindValue(':status', $dados['status']);

        return $stmt->execute();
    }

    // Auxiliares para popular os <select> do formulário de cadastro.
    // Como ainda não existem os Models Autor e Categoria, ficam aqui por ora.
    public function listarAutores()
    {
        $sql = "SELECT * FROM autores ORDER BY nome";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarCategorias()
    {
        $sql = "SELECT * FROM categorias ORDER BY nome";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function buscarPorId(int $id)
{
    $sql = "SELECT * FROM livros WHERE id_livro = :id";

    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function atualizar(int $id, array $dados)
{
    $sql = "UPDATE livros SET
                id_autor = :id_autor,
                id_categoria = :id_categoria,
                titulo = :titulo,
                isbn = :isbn,
                editora = :editora,
                ano_publicacao = :ano_publicacao,
                quantidade = :quantidade,
                status = :status
            WHERE id_livro = :id";

    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(':id_autor', $dados['id_autor']);
    $stmt->bindValue(':id_categoria', $dados['id_categoria']);
    $stmt->bindValue(':titulo', $dados['titulo']);
    $stmt->bindValue(':isbn', $dados['isbn']);
    $stmt->bindValue(':editora', $dados['editora']);
    $stmt->bindValue(':ano_publicacao', $dados['ano_publicacao']);
    $stmt->bindValue(':quantidade', $dados['quantidade']);
    $stmt->bindValue(':status', $dados['status']);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    return $stmt->execute();
}

public function excluir(int $id)
{
    $sql = "DELETE FROM livros WHERE id_livro = :id";

    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    return $stmt->execute();
}
    public function buscarPorIsbn(string $isbn, ?int $ignorarId = null)
{
    $sql = "SELECT * FROM livros WHERE isbn = :isbn";

    if ($ignorarId !== null) {
        $sql .= " AND id_livro <> :id";
    }

    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(':isbn', $isbn);

    if ($ignorarId !== null) {
        $stmt->bindValue(':id', $ignorarId, PDO::PARAM_INT);
    }

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
}

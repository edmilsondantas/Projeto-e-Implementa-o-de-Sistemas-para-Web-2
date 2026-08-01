-- ===========================================
-- BANCO DE DADOS - SISTEMA DE BIBLIOTECA
-- ===========================================

DROP DATABASE IF EXISTS biblioteca;

CREATE DATABASE biblioteca
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE biblioteca;

-- ===========================================
-- TABELA PERFIS
-- ===========================================

CREATE TABLE perfis (
    id_perfil INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL
);

-- ===========================================
-- TABELA AUTORES
-- ===========================================

CREATE TABLE autores (
    id_autor INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL
);

-- ===========================================
-- TABELA CATEGORIAS
-- ===========================================

CREATE TABLE categorias (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

-- ===========================================
-- TABELA USUÁRIOS
-- ===========================================

CREATE TABLE usuarios (

    id_usuario INT AUTO_INCREMENT PRIMARY KEY,

    id_perfil INT NOT NULL,

    matricula VARCHAR(20) NOT NULL UNIQUE,

    nome VARCHAR(150) NOT NULL,

    cpf CHAR(11) NOT NULL UNIQUE,

    email VARCHAR(150) NOT NULL UNIQUE,

    telefone VARCHAR(20),

    curso VARCHAR(100),

    periodo VARCHAR(30),

    senha VARCHAR(255) NOT NULL,

    foto VARCHAR(255),

    status ENUM('ATIVO','INATIVO') DEFAULT 'ATIVO',

    CONSTRAINT fk_usuario_perfil
        FOREIGN KEY(id_perfil)
        REFERENCES perfis(id_perfil)

);

-- ===========================================
-- TABELA LIVROS
-- ===========================================

CREATE TABLE livros (

    id_livro INT AUTO_INCREMENT PRIMARY KEY,

    id_autor INT NOT NULL,

    id_categoria INT NOT NULL,

    titulo VARCHAR(200) NOT NULL,

    isbn VARCHAR(20),

    editora VARCHAR(150),

    ano_publicacao YEAR,

    quantidade INT DEFAULT 1,

    capa VARCHAR(255),

    status ENUM('DISPONIVEL','INDISPONIVEL')
    DEFAULT 'DISPONIVEL',

    CONSTRAINT fk_livro_autor
        FOREIGN KEY(id_autor)
        REFERENCES autores(id_autor),

    CONSTRAINT fk_livro_categoria
        FOREIGN KEY(id_categoria)
        REFERENCES categorias(id_categoria)

);

-- ===========================================
-- TABELA EMPRÉSTIMOS
-- ===========================================

CREATE TABLE emprestimos (

    id_emprestimo INT AUTO_INCREMENT PRIMARY KEY,

    id_livro INT NOT NULL,

    id_usuario INT NOT NULL,

    id_bibliotecario INT NOT NULL,

    data_emprestimo DATE NOT NULL,

    data_prevista_devolucao DATE NOT NULL,

    data_devolucao DATE,

    status ENUM(
        'EMPRESTADO',
        'DEVOLVIDO',
        'ATRASADO'
    ) DEFAULT 'EMPRESTADO',

    CONSTRAINT fk_emprestimo_livro
        FOREIGN KEY(id_livro)
        REFERENCES livros(id_livro),

    CONSTRAINT fk_emprestimo_usuario
        FOREIGN KEY(id_usuario)
        REFERENCES usuarios(id_usuario),

    CONSTRAINT fk_emprestimo_bibliotecario
        FOREIGN KEY(id_bibliotecario)
        REFERENCES usuarios(id_usuario)

);

-- ===========================================
-- DADOS INICIAIS
-- ===========================================

INSERT INTO perfis(nome) VALUES
('Administrador'),
('Bibliotecário'),
('Aluno');

INSERT INTO autores(nome) VALUES
('Machado de Assis'),
('Clarice Lispector'),
('J. K. Rowling');

INSERT INTO categorias(nome) VALUES
('Romance'),
('Tecnologia'),
('Fantasia');

INSERT INTO livros
(
id_autor,
id_categoria,
titulo,
isbn,
editora,
ano_publicacao,
quantidade,
status
)
VALUES
(
1,
1,
'Dom Casmurro',
'9788535914849',
'Editora Ática',
1899,
5,
'DISPONIVEL'
),
(
2,
1,
'A Hora da Estrela',
'9788532502063',
'Rocco',
1977,
3,
'DISPONIVEL'
),
(
3,
3,
'Harry Potter e a Pedra Filosofal',
'9788532511010',
'Rocco',
1997,
8,
'DISPONIVEL'
);

INSERT INTO usuarios
(
id_perfil,
matricula,
nome,
cpf,
email,
telefone,
curso,
periodo,
senha,
status
)
VALUES
(
2,
'2025001',
'Bibliotecário',
'11111111111',
'bibliotecario@biblioteca.com',
'87999999999',
'Biblioteconomia',
'1º',
'123456',
'ATIVO'
),
(
3,
'2025002',
'Aluno Teste',
'22222222222',
'aluno@biblioteca.com',
'87988888888',
'ADS',
'3º',
'123456',
'ATIVO'
);
# 📚 Biblioteca Digital

Sistema web desenvolvido para informatizar o gerenciamento de uma biblioteca universitária.

O projeto tem como objetivo substituir o controle manual realizado em papel, proporcionando maior organização, agilidade e segurança no gerenciamento do acervo, usuários e empréstimos.

---

# 👥 Equipe

- Eduardo Marques Holanda Guerra
- Erick Francisco da Silva
- Edmilson de Moura Dantas Júnior
- Maria Rita Rodrigues de Souza

---

# 📖 Descrição do Projeto

A **Biblioteca Digital** é um sistema web desenvolvido para informatizar o gerenciamento da biblioteca de uma faculdade.

Atualmente, o controle do acervo, dos empréstimos e das devoluções é realizado manualmente em papel, tornando o processo mais lento e sujeito a erros.

O sistema permitirá o cadastro e gerenciamento de livros, autores, categorias, usuários e empréstimos, proporcionando maior organização, agilidade e segurança no controle das informações da biblioteca.

---

# 🎯 Objetivo Geral

Desenvolver um sistema web para automatizar o gerenciamento da biblioteca de uma faculdade, permitindo controlar livros, usuários e empréstimos de forma organizada, segura e eficiente.

---

# 🎯 Objetivos Específicos

- Desenvolver uma aplicação utilizando arquitetura MVC.
- Criar um banco de dados relacional para armazenamento das informações da biblioteca.
- Implementar autenticação de usuários e controle de acesso por perfil.
- Permitir o cadastro, edição, exclusão e consulta de livros, autores, categorias e usuários.
- Implementar o gerenciamento de empréstimos e devoluções de livros.
- Desenvolver uma interface web intuitiva, organizada e responsiva.
- Aplicar boas práticas de organização de código e versionamento utilizando Git e GitHub.

---

# 👨‍💼 Público-alvo

O sistema será utilizado por uma biblioteca de uma faculdade, atendendo dois perfis de usuários:

## Administrador (Bibliotecário)

Responsável pelo gerenciamento completo do sistema:

- Cadastro de livros;
- Cadastro de autores;
- Cadastro de categorias;
- Cadastro de usuários;
- Controle de empréstimos;
- Controle de devoluções;
- Relatórios e indicadores.

## Aluno

Poderá:

- Consultar o acervo disponível;
- Pesquisar livros;
- Visualizar seus empréstimos;
- Consultar histórico de utilização da biblioteca.

---

# 🚀 Funcionalidades

## 🔐 Autenticação

- Login de usuários;
- Logout;
- Controle de sessões;
- Controle de acesso por perfil.

---

# 👨‍💼 Administrador

O administrador terá acesso às seguintes funcionalidades:

- Cadastrar, editar, listar e excluir livros;
- Cadastrar, editar, listar e excluir autores;
- Cadastrar, editar, listar e excluir categorias;
- Cadastrar, editar, listar e excluir alunos;
- Registrar empréstimos;
- Registrar devoluções;
- Realizar upload da capa dos livros;
- Visualizar relatórios;
- Acessar dashboard com indicadores.

---

# 🎓 Aluno

O aluno poderá:

- Realizar login;
- Consultar livros disponíveis;
- Pesquisar livros por título, autor ou categoria;
- Visualizar empréstimos ativos;
- Consultar histórico de empréstimos;
- Visualizar datas previstas para devolução.

---

# 📚 Módulos do Sistema

## Livros

- Cadastro;
- Edição;
- Exclusão;
- Listagem;
- Upload de capa.

## Autores

- Cadastro;
- Edição;
- Exclusão;
- Listagem.

## Categorias

- Cadastro;
- Edição;
- Exclusão;
- Listagem.

## Usuários

- Cadastro;
- Edição;
- Exclusão;
- Listagem;
- Controle de perfil.

## Empréstimos

- Registro de empréstimos;
- Registro de devoluções;
- Consulta de empréstimos ativos;
- Histórico de empréstimos.

---

# 📊 Dashboard

O administrador terá acesso a indicadores:

- Total de livros cadastrados;
- Livros disponíveis;
- Livros emprestados;
- Total de alunos cadastrados;
- Empréstimos em atraso.

---

# 📋 Relatórios

O sistema disponibilizará:

- Relatório de livros cadastrados;
- Relatório de empréstimos;
- Relatório de livros disponíveis;
- Relatório de empréstimos em atraso.

---

# 🛠️ Tecnologias Utilizadas

- PHP
- Arquitetura MVC
- MySQL
- HTML5
- CSS3
- JavaScript
- Bootstrap 5
- Git
- GitHub
- XAMPP

---

# 🏗️ Arquitetura do Projeto

O sistema segue o padrão MVC:

```
biblioteca-digital

├── app
│   ├── Controllers
│   ├── Models
│   └── Views
│
├── config
│
├── database
│
├── public
│
├── routes
│
├── docs
│
├── README.md
└── .gitignore
```

## ▶️ Como executar (ambiente de desenvolvimento)

```bash
php -S localhost:8000 -t public
```

Depois acesse `http://localhost:8000` no navegador.

## 📍 Status da Entrega Parcial 2 — Estrutura MVC e Rotas

- [x] Estrutura de pastas MVC criada (`app/Controllers`, `app/Models`, `app/Views`).
- [x] Front Controller (`public/index.php`) recebendo todas as requisições.
- [x] Sistema de rotas centralizado em `routes/web.php`.
- [x] Controllers iniciais: Home, Usuário, Livro, Autor, Categoria, Empréstimo.
- [x] Views iniciais para cada módulo (layout compartilhado + listagem).
- [ ] CRUD completo com Models e PDO (próxima entrega).

## 📍 Status da Entrega Parcial 3 — CRUD Inicial

- [x] Conexão com o banco de dados via PDO (`Conexao.php`).
- [x] Model `Livro` com métodos de Create (`cadastrar`) e Read (`listar`).
- [x] Cadastro de livros (`/livros/cadastrar`) com formulário e validação dos campos obrigatórios.
- [x] Listagem de livros (`/livros`) exibindo os dados reais cadastrados no banco.
- [x] Demonstração funcional do fluxo completo: cadastro → listagem.
- [ ] CRUD completo (Update e Delete) e demais entidades (próximas entregas).

---

# 🗄️ Banco de Dados

O banco de dados será relacional utilizando MySQL.

Entidades principais:

- Perfis;
- Usuários;
- Autores;
- Categorias;
- Livros;
- Empréstimos.

---

# 🔗 Modelo do Banco

## Perfis

Armazena os tipos de usuários:

- Administrador;
- Aluno.

## Usuários

Armazena:

- Matrícula;
- Nome;
- CPF;
- E-mail;
- Telefone;
- Curso;
- Período;
- Senha;
- Foto;
- Status.

## Livros

Armazena:

- Título;
- ISBN;
- Autor;
- Categoria;
- Editora;
- Ano de publicação;
- Quantidade;
- Capa;
- Status.

## Empréstimos

Controla:

- Livro;
- Aluno;
- Bibliotecário responsável;
- Data do empréstimo;
- Data prevista de devolução;
- Data de devolução;
- Status.

---

# 📌 Requisitos do Sistema

## Requisitos Funcionais

- Cadastro de usuários;
- Login e autenticação;
- Controle de acesso por perfil;
- CRUD de livros;
- CRUD de autores;
- CRUD de categorias;
- Registro de empréstimos;
- Registro de devoluções;
- Upload de arquivos;
- Relatórios;
- Consulta de livros pelos alunos.

---

## Requisitos Não Funcionais

- PHP com arquitetura MVC;
- Banco MySQL;
- Interface responsiva com Bootstrap 5;
- Controle de sessões;
- Segurança de autenticação;
- Versionamento com Git/GitHub;
- Validação de dados;
- Tratamento de erros;
- Deploy em servidor web.

---

# 📁 Estrutura do Repositório

```
biblioteca-digital

├── app
├── config
├── database
├── docs
├── public
├── routes
├── README.md
└── .gitignore
```

---

# 📌 Status do Projeto

🚧 Em desenvolvimento

Projeto desenvolvido para a disciplina **Projeto Integrador**.
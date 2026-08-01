
Table perfis {
  id_perfil int [pk]
  nome varchar
}

Table usuarios {
  id_usuario int [pk]
  id_perfil int [ref: > perfis.id_perfil]
  matricula varchar
  nome varchar
  cpf varchar
  email varchar
  telefone varchar
  curso varchar
  periodo varchar
  senha varchar
  foto varchar
  status varchar
}

Table autores {
  id_autor int [pk]
  nome varchar
}

Table categorias {
  id_categoria int [pk]
  nome varchar
}

Table livros {
  id_livro int [pk]
  id_autor int [ref: > autores.id_autor]
  id_categoria int [ref: > categorias.id_categoria]
  titulo varchar
  isbn varchar
  editora varchar
  ano_publicacao int
  quantidade int
  capa varchar
  status varchar
}

Table emprestimos {
  id_emprestimo int [pk]
  id_livro int [ref: > livros.id_livro]
  id_usuario int [ref: > usuarios.id_usuario]
  id_bibliotecario int [ref: > usuarios.id_usuario]
  data_emprestimo date
  data_prevista_devolucao date
  data_devolucao date
  status varchar
}

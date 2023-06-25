<?php
$pages = [
  "cadastrarUsuario" => "./src/usuario/cadastra.php",
  "listarUsuario" => "./src/usuario/lista.php",
  "salvarUsuario" => "./src/usuario/salvar.php",
  "editarUsuario" => "./src/usuario/edita.php",
  "index" => "./src/session/index.php",
  "login" => "./src/session/login.php",
  "logout" => "./src/session/logout.php",
  "listarConta" => "./src/conta/lista.php",
  "salvarConta" => "./src/conta/salvar.php",
  "editarConta" => "./src/conta/editConta.php",
  "detalhesConta" => "./src/conta/detalhesConta.php",
  "cadastrarCategoria" => "./src/categoriaConta/cadastraCategoria.php",
  "editarCategoria" => "./src/categoriaConta/editaCategoria.php",
  "listarCategoria" => "./src/categoriaConta/listaCategoria.php",
  "salvarCategoria" => "./src/categoriaConta/salvaCategoria.php",
  "cadastrarTransacao" => "./src/registro/transacao/cadastraTransacao.php",
  "editarTransacao" => "./src/registro/transacao/editaTransacao.php",
  "listarTransacoes" => "./src/registro/transacao/listaTransacoes.php",
  "salvarTransacao" => "./src/registro/transacao/salvaTransacao.php",
  "cadastrarCategoriaRegistro" => "./src/registro/categoria/cadastraCategoriaRegistro.php",
  "editarCategoriaRegistro" => "./src/registro/categoria/editaCategoriaRegistro.php",
  "listarCategoriaRegistro" => "./src/registro/categoria/listaCategoriaRegistro.php",
  "salvarCategoriaRegistro" => "./src/registro/categoria/salvaCategoriaRegistro.php",
];

$page = @$_REQUEST["page"];
if (array_key_exists($page, $pages)) {
  include($pages[$page]);
} else {
  include("./src/dashboard/home.php");
}

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
  "listarCategoria" => "./src/conta/listaCategoria.php",
  "salvarConta" => "./src/conta/salvar.php",
  "editarConta" => "./src/conta/editConta.php",
];

$page = @$_REQUEST["page"];
if (array_key_exists($page, $pages)) {
  include($pages[$page]);
} else {
  include("./src/dashboard/home.php");
}

<?php

if (empty($_POST) or (empty($_POST["username"]) or (empty($_POST["senha"])))) {
  print "<script>location.href='?page=index'</script>";
}

$username = $_POST["username"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM `usuario` WHERE username = '{$username}' 
        AND senhaUsuario = '{$senha}';";

$res = $conn->query($sql) or die($conn->error);
$qtd = $res->num_rows;
$row = $res->fetch_object();

if ($qtd > 0) {
  $_SESSION["username"] = $row->username;
  $_SESSION["nome"] = $row->nomeUsuario;
  $_SESSION["email"] = $row->emailUsuario;
  print "<script>location.href='?page=default'</script>";
} else {
  print "<script>alert('Usuário ou senha incorretos!');</script>";
  print "<script>location.href='?page=index'</script>";
}

<?php
switch ($_REQUEST["acao"]) {
  case "cadastrarConta":
    $CategoriaConta_idCategoriaConta = $_POST["categoria"];
    $Usuario_idUsuario = $_POST["dono"];
    $nomeConta = $_POST["nomeConta"];
    $corConta = $_POST["cor"];
    $saldoConta = $_POST["saldo"];

    $sql = "INSERT INTO conta (CategoriaConta_idCategoriaConta, Usuario_idUsuario, nomeConta, corConta, saldoConta) VALUES ('{$CategoriaConta_idCategoriaConta}', '{$Usuario_idUsuario}', '{$nomeConta}', '{$corConta}', '{$saldoConta}')";

    $res = $conn->query($sql) or die($conn->error);
    if ($res == true) {
      print "<script>alert('Cadastrado com sucesso!');</script>";
      print "<script>location.href='?page=listarConta';</script>";
    } else {
      print "<script>alert('Não foi possível cadastrar!');</script>";
      print "<script>location.href='?page=listarConta';</script>";
    }
    break;

  case "editarConta":

    break;
  case "excluirConta":

    break;

  case "cadastrarCategoria":
    $nomeCategoriaConta = $_POST["nomeCategoriaConta"];
    $iconeCategoriaConta = $_POST["iconeCategoriaConta"];
    $statusCategoriaConta = 1;

    $sql = "INSERT INTO `categoriaconta` (`idCategoriaConta`, `nomeCategoriaConta`, `iconeCategoriaConta`, `statusCategoriaConta`) 
              VALUES (NULL, '{$nomeCategoriaConta}', '{$iconeCategoriaConta}', '{$statusCategoriaConta}')";

    $res = $conn->query($sql) or die($conn->error);

    if ($res == true) {
      //print "<script>alert('Cadastrado com sucesso!');</script>";
      print "<script>location.href='?page=listarCategoria';</script>";
    } else {
      print "<script>alert('Não foi possível cadastrar!');</script>";
      print "<script>location.href='?page=listarCategoria';</script>";
    }
    break;

  case "editarCategoria":

    break;

  case "excluirCategoria":
}

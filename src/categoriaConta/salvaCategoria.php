<?php
switch ($_REQUEST["acao"]) {
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
    $idCategoriaConta = $_POST["idCategoriaConta"];
    $nomeCategoriaConta = $_POST["nomeCategoriaConta"];
    $iconeCategoriaConta = $_POST["iconeCategoriaConta"];
    $statusCategoriaConta = $_POST["statusCategoriaConta"] == "on" ? 1 : 0;

    $sql = "UPDATE `categoriaconta` 
            SET `nomeCategoriaConta` = '{$nomeCategoriaConta}', 
            `iconeCategoriaConta` = '{$iconeCategoriaConta}',
            `statusCategoriaConta` = '{$statusCategoriaConta}' 
            WHERE `categoriaconta`.`idCategoriaConta` = {$idCategoriaConta}";

    $res = $conn->query($sql) or die($conn->error);

    if ($res == true) {
      //print "<script>alert('Editado com sucesso!');</script>";
      //print "<script>location.href='?page=listarCategoria';</script>";
    } else {
      print "<script>alert('Não foi possível editar!');</script>";
      print "<script>location.href='?page=listarCategoria';</script>";
    }
    break;

  case "excluirCategoria":
}

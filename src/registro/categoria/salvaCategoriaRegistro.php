<?php
switch ($_REQUEST["acao"]) {
  case "cadastrarCategoriaRegistro":
    $TipoRegistro_idTipoRegistro = $_POST["TipoRegistro_idTipoRegistro"];
    $descricaoCategoriaRegistro = $_POST["descricaoCategoriaRegistro"];
    $iconeCategoriaRegistro     = $_POST["iconeCategoriaRegistro"];
    $corCategoriaRegistro       = $_POST["corCategoriaRegistro"];
    $idCategoriaPai             = $_POST["idCategoriaPai"];
    $statusCategoriaRegistro    = $_POST["statusCategoriaRegistro"] == "on" ? 1 : 0;
    $permiteFilhos              = $_POST["permiteFilhos"] == "on" ? 1 : 0;

    $sql = "INSERT INTO categoriaRegistro (TipoRegistro_idTipoRegistro, descricaoCategoriaRegistro, iconeCategoriaRegistro, corCategoriaRegistro, statusCategoriaRegistro, permiteFilhos, idCategoriaPai) 
    VALUES ('$TipoRegistro_idTipoRegistro', '$descricaoCategoriaRegistro', '$iconeCategoriaRegistro', '$corCategoriaRegistro', '$statusCategoriaRegistro', '$permiteFilhos', '$idCategoriaPai')";

    $res = $conn->query($sql) or die($conn->error);

    if ($res == true) {
      //print "<script>alert('Cadastrado com sucesso!');</script>";
      print "<script>location.href='?page=listarCategoriaRegistro';</script>";
    } else {
      print "<script>alert('Não foi possível cadastrar!');</script>";
      print "<script>location.href='?page=listarCategoriaRegistro';</script>";
    }

    break;
  case "editarCategoriaRegistro":
    $TipoRegistro_idTipoRegistro = $_POST["TipoRegistro_idTipoRegistro"];
    $descricaoCategoriaRegistro = $_POST["descricaoCategoriaRegistro"];
    $iconeCategoriaRegistro     = $_POST["iconeCategoriaRegistro"];
    $corCategoriaRegistro       = $_POST["corCategoriaRegistro"];
    $statusCategoriaRegistro    = $_POST["statusCategoriaRegistro"] == "on" ? 1 : 0;
    $permiteFilhos              = $_POST["permiteFilhos"] == "on" ? 1 : 0;
    $idCategoriaRegistro        = $_POST["idCategoriaRegistro"];
    $idCategoriaPai             = $_POST["idCategoriaPai"];

    $sql = "UPDATE categoriaRegistro 
            SET TipoRegistro_idTipoRegistro = '$TipoRegistro_idTipoRegistro', 
            descricaoCategoriaRegistro = '$descricaoCategoriaRegistro', 
            iconeCategoriaRegistro = '$iconeCategoriaRegistro', 
            corCategoriaRegistro = '$corCategoriaRegistro', 
            statusCategoriaRegistro = '$statusCategoriaRegistro', 
            permiteFilhos = '$permiteFilhos',
            idCategoriaPai = '$idCategoriaPai'
            WHERE idCategoriaRegistro = '$idCategoriaRegistro'";

    $res = $conn->query($sql) or die($conn->error);

    if ($res == true) {
      //print "<script>alert('Editado com sucesso!');</script>";
      print "<script>location.href='?page=listarCategoriaRegistro';</script>";
    } else {
      print "<script>alert('Não foi possível editar!');</script>";
      print "<script>location.href='?page=listarCategoriaRegistro';</script>";
    }

    break;
}

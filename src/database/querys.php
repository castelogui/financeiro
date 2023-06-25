<?php
$sql = "SELECT * FROM conta";
$res = $conn->query($sql);
$qtd = $res->num_rows;

$sqlCategoria = "SELECT * FROM categoriaConta";
$resCategoria = $conn->query($sqlCategoria);
$qtdCategoria = $resCategoria->num_rows;

$sqlUsuario = "SELECT * FROM usuario";
$resUsuario = $conn->query($sqlUsuario);
$qtdUsuario = $resUsuario->num_rows;

function getContaById($idConta, $conn)
{
  $sql = "SELECT * FROM conta WHERE idConta = {$idConta}";
  $res = $conn->query($sql) or die($conn->error);
  $qtd = $res->num_rows;

  if ($qtd > 0) {
    $row = $res->fetch_object();
    return $row;
  } else {
    return "Conta não encontrada";
  }
}


function getUserById($idUsuario, $conn)
{
  $sql = "SELECT * FROM usuario WHERE idUsuario = {$idUsuario}";
  $res = $conn->query($sql) or die($conn->error);
  $qtd = $res->num_rows;

  if ($qtd > 0) {
    $row = $res->fetch_object();
    return $row;
  } else {
    return "Usuário não encontrado";
  }
}

function getCategoriaContaById($idCategoriaConta, $conn)
{
  $sql = "SELECT * FROM categoriaConta WHERE idCategoriaConta = {$idCategoriaConta}";
  $res = $conn->query($sql) or die($conn->error);
  $qtd = $res->num_rows;

  if ($qtd > 0) {
    $row = $res->fetch_object();
    return $row;
  } else {
    return "Categoria não encontrada";
  }
}

function getCategoriaRegistroById($idCategoriaRegistro, $conn)
{
  $sql = "SELECT * FROM categoriaRegistro WHERE idCategoriaRegistro = {$idCategoriaRegistro}";
  $res = $conn->query($sql) or die($conn->error);
  $qtd = $res->num_rows;

  if ($qtd > 0) {
    $row = $res->fetch_object();
    return $row;
  } else {
    return "Categoria não encontrada";
  }
}

function getTipoRegistroById($idTipoRegistro, $conn)
{
  $sql = "SELECT * FROM tipoRegistro WHERE idTipoRegistro = {$idTipoRegistro}";
  $res = $conn->query($sql) or die($conn->error);
  $qtd = $res->num_rows;

  if ($qtd > 0) {
    $row = $res->fetch_object();
    return $row;
  } else {
    return "Tipo de registro não encontrado";
  }
}

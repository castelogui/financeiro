<?php
switch ($_REQUEST["acao"]) {
  case "cadastrarTransacao":
    $TipoRegistro_idTipoRegistro = $_REQUEST["TipoRegistro_idTipoRegistro"];
    $valorRegistro = $_REQUEST["valorRegistro"];
    $dataRegistro = $_REQUEST["dataRegistro"];
    $horaRegistro = $_REQUEST["horaRegistro"];
    $descricaoRegistro = $_REQUEST["descricaoRegistro"];
    $CategoriaRegistro_idCategoriaRegistro = $_REQUEST["CategoriaRegistro_idCategoriaRegistro"];
    $Usuario_idUsuario = $_REQUEST["Usuario_idUsuario"];
    $Conta_idConta = $_REQUEST["Conta_idConta"];
    $statusRegistro = $_REQUEST["statusRegistro"];

    $sql = "INSERT INTO registro (TipoRegistro_idTipoRegistro, 
                                  valorRegistro, 
                                  dataRegistro,
                                  horaRegistro, 
                                  descricaoRegistro, 
                                  CategoriaRegistro_idCategoriaRegistro, 
                                  Usuario_idUsuario, 
                                  Conta_idConta, 
                                  statusRegistro) 
                          VALUES ('$TipoRegistro_idTipoRegistro', 
                                  '$valorRegistro', 
                                  '$dataRegistro', 
                                  '$horaRegistro', 
                                  '$descricaoRegistro', 
                                  '$CategoriaRegistro_idCategoriaRegistro', 
                                  '$Usuario_idUsuario', 
                                  '$Conta_idConta', 
                                  '$statusRegistro')";
    $res = $conn->query($sql) or die($conn->error);

    if ($res == true) {
      //print "<script>alert('Cadastrado com sucesso!');</script>";
      print "<script>location.href='?page=listarTransacoes';</script>";
    } else {
      print "<script>alert('Não foi possível cadastrar!');</script>";
      print "<script>location.href='?page=listarTransacoes';</script>";
    }
    break;
}

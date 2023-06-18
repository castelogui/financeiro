<?php
switch ($_REQUEST["acao"]) {
  case "cadastrar":
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $dtNasc = $_POST["dtNasc"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "INSERT INTO usuario (nomeUsuario, sobrenomeUsuario, dtNascUsuario, username, emailUsuario, senhaUsuario) VALUES ('{$nome}', '{$sobrenome}', '{$dtNasc}', '{$username}', '{$email}', '{$senha}')";


    $res = $conn->query($sql);

    if ($res == true) {
      print "<script>alert('Cadastrado com sucesso: {$username}');</script>";
      print "<script>location.href='?page=listarUsuario';</script>";
    } else {
      print "<script>alert('Não foi possível cadastrar usuário: {$username}');</script>";
      print "<script>location.href='?page=listarUsuario';</script>";
    }

    break;

  case "editar":
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $dtNasc = $_POST["dtNasc"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $status = $_POST["status"] == "on" ? 1 : 0;

    $sql = "UPDATE usuario SET
            nomeUsuario='{$nome}', 
            sobrenomeUsuario='{$sobrenome}', 
            dtNascUsuario='{$dtNasc}', 
            username='{$username}', 
            emailUsuario='{$email}', 
            senhaUsuario='{$senha}',
            statusUsuario='{$status}'
            WHERE idUsuario ={$_REQUEST['idUsuario']}";

    $res = $conn->query($sql) or die($conn->error);

    if ($res == true) {
      //print "<script>alert('Editado com sucesso: {$username}');</script>";
      print "<script>location.href='?page=listarUsuario';</script>";
    } else {
      print "<script>alert('Não foi possível editar usuário: {$username}');</script>";
      print "<script>location.href='?page=listarUsuario';</script>";
    }

    break;


  case "ativar":
    $sql = "UPDATE usuario SET statusUsuario=1 WHERE idUsuario ={$_REQUEST['idUsuario']}";

    $res = $conn->query($sql);

    print "<script>location.href='?page=editarUsuario&idUsuario={$_REQUEST['idUsuario']}';</script>";

    break;
  case "inativar":
    $sql = "UPDATE usuario SET statusUsuario=0 WHERE idUsuario ={$_REQUEST['idUsuario']}";

    $res = $conn->query($sql);

    print "<script>location.href='?page=editarUsuario&idUsuario={$_REQUEST['idUsuario']}';</script>";

    break;
  case "excluir":
    $sql = "DELETE FROM usuario WHERE idUsuario ={$_REQUEST['idUsuario']}";

    $res = $conn->query($sql);

    if ($res == true) {
      print "<script>alert('Excluido com sucesso');</script>";
      print "<script>location.href='?page=listarUsuario';</script>";
    } else {
      print "<script>alert('Não foi possível excluir usuário');</script>";
      print "<script>location.href='?page=listarUsuario';</script>";
    }
    break;
}

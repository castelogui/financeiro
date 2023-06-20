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

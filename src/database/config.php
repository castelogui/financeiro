<?php
define("HOST", '127.0.0.1');
define("USER", 'root');
define("PASS", 'root');
define("BASE", 'financeiro');

$conn = new Mysqli(HOST, USER, PASS, BASE);

// Verifica se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

//echo "Conexão com o banco de dados estabelecida com sucesso!";
?>

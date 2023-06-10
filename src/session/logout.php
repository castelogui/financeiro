<?php
unset($_SESSION["username"]);
unset($_SESSION["nome"]);
unset($_SESSION["email"]);
session_destroy();
print "<script>location.href='?page=index'</script>";
exit;

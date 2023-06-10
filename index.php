<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="./src/util/style-btn-switch.css">
  <title>Cadastro de Usuário</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a href="./index.php" class="navbar-brand">Controle Financeiro</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarToggleExternalContent">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <?php
          if (!empty($_SESSION)) {
            print '
                <li class="nav-item">
                  <a class="nav-link" href="?page=listarUsuario">Usuários</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Receitas</a>
                </li>
              ';
          }
          ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <div class="btn-toolbar" role="toolbar">
            <div class="btn-group mr-2" role="group">
              <?php
              if (empty($_SESSION)) {
                print "<a class='btn btn-success my-2 my-sm-0' 
                onclick=\"location.href='?page=index';\">Entrar</a>";
              } else {
                print "
                <div class='btn-group' role='group'>
                  <button id='btnGroupDrop1' type='button' class='btn btn-secondary dropdown-toggle' 
                  data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    <img src='https://avatars.githubusercontent.com/u/48875867?s=96&amp;v=4' 
                    alt='@castelogui' width='28'  class='rounded mr-3'>
                    {$_SESSION['username']}
                  </button>
                  <div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>
                    <a class='dropdown-item' href='#'>Meu Perfil</a>
                    <a class='dropdown-item' href='#'>Definições</a>
                    <div class='container'>
                      <a class='btn btn-outline-danger btn-block my-2 my-sm-0' type='submit'
                      onclick=\"location.href='?page=logout';\">Sair</a>
                    </div>
                  </div>
                </div>";
              }

              ?>
            </div>
          </div>
        </form>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col mt-5">
        <?php
        include("./src/database/config.php");
        switch (@$_REQUEST["page"]) {
          case "cadastrarUsuario":
            include("./src/usuario/cadastra.php");
            break;
          case "listarUsuario":
            include("./src/usuario/lista.php");
            break;
          case "salvarUsuario":
            include("./src/usuario/salvar.php");
            break;
          case "editarUsuario":
            include("./src/usuario/edita.php");
            break;
          case "index":
            include("./src/session/index.php");
            break;
          case "login":
            include("./src/session/login.php");
            break;
          case "logout":
            include("./src/session/logout.php");
            break;
          default:
            include("./src/dashboard/home.php");
        }
        ?>
      </div>
    </div>
  </div>
  <!-- JavaScript (Opcional) -->
  <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>
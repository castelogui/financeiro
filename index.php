<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/da1d70c44d.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./src/util/style-btn-switch.css">
  <link rel="stylesheet" href="./src/util/geral.css">
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
                  <a class="nav-link" href="?page=listarConta">Contas</a>
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
                    <img src='../../assets/images/element/perfil-demo.svg' 
                    alt='image user' width='34' class='rounded mr-3'>
                    @{$_SESSION['username']}
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
  <div class="container conteudo">
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
          case "listarConta":
            include("./src/conta/lista.php");
            break;
          case "listarCategoria":
            include("./src/conta/listaCategoria.php");
            break;
          case "salvarConta":
            include("./src/conta/salvar.php");
            break;
          default:
            include("./src/dashboard/home.php");
        }
        ?>
      </div>
    </div>
  </div>
  <div class="myfooter">

  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

</body>

</html>
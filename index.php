<?php
// Inicia a sessão
session_start();
// Recupera o valor do tema do localStorage usando PHP
$theme = "<script>localStorage.getItem('theme')</script>";
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="<?php echo $theme ?>">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Painel Financeiro</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/da1d70c44d.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/style-btn-switch.css">
  <link rel="stylesheet" href="./css/geral.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a href="./index.php" class="navbar-brand">Controle Financeiro</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarToggleExternalContent">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <?php if (!empty($_SESSION)) : ?>
            <li class="nav-item">
              <a class="nav-link" href="?page=listarUsuario">Usuários</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?page=listarConta">Contas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Receitas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Transações</a>
            </li>
          <?php endif; ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <?php if (empty($_SESSION)) : ?>
            <a class="btn btn-success my-2 my-sm-0" onclick="location.href='?page=index';">Entrar</a>
          <?php else : ?>
            <div class="btn-group" role="group">
              <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="../../assets/images/element/perfil-demo.svg" alt="image user" width="25" class="rounded mr-3">
                <?php echo '@' . $_SESSION['username']; ?>
              </button>
              <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="#">Meu Perfil</a>
                <a class="dropdown-item" href="#">Definições</a>
                <div class="container">
                  <a class="btn btn-outline-danger btn-block my-2 my-sm-0" type="submit" onclick="location.href='?page=logout';">Sair</a>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </form>
        <div class='switch'>
          <input type='checkbox' id='toggle' name='status' class='switch-checkbox'>
          <label for='toggle' class='switch-label'></label>
        </div>
      </div>
    </div>
  </nav>
  <div class="container conteudo">
    <div class="row">
      <div class="col mt-5">
        <?php
        include("./src/database/config.php");
        include("./src/util/pages.php");
        ?>
      </div>
    </div>
  </div>
  <?php
  include("./src/util/footer.php");
  ?>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  <script src="./js/theme.js"></script>
</body>

</html>
<?php if (empty($_SESSION)) : ?>
  <a class="btn btn-success me-3 my-sm-0" onclick="location.href='?page=index';">Entrar</a>
<?php else : ?>
  <div class="btn-group me-3" role="group">
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
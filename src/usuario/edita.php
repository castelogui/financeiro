<h1>Editar Usuario</h1>
<?php
$sql = "SELECT * FROM usuario WHERE idUsuario = {$_REQUEST["idUsuario"]}";
$res = $conn->query($sql);
$row = $res->fetch_object();
?>
<form action="?page=salvarUsuario" method="POST">
  <input type="hidden" name="acao" value="editar">
  <input type="hidden" name="idUsuario" value="<?php print $row->idUsuario; ?>">
  <div class="mb-3">
    <label for="nome">Nome</label>
    <input type="text" name="nome" value="<?php print $row->nomeUsuario ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label for="sobrenome">Sobreome</label>
    <input type="text" name="sobrenome" value="<?php print $row->sobrenomeUsuario ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label for="dtNasc">Data de Nascimento</label>
    <input type="date" name="dtNasc" value="<?php print $row->dtNascUsuario ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label for="username">Username</label>
    <input type="text" name="username" value="<?php print $row->username ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label for="email">Email</label>
    <input type="email" name="email" value="<?php print $row->emailUsuario ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label for="senha">Senha</label>
    <input type="password" name="senha" class="form-control" required>
  </div>
  <div class="mb-3">
    <label for="senha">Status</label>
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
      <?php
      if ($row->statusUsuario == 1) {
        print "<label class='btn btn-success active'";
      } else {
        print "<label class='btn btn-light'";
      }
      print "onclick=\"location.href='?page=salvarUsuario&acao=ativar&idUsuario={$row->idUsuario}';\">
              <a>
              Ativar
              </a>
            </label>"
      ?>
      <?php
      if ($row->statusUsuario == 0) {
        print "<label class='btn btn-warning active'";
      } else {
        print "<label class='btn btn-light'";
      }
      print "onclick=\"location.href='?page=salvarUsuario&acao=inativar&idUsuario={$row->idUsuario}';\"
            ><a>
              Inativar
              </a>
            </label>"
      ?>
    </div>
  </div>
  <div class="container ">
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <button type="submit" class="btn btn-success">Salvar</button>
      </div>
      <div class='col col-lg-2'>
        <?php
        print "<button class='btn btn-danger' onclick=\"location.href='?page=salvarUsuario&acao=excluir&idUsuario={$row->idUsuario}';\">Excluir</button>"
        ?>
      </div>
    </div>
  </div>
</form>
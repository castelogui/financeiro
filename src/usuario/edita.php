<div class="row">
  <div class="col-10">
    <h1>Editar Usuario</h1>
  </div>
  <div class="col-2">
    <a class="btn btn-primary btn-lg btn-block" href="?page=listarUsuario">Voltar</a>
  </div>
</div>
<br>
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
      $status = $row->statusUsuario;
      $funcao = $status == 0 ? 'ativar' : 'inativar';
      print "<div class='switch'>
            <input type='checkbox' id='toggle' class='switch-checkbox'";
      $status == 1 ? print "checked>" : print ">";
      print "<label onclick=\"location.href='?page=salvarUsuario&acao={$funcao}&idUsuario={$row->idUsuario}';\"
             for='toggle' class='switch-label'></label>"
      ?>
    </div>
  </div>
  <div class="container ">
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <button type="submit" class="btn btn-success">Salvar</button>
      </div>
      <!-- Botão para acionar modal -->
      <div class='col col-lg-2'>
        <?php
        print "<button type='button' class='btn btn-danger' 
              data-toggle='modal' data-target='#modalExcludeUser'>Excluir</button>"
        ?>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="modalExcludeUser" tabindex="-1" role="dialog" aria-labelledby="excludeUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="excludeUserModalLabel">Confirme</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php
              print "Tem certeza que deseja excluir o usuário <strong>{$row->username}</strong>?";
              print "<p>Essa ação é irreversível!!</p";
              ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <?php
              print "<button onclick=\"location.href='?page=salvarUsuario&acao=excluir&idUsuario={$row->idUsuario}';\"
                      type='button' class='btn btn-danger'>Excluir</button>"
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
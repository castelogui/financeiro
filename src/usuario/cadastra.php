<?php
$botaoCadastraUsuario = '
<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#ExemploModalCentralizado">
  Novo
</button>';

$modalCadastraUsuario = '
<div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
  <div class="container modal-dialog modal-dialog-centered" role="document">
    <form class="modal-content" action="?page=salvarUsuario" method="POST">
      <div class="modal-header">
        <h2 class="modal-title" id="TituloModalCentralizado">
          Cadastrar Usuario 
        </h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="acao" value="cadastrar">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control">
          </div>
          <div class="col-md-6 mb-3">
            <label for="sobrenome">Sobreome</label>
            <input type="text" name="sobrenome" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col-md-7 mb-3">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control">
          </div>
          <div class="col-md-5">
            <label for="dtNasc">Data de Nascimento</label>
            <input type="date" name="dtNasc" class="form-control">
          </div>
        </div>
        <div class="mb-3">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
          <label for="senha">Senha</label>
          <input type="password" name="senha" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-success">Cadastrar</button>
      </div>
    </form>
  </div>
</div>';

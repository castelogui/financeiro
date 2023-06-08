<div class="row">
  <div class="col-10">
    <h1>Cadastrar Usuario</h1>
  </div>
  <div class="col-2">
    <a class="btn btn-primary btn-lg btn-block" href="?page=listarUsuario">Voltar</a>
  </div>
</div>
<br>
<form action="?page=salvarUsuario" method="POST">
  <input type="hidden" name="acao" value="cadastrar">
  <div class="mb-3">
    <label for="nome">Nome</label>
    <input type="text" name="nome" class="form-control">
  </div>
  <div class="mb-3">
    <label for="sobrenome">Sobreome</label>
    <input type="text" name="sobrenome" class="form-control">
  </div>
  <div class="mb-3">
    <label for="dtNasc">Data de Nascimento</label>
    <input type="date" name="dtNasc" class="form-control">
  </div>
  <div class="mb-3">
    <label for="username">Username</label>
    <input type="text" name="username" class="form-control">
  </div>
  <div class="mb-3">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control">
  </div>
  <div class="mb-3">
    <label for="senha">Senha</label>
    <input type="password" name="senha" class="form-control" required>
  </div>
  <div class="container ">
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <button type="submit" class="btn btn-success">Cadastrar</button>
      </div>
    </div>
  </div>
</form>
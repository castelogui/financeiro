<div class="row">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item" aria-current="page">
        <a class="btn btn-sm btn-link" onclick="location.href='?page=listarConta'">Contas</a>
      </li>
      <li class="breadcrumb-item active">
        <a class="btn btn-sm btn-link" onclick="location.href='?page=listarCategoria'">Categorias</a>
      </li>
    </ol>
  </nav>
</div>
<div class="row">
  <div class="col-10">
    <h1>Contas</h1>
  </div>
  <div class="col-2">
    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#modalCadastraConta">
      <i class="fa-solid fa-plus"></i> Nova
    </button>
  </div>
</div>
<br>

<?php
$sql = "SELECT * FROM conta";
$res = $conn->query($sql);
$qtd = $res->num_rows;

$sqlCategoria = "SELECT * FROM categoriaConta";
$resCategoria = $conn->query($sqlCategoria);
$qtdCategoria = $resCategoria->num_rows;

$sqlUsuario = "SELECT * FROM usuario";
$resUsuario = $conn->query($sqlUsuario);
$qtdUsuario = $resUsuario->num_rows;

if ($qtd > 0) {

  while ($row = $res->fetch_object()) {
    print '<div class="card-deck">
              <div class="card">';
    print  '<img class="card-img-top" src=".../100px180/" alt="Imagem de capa do card">
              <div class="card-body">
                <h5 class="card-title">Título do card</h5>
                <p class="card-text">Este é um card maior com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional. Este conteúdo é um pouco maior, para demonstração.</p>
                </div>
                <div class="card-footer">
                <small class="text-muted">Atualizados 3 minutos atrás</small>
                </div>';
    print "</div>
                </div>";
  }
} else {
  print "
  <div class='card alert alert-danger'>
    <div class='card-body'>
      <h5 class='card-title card-danger'>Nenhuma Conta Encontrada!</h5>
    </div>
  </div>";
}
?>


<div class="modal fade" id="modalCadastraConta" tabindex="-1" role="dialog" aria-labelledby="TituloModalCadastraConta" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form class="modal-content" action="?page=salvarConta" method="POST">
      <div class="modal-header">
        <input type="hidden" name="acao" value="cadastrarConta">
        <h2 class="modal-title" id="TituloModalCadastraConta">Cadastrar Conta</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="acao" value="cadastrar">
        <div class="mb-3">
          <label for="categoria">Categoria Conta</label>
          <div class="input-group mb-3">
            <select name="idCategoriaConta" class="form-select">
              <?php
              print '<option selected>---</option>';
              if ($qtdCategoria > 0) {
                while ($rowCategoria = $resCategoria->fetch_object()) {
                  print "<option value='{$rowCategoria->idCategoriaConta}'>
                  {$rowCategoria->nomeCategoria}
                  </option>";
                }
              } else {
                print '<option>Nenhuma Categoria Cadastrada</option>';
              }
              ?>
            </select>
            <button class="btn btn-primary" type="button" onclick="location.href='?page=listarCategoria'">New</button>
          </div>
        </div>
        <div class="mb-3">
          <label for="dono">Usuario</label>
          <div class="input-group mb-3">
            <select name="idUsuario" class="form-select">
              <?php
              print '<option selected>---</option>';
              if ($qtdUsuario > 0) {
                while ($rowUsuario= $resUsuario->fetch_object()) {
                  print "<option value='{$rowUsuario->idUsuario}'>
                  {$rowUsuario->nomeUsuario}
                  </option>";
                }
              } else {
                print '<option>Nenhuma Usuario Cadastrado</option>';
              }
              ?>
            </select>
            <button data-toggle="modal" data-target="#modalCadastrarCategoria" class="btn btn-primary" type="button">New</button>
          </div>
        </div>
        <div class="mb-3">
          <label for="nomeConta">Nome da Conta</label>
          <input type="text" name="nomeConta" class="form-control">
        </div>
        <div class="mb-3">
          <label for="cor">Cor</label>
          <input type="text" name="cor" class="form-control">
        </div>
        <div class="mb-3">
          <label for="saldo">Saldo Inicial</label>
          <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <input type="text" name="saldoConta" class="form-control" aria-label="Amount (to the nearest dollar)">
            <span class="input-group-text">.00</span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-success">Cadastrar</button>
      </div>
    </form>
  </div>
</div>
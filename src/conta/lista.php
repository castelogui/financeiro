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

<style>
  .card:hover {
    transform: scale(1.04);
    box-shadow: 0 0 15px rgba(0, 0, 0, 1);
    transition: all 0.2s ease-in-out;
    cursor: pointer;
  }
</style>

<?php if ($qtd > 0) : ?>
  <div class="row row-cols-1 row-cols-md-3 g-3">
    <?php
    while ($row = $res->fetch_object()) {
      $cor = $row->corConta;

      $saldoFormated = number_format($row->saldoConta, 2, ',', '.');
    ?>
      <div class="col card-group">
        <div class="card text-center alert alert-<?php echo $cor ?>" onclick="location.href='?page=detalhesConta&idConta=<?php echo $row->idConta ?>'">
          <div class="card-body">
            <h4 class="card-title">
              <?php echo $row->nomeConta ?>
            </h4>
            <div class="badge bg-<?php echo $cor ?>">
              <?php
              $categoriaContaAtual = getCategoriaContaById($row->CategoriaConta_idCategoriaConta, $conn);
              print $categoriaContaAtual->nomeCategoriaConta
              ?>
            </div>
            <div class="row">
              <div class="col">
                <p class="col card-text">
                  <?php
                  $usuarioContaAtual = getUserById($row->Usuario_idUsuario, $conn);
                  print "@" . $usuarioContaAtual->username
                  ?>
                </p>
              </div>
              <div class="col">
                <p class="col card-text"><?php echo "R$" . $saldoFormated ?></p>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <small class="text-muted">Atualizados 3 minutos atrás</small>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
<?php else : ?>
  <div class='card alert alert-danger'>
    <div class='card-body'>
      <h5 class='card-title card-danger'>Nenhuma Conta Encontrada!</h5>
    </div>
  </div>
<?php endif; ?>

<?php
include('src/conta/modalCadastraConta.php');
?>
<div class="row">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item" aria-current="page">
        <a class="btn btn-sm btn-link" onclick="location.href='?page=listarUsuario'">Usuarios</a>
      </li>
      <li class="breadcrumb-item active">
        <a class="btn btn-sm btn-link" onclick="location.href='#'">Perfis</a>
      </li>
    </ol>
  </nav>
</div>
<div class="row">
  <div class="col-10">
    <h1>Usuários</h1>
  </div>
  <div class="col-2">
    <?php
    include("cadastra.php");
    print $botaoCadastraUsuario;
    print $modalCadastraUsuario;
    ?>
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
<?php
$sql = "SELECT * FROM usuario";
$res = $conn->query($sql);
$qtd = $res->num_rows;
if ($qtd > 0) {
  echo $qtd <= 3 ? "<div class='row row-cols-1 row-cols-md-$qtd g-4'>" : '<div class="row row-cols-1 row-cols-md-3 g-4">';
  while ($row = $res->fetch_object()) {
?>
    <div class="col">
      <div class="card h-100" onclick="location.href='?page=editarUsuario&idUsuario=<?php echo $row->idUsuario ?>'">
        <div class="card-body">
          <div class="row">
            <div class="col-8">
              <h5 class="card-title"><?php echo $row->username  ?></h5>
            </div>
            <div class="col-1 m-0">
              <img src="../../assets/images/users-demo/<?php echo $row->idUsuario ?>" width="40" class="rounded mr-3" alt="" class="card-img-top">
            </div>
          </div>
          <h5 class="card-title"><?php echo  $row->nomeUsuario . ' ' . $row->sobrenomeUsuario  ?></h5>
          <div class="text-right">
            <small class="badge badge-secondary">
              <?php echo $row->username == 'root' ? "Administrador" : "Usuário" ?>
            </small>
          </div>
          <p class="card-text"><?php echo $row->emailUsuario ?></p>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-6">
              <p class="card-text">Saldo:</p>
              <small class="badge badge-primary">0,00</small>
            </div>
            <div class="col-6">
              <p class="card-text">Status:</p>
              <small class="badge badge-<?php echo $row->statusUsuario == 1 ? "success" : "danger" ?>">
                <?php echo $row->statusUsuario == 1 ? "Ativo" : "Inativo" ?>
              </small>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  echo '</div>';
} else { ?>
  <div class='card alert alert-danger'>
    <div class='card-body'>
      <h5 class='card-title card-danger'>Nenhum usuario Encontrado!</h5>
    </div>
  </div>";
<?php } ?>
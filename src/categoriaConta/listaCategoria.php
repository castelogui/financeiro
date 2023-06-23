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
    <h1>Categorias</h1>
  </div>
  <div class="col-2">
    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#modalCadastrarCategoria">
      <i class="fa-solid fa-plus"></i>Nova
    </button>
  </div>
</div>
<br>

<?php

$sqlCategoria = "SELECT * FROM categoriaConta";
$resCategoria = $conn->query($sqlCategoria);
$qtdCategoria = $resCategoria->num_rows;

if ($qtdCategoria > 0) {
  $tableHTML = <<<HTML
    <div class='table-responsive'>
      <table class='table table-sm table-hover table-striped table-bordered'>
        <thead class='thead-dark'>
          <tr>
            <th>#</th>
            <th>Ícone</th>
            <th>Status</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
  HTML;

  while ($rowCategoria = $resCategoria->fetch_object()) {
    $statusHTML = $rowCategoria->statusCategoriaConta ? "<span class='badge bg-success'>Ativa</span>" : "<span class='badge bg-warning text-white'>Inativa</span>";
    $tableHTML .= <<<HTML
      <tr class="text-center">
        <td>{$rowCategoria->idCategoriaConta}</td>
        <td><i class='{$rowCategoria->iconeCategoriaConta}'></i> - {$rowCategoria->nomeCategoriaConta}</td>
        <td>{$statusHTML}</td>
        <td>
          <button class='btn btn-primary' onclick="location.href='?page=editarCategoria&idCategoriaConta={$rowCategoria->idCategoriaConta}'">
            <i class='fa-solid fa-pencil fa-fade'></i> Editar
          </button>
        </td>
      </tr>
    HTML;
  }

  $tableHTML .= <<<HTML
      </tbody>
    </table>
  </div>
  HTML;

  echo $tableHTML;
} else {
  echo <<<HTML
    <div class='card alert alert-danger'>
      <div class='card-body'>
        <h5 class='card-title card-danger'>Nenhuma Categoria Encontrada!</h5>
      </div>
    </div>
  HTML;
}

?>
<!-- Modal Cadastrar Categoria-->
<?php include("src/categoriaConta/cadastraCategoria.php")?>

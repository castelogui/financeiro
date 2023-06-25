<div class="row">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a class="btn btn-sm btn-link" onclick="location.href='?page=listarTransacoes'">Transações</a>
      </li>
      <li class="breadcrumb-item active">
        <a class="btn btn-sm btn-link" onclick="location.href='?page=listarCategoriaRegistro'">Categorias</a>
      </li>
    </ol>
  </nav>
</div>
<div class="row">
  <div class="col-10">
    <h1>Categorias das Transações</h1>
  </div>
  <div class="col-2">
    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#modalCadastrarCategoriaTransacao">
      <i class="fa-solid fa-plus"></i> Nova
    </button>
  </div>
</div>
<br>


<?php
$sqlCategoriaRegistro = "SELECT * FROM categoriaRegistro";
$resCategoriaRegistro = $conn->query($sqlCategoriaRegistro);
$qtdCategoriaRegistro = $resCategoriaRegistro->num_rows;

$sqlTipoRegistro = "SELECT * FROM tipoRegistro";
$resTipoRegistro = $conn->query($sqlTipoRegistro);
$qtdTipoRegistro = $resTipoRegistro->num_rows;

if ($qtdCategoriaRegistro > 0) {
  $tableHTML = <<<HTML
    <div class='table-responsive'>
      <table class='table table-sm table-hover table-striped table-bordered'>
        <thead class='thead'>
          <tr>
            <th>#</th>
            <th>Tipo Registro</th>
            <th>Descricao</th>
            <th>Status</th>
            <th>Filhos</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
  HTML;

  while ($rowCategoriaRegistro = $resCategoriaRegistro->fetch_object()) {
    $ativo = "<span class='badge bg-success'>Ativa</span>";
    $inativo = "<span class='badge bg-warning text-white'>Inativa</span>";
    $statusHTML = $rowCategoriaRegistro->statusCategoriaRegistro ? $ativo : $inativo;
    $tipoRegistroAtual = getTipoRegistroById($rowCategoriaRegistro->TipoRegistro_idTipoRegistro, $conn);
    $corTipoRegistro = $tipoRegistroAtual->descricaoTipoRegistro == "Despesa" ? "danger" : "success";
    $tableHTML .= <<<HTML
      <tr class="text-center">
        <td>{$rowCategoriaRegistro->idCategoriaRegistro}</td>
        <td>
          <span class="badge bg-{$corTipoRegistro}">
            {$tipoRegistroAtual->descricaoTipoRegistro}
          </span>
        </td>
        <td>
          <i class="<?php echo $rowCategoriaRegistro->iconeCategoriaRegistro ?>"></i>
           {$rowCategoriaRegistro->descricaoCategoriaRegistro}
        </td>
        <td>{$statusHTML}</td>
        <td>{$rowCategoriaRegistro->permiteFilhos}</td>
        <td>
          <button class='btn btn-sm btn-primary' onclick="location.href='?page=editarCategoria&idCategoriaConta={$rowCategoriaRegistro->idCategoriaRegistro}'">
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
<?php include("src/registro/categoria/cadastraCategoriaRegistro.php") ?>
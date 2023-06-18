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
      <i class="fa-solid fa-plus"></i> Nova
    </button>
  </div>
</div>
<br>

<?php
include("./src/util/icones.php");

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
          <button data-toggle='modal' data-target='#modalEditarCategoria' class='btn btn-primary'>
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
<div class="modal fade" id="modalCadastrarCategoria" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form class="modal-content" action="?page=salvarConta" method="POST">
      <div class="modal-header">
        <h2 class="modal-title" id="TituloModalCadastrarCategoria">
          Cadastrar Categoria
        </h2>
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="acao" value="cadastrarCategoria">
        <div class="mb-3">
          <label for="nomeCategoriaConta">Nome da Categoria</label>
          <input type="text" name="nomeCategoriaConta" class="form-control">
        </div>
        <div class="mb-3">
          <label for="iconeCategoriaConta">Ícone</label>
          <div class="input-group">
            <span class="input-group-text" id="iconeSelecionado">
              <i class="fas fa-plus"></i>
            </span>
            <select name="iconeCategoriaConta" class="form-select" onchange="atualizarIcone(this)">
              <option value="-" selected>---</option>
              <?php
              for ($i = 0; $i < 50; $i++) {
                $icone = $icones[$i % count($icones)];
                $palavras = explode("-", $icone);
                $nomeIcone = end($palavras);
                echo "<option value=\"$icone\"><i class=\"$icone\"></i>" . ($i + 1) . " " . ucfirst($nomeIcone) . "</option>";
              }
              ?>
            </select>
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

<!-- Modal Editar Categoria -->
<div class="modal fade" id="modalEditarCategoria" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form class="modal-content" action="?page=salvarConta" method="POST">
      <div class="modal-header">
        <h2 class="modal-title" id="TituloModalEditarCategoria">
          Editar Categoria
        </h2>
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="acao" value="editarCategoria">
        <div class="mb-3">
          <label for="nomeCategoriaConta">Nome da Categoria</label>
          <input type="text" name="nomeCategoriaConta" class="form-control" value="">
        </div>
        <div class="mb-3">
          <label for="iconeCategoriaConta">Ícone</label>
          <div class="input-group">
            <span class="input-group-text" id="iconeSelecionado">
              <i class="fas fa-plus"></i>
            </span>
            <select name="iconeCategoriaConta" class="form-select" onchange="atualizarIcone(this)">
              <option value="-" selected>---</option>
              <?php
              for ($i = 0; $i < 50; $i++) {
                $icone = $icones[$i % count($icones)];
                $palavras = explode("-", $icone);
                $nomeIcone = end($palavras);
                echo "<option value=\"$icone\"><i class=\"$icone\"></i>" . ($i + 1) . " " . ucfirst($nomeIcone) . "</option>";
              }
              ?>
            </select>
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
<script>
  function atualizarIcone(selectElement) {
    var iconeSelecionadoElement = document.getElementById("iconeSelecionado");
    var opcaoSelecionada = selectElement.value;

    iconeSelecionadoElement.innerHTML = '<i class="' + opcaoSelecionada + '"></i>';
  }
</script>
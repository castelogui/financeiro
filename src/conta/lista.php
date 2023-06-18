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
  $cardsHTML = '<div class="row row-cols-1 row-cols-md-3 g-3" >';

  while ($row = $res->fetch_object()) {
    $cor = $row->corConta;

    $saldoFormated = number_format($row->saldoConta, 2, ',', '.');

    $resUsuario1 = $conn->query($sqlUsuario);
    while ($rowUsuarioConta = $resUsuario1->fetch_object()) {
      if ($rowUsuarioConta->idUsuario == $row->Usuario_idUsuario) {
        $userConta = $rowUsuarioConta;
      }
    }

    $cardsHTML .= <<<HTML
    <div class="col card-group">
        <div class="card btn alert alert-{$cor}" data-toggle="modal" data-target="#modalDetalhesConta">
          <div class="card-body">
            <h5 class="card-title">{$row->nomeConta}</h5>
            <div class="row">
              <div class="col">
                <p class="col card-text">@{$userConta->username}</p>
              </div>
              <div class="col">
                <p class="col card-text">R$ $saldoFormated</p>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <small class="text-muted">Atualizados 3 minutos atrás</small>
          </div>
        </div>
    </div>
  HTML;
  }

  echo $cardsHTML;
} else {
  echo <<<HTML
    <div class='card alert alert-danger'>
      <div class='card-body'>
        <h5 class='card-title card-danger'>Nenhuma Conta Encontrada!</h5>
      </div>
    </div>
  HTML;
}
?>

<div class="modal fade" id="modalCadastraConta" tabindex="-1" role="dialog" aria-labelledby="TituloModalCadastraConta" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form class="modal-content" action="?page=salvarConta" method="POST">
      <div class="modal-header">
        <h2 class="modal-title" id="TituloModalCadastraConta">Cadastrar Conta</h2>
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="acao" value="cadastrarConta">
        <div class="mb-3">
          <label for="nomeConta">Nome da Conta</label>
          <input type="text" name="nomeConta" class="form-control">
        </div>
        <div class="mb-3">
          <label for="categoria">Categoria Conta</label>
          <div class="input-group mb-3">
            <select name="idCategoriaConta" class="form-select">
              <?php
              echo '<option selected>---</option>';
              if ($qtdCategoria > 0) {
                while ($rowCategoria = $resCategoria->fetch_object()) {
                  $icone = $rowCategoria->iconeCategoriaConta;
                  $nome = $rowCategoria->nomeCategoriaConta;
                  echo <<<HTML
                    <option value="{$rowCategoria->idCategoriaConta}">
                      <i class='$rowCategoria->iconeCategoriaConta'></i> - {$nome}
                    </option>
                  HTML;
                }
              } else {
                echo '<option>Nenhuma Categoria Cadastrada</option>';
              }
              ?>
            </select>

            <button class="btn btn-primary" type="button" onclick="location.href='?page=listarCategoria'">New</button>
          </div>
        </div>
        <div class="mb-3">
          <label for="usuario">Usuario</label>
          <div class="input-group mb-3">
            <select name="idUsuario" class="form-select">
              <?php
              $resUsuario = $conn->query($sqlUsuario);
              $qtdUsuario = $resUsuario->num_rows;
              print '<option selected>---</option>';
              if ($qtdUsuario > 0) {
                while ($rowUsuario = $resUsuario->fetch_object()) {
                  $value = $rowUsuario->idUsuario;
                  $nome = $rowUsuario->nomeUsuario . ' ' . $rowUsuario->sobrenomeUsuario;
                  $id = $rowUsuario->idUsuario;
                  echo <<<HTML
                    <option value="{$value}">
                     #{$id} {$nome}
                    </option>
                  HTML;
                }
              } else {
                print '<option>Nenhuma Usuario Cadastrado</option>';
              }
              ?>
            </select>
            <button data-toggle="modal" data-target="#modalCadastrarCategoria" class="btn btn-primary" type="button">New</button>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cor">Cor</label>
            <select name="cor" type="color" class="form-control" onchange="updateSelectClass(this)">
              <option value="-">---</option>
              <option value="primary" class="badge text-bg-primary">Primary</option>
              <option value="secondary" class="badge text-bg-secondary">Secondary</option>
              <option value="success" class="badge text-bg-success">Success</option>
              <option value="danger" class="badge text-bg-danger">Danger</option>
              <option value="warning" class="badge text-bg-warning">Warning</option>
              <option value="info" class="badge text-bg-info">Info</option>
              <option value="light" class="badge text-bg-light">Light</option>
              <option value="dark" class="badge text-bg-dark">Dark</option>
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label for="saldo">Saldo Inicial</label>
            <div class="input-group mb-3">
              <span class="input-group-text">R$</span>
              <input type="text" name="saldoConta" class="form-control" aria-label="Amount (to the nearest dollar)">
            </div>
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


<div class="modal fade" id="modalDetalhesConta" tabindex="-1" role="dialog" aria-labelledby="TituloModalEditaConta" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form class="modal-content" action="?page=salvarConta" method="POST">
      <div class="modal-header">
        <div class="mb-3">
          <h2 class="modal-title" id="TituloModalEditaConta">Detalhes Conta </h2>
          <label for="usuario">Usuario</label>
        </div>
        <div class="btn-toolbar"  role="toolbar">
          <div class="btn-group m-2" role="group">
            <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true"><i class="fa-solid fa-pen-to-square"></i></span>
            </button>
          </div>
          <div class="btn-group m-2" role="group">
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
            </button>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <input type="hidden" name="acao" value="cadastrarConta">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="nomeConta">Nome da Conta</label>
          </div>
          <div class="col-md-6 mb-3">
            <label for="categoria">Categoria Conta</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cor">Cor</label>
          </div>
          <div class="col-md-6 mb-3">
            <label for="saldo">Saldo</label>
          </div>
        </div>
        <table class="table">
          <h4>Extrato</h4>
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Valor</th>
              <th scope="col">Data Hora</th>
              <th scope="col">Categoria</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">8</th>
              <td>R$ 23,80</td>
              <td>02 Jun 23 - 14:59</td>
              <td>Mercado</td>
            </tr>
            <tr>
              <th scope="row">7</th>
              <td>R$ 13,46</td>
              <td>01 Jun 23 - 07:33</td>
              <td>Padaria</td>
            </tr>
            <tr>
              <th scope="row">6</th>
              <td>R$ 143</td>
              <td>01 Jun 23 - 19:41</td>
              <td>Luz</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-success">Cadastrar</button>
      </div>
    </form>
  </div>
</div>

<script>
  function updateSelectClass(select) {
    var selectedColor = select.value;
    select.className = 'form-control badge ' + 'text-bg-' + selectedColor;
  }
</script>
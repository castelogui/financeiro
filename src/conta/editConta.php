<?php
$conta = getContaById($_GET['idConta'], $conn);
$usuario = getUserById($conta->Usuario_idUsuario, $conn);
$categoriaConta = getCategoriaContaById($conta->CategoriaConta_idCategoriaConta, $conn);
?>
<div class="row">
  <div class="col-10">
    <h1>Editar Conta: <?php echo $conta->nomeConta ?></h1>
  </div>
  <div class="col-2">
    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='?page=detalhesConta&idConta=<?php echo $conta->idConta ?>'">
      <i class="fa-solid fa-arrow-left"></i> Voltar
    </button>
  </div>
</div>

<form action="?page=salvarConta" method="POST">
  <input type="hidden" name="acao" value="editarConta">
  <input type="hidden" name="idConta" value="<?php print $conta->idConta; ?>">
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="nomeConta">Nome da Conta</label>
      <input type="text" name="nomeConta" class="form-control" value="<?php echo $conta->nomeConta; ?>">
    </div>
    <div class="col-md-6 mb-3">
      <label for="categoriaConta">Categoria Conta</label>
      <div class="input-group mb-3">
        <select name="CategoriaConta_idCategoriaConta" class="form-select">
          <option selected value="<?php echo $categoriaConta->idCategoriaConta ?>">
            <?php echo $categoriaConta->nomeCategoriaConta ?>
          </option>
          <?php
          if ($qtdCategoria > 0) {
            while ($rowCategoria = $resCategoria->fetch_object()) {
              $nome = $rowCategoria->nomeCategoriaConta;
              if ($categoriaConta->idCategoriaConta != $rowCategoria->idCategoriaConta) {
                echo <<<HTML
                     <option value="{$rowCategoria->idCategoriaConta}">
                       {$nome}
                     </option>
                   HTML;
              }
            }
          } else {
            echo '<option>Nenhuma Categoria Cadastrada</option>';
          }
          ?>
        </select>
      </div>
    </div>
  </div>
  <div class="mb-3">
    <label for="usuario">Usuario</label>
    <div class="input-group mb-3">
      <select name="Usuario_idUsuario" class="form-select">
        <option selected value="<?php echo $usuario->idUsuario ?>">
          <?php
          echo '#' . $usuario->idUsuario . ' ' . $usuario->nomeUsuario . ' ' . $usuario->sobrenomeUsuario
          ?>
        </option>
        <?php
        $resUsuario = $conn->query($sqlUsuario);
        $qtdUsuario = $resUsuario->num_rows;
        if ($qtdUsuario > 0) {
          while ($rowUsuario = $resUsuario->fetch_object()) {
            $nome = $rowUsuario->nomeUsuario . ' ' . $rowUsuario->sobrenomeUsuario;
            $id = $rowUsuario->idUsuario;
            if ($id != $usuario->idUsuario) {
              echo '<option value="' . $id . '">#' . $id . ' ' . $nome . '</option>';
            }
          }
        } else {
          print '<option>Nenhuma Usuario Cadastrado</option>';
        }
        ?>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="cor">Cor</label>
      <select name="corConta" type="color" class="form-control badge text-bg-<?php echo $conta->corConta ?>" onchange="updateSelectClass(this)">
        <option selected value="<?php echo $conta->corConta ?>" class="badge text-bg-<?php echo $conta->corConta ?>"><?php echo $conta->corConta ?></option>
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
      <label for="saldo">Saldo Atual</label>
      <div class="input-group mb-3">
        <span class="input-group-text">R$</span>
        <input type="text" name="saldoConta" class="form-control" value="<?php echo $conta->saldoConta; ?>">
      </div>

    </div>
  </div>
  <div class="row">
    <div class="col-md-8 mb-3">
      <button type="button" class="btn btn-secondary" onclick="location.href='?page=detalhesConta&idConta=<?php echo $conta->idConta ?>'">Cancelar</button>
      <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
    <div class="col-md-4 mb-3">
      <div class="form-check form-switch">
        <?php
        $statusContaAtual = "";
        if ($conta->statusConta == 1) {
          $statusContaAtual = "checked";
        } else {
          print "";
        }
        ?>
        <input class="form-check-input" name="statusConta" type="checkbox" role="switch" id="statusConta" <?php echo $statusContaAtual ?>>
        <label class="form-check-label" for="statusConta">Status</label>
      </div>
    </div>
  </div>
</form>

<script>
  function updateSelectClass(select) {
    var selectedColor = select.value;
    select.className = 'form-control badge ' + 'text-bg-' + selectedColor;
  }
</script>
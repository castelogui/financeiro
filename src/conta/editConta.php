<div class="row">
  <div class="col-10">
    <h1>Editar Conta</h1>
  </div>
  <div class="col-2">
    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#modalCadastrarCategoria">
      <i class="fa-solid fa-arrow-left"></i> Voltar
    </button>
  </div>
</div>

<form action="?page=salvarConta" method="POST">
  <input type="hidden" name="acao" value="cadastrarConta">
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="nomeConta">Nome da Conta</label>
      <input type="text" name="nomeConta" class="form-control">
    </div>
    <div class="col-md-6 mb-3">
      <label for="categoria">Categoria Conta</label>
      <div class="input-group mb-3">
        <select name="idCategoriaConta" class="form-select">
          <?php
          echo '<option selected>---</option>';
          // if ($qtdCategoria > 0) {
          //   while ($rowCategoria = $resCategoria->fetch_object()) {
          //     $icone = $rowCategoria->iconeCategoriaConta;
          //     $nome = $rowCategoria->nomeCategoriaConta;
          //     echo <<<HTML
          //           <option value="{$rowCategoria->idCategoriaConta}">
          //             <i class='$rowCategoria->iconeCategoriaConta'></i> - {$nome}
          //           </option>
          //         HTML;
          //   }
          // } else {
          //   echo '<option>Nenhuma Categoria Cadastrada</option>';
          // }
          ?>
        </select>

        <button class="btn btn-primary" type="button" onclick="location.href='?page=listarCategoria'">New</button>
      </div>
    </div>
  </div>
  <div class="mb-3">
    <label for="usuario">Usuario</label>
    <div class="input-group mb-3">
      <select name="idUsuario" class="form-select">
        <?php
        print '<option selected>---</option>';
        // $resUsuario = $conn->query($sqlUsuario);
        // $qtdUsuario = $resUsuario->num_rows;
        // if ($qtdUsuario > 0) {
        //   while ($rowUsuario = $resUsuario->fetch_object()) {
        //     $value = $rowUsuario->idUsuario;
        //     $nome = $rowUsuario->nomeUsuario . ' ' . $rowUsuario->sobrenomeUsuario;
        //     $id = $rowUsuario->idUsuario;
        //     echo <<<HTML
        //           <option value="{$value}">
        //            #{$id} {$nome}
        //           </option>
        //         HTML;
        //   }
        // } else {
        //   print '<option>Nenhuma Usuario Cadastrado</option>';
        // }
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
      <label for="saldo">Saldo Atual</label>
      <div class="input-group mb-3">
        <span class="input-group-text">R$</span>
        <input type="text" name="saldoConta" class="form-control" aria-label="Amount (to the nearest dollar)">
      </div>

    </div>
  </div>
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
  <button type="submit" class="btn btn-success">Cadastrar</button>
</form>
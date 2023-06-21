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
              <option selected>---</option>
              <?php
              if ($qtdCategoria > 0) :
                while ($rowCategoria = $resCategoria->fetch_object()) {
                  $icone = $rowCategoria->iconeCategoriaConta;
                  $nome = $rowCategoria->nomeCategoriaConta;
              ?>
                  <option value="<?php echo $rowCategoria->idCategoriaConta ?>">
                    <i class="<?php $rowCategoria->iconeCategoriaConta ?>"></i>
                    <?php echo $nome ?>
                  </option>
                <?php }
              else : ?>
                <option>Nenhuma Categoria Cadastrada</option>

              <?php endif; ?>
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
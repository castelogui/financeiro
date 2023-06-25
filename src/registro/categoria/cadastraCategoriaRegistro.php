<div class="modal fade" id="modalCadastrarCategoriaTransacao" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form class="modal-content" action="?page=salvarCategoriaRegistro" method="POST">
      <div class="modal-header">
        <h2 class="modal-title" id="TituloModalCadastrarCategoriaTransacao">
          Cadastrar Categoria Registro
        </h2>
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="acao" value="cadastrarCategoriaRegistro">
        <div class="mb-6">
          <label for="TipoRegistro_idTipoRegistro">Tipo</label>
          <div class="row">
            <div class="col-md-6">
              <input type="radio" class="btn-check" name="TipoRegistro_idTipoRegistro" value="1" id="1" autocomplete="off" checked>
              <label class="btn btn-block btn-outline-success" for="1">Receita</label>
            </div>
            <div class="col-md-6">
              <input type="radio" class="btn-check" name="TipoRegistro_idTipoRegistro" value="2" id="2" autocomplete="off">
              <label class="btn btn-block btn-outline-danger" for="2">Despesa</label>
            </div>
          </div>
        </div>
        <div class="mb-6">
          <div class="row">
            <div class="col-md-6">
              <label for="descricaoCategoriaRegistro">Descrição</label>
              <input type="text" name="descricaoCategoriaRegistro" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="iconeCategoriaRegistro">Ícone</label>
              <div class="input-group">
                <span class="input-group-text" id="iconeSelecionado">
                  <i class="fas fa-plus"></i>
                </span>
                <select name="iconeCategoriaRegistro" class="form-select" onchange="atualizarIcone(this)">
                  <option value="-" selected>---</option>
                  <?php
                  include("./src/util/icones.php");
                  for ($i = 0; $i < 50; $i++) {
                    $icone     = $icones[$i % count($icones)];
                    $palavras  = explode("-", $icone);
                    $nomeIcone = end($palavras);
                    echo "<option value=\"$icone\"><i class=\"$icone\"></i>" . ($i + 1) . " " . ucfirst($nomeIcone) . "</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="mb-6">
          <div class="row">
            <div class="col-md-6">
              <label for="corCategoriaRegistro">Cor</label>
              <select name="corCategoriaRegistro" type="color" class="form-control badge>
            <option selected >---</option>
            <option value=" primary" class="badge text-bg-primary">Primary</option>
                <option value="secondary" class="badge text-bg-secondary">Secondary</option>
                <option value="success" class="badge text-bg-success">Success</option>
                <option value="danger" class="badge text-bg-danger">Danger</option>
                <option value="warning" class="badge text-bg-warning">Warning</option>
                <option value="info" class="badge text-bg-info">Info</option>
                <option value="light" class="badge text-bg-light">Light</option>
                <option value="dark" class="badge text-bg-dark">Dark</option>
              </select>
            </div>
            <div class="col-md-3 ">
              <label for="permiteFilhos">Pai</label>
              <div class="form-check form-switch">
                <input class="form-check-input" name="permiteFilhos" type="checkbox" role="switch" id="permiteFilhos">
                <label class="form-check-label" for="permiteFilhos"></label>
              </div>
            </div>
            <div class="col-md-3">
              <label for="statusCategoriaRegistro">Status</label>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="statusCategoriaRegistro" id="statusCategoriaRegistro">
                <label class="form-check-label" for="statusCategoriaRegistro"></label>
              </div>
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

<script>
  function atualizarIcone(selectElement) {
    var iconeSelecionadoElement = document.getElementById("iconeSelecionado");
    var opcaoSelecionada = selectElement.value;

    iconeSelecionadoElement.innerHTML = '<i class="' + opcaoSelecionada + '"></i>';
  }
</script>
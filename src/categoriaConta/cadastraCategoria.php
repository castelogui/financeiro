<div class="modal fade" id="modalCadastrarCategoria" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form class="modal-content" action="?page=salvarCategoria" method="POST">
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
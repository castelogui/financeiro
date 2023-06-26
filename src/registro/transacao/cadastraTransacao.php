<div class="modal fade" id="modalCadastraRegistro" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form class="modal-content" action="?page=salvarTransacao" method="POST">
      <div class="modal-header">
        <h2 class="modal-title" id="TituloModalCadastrarRegistro">
          Nova Transação
        </h2>
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="acao" value="cadastrarTransacao">
        <div class="mb-6">
          <label for="TipoRegistro_idTipoRegistro">Tipo</label>
          <div class="row">
            <div class="col-md-6">
              <input type="radio" class="btn-check" name="TipoRegistro_idTipoRegistro" value=1 id="1" autocomplete="off">
              <label class="btn btn-block btn-outline-success" for="1">Receita</label>
            </div>
            <div class="col-md-6">
              <input type="radio" class="btn-check" name="TipoRegistro_idTipoRegistro" value=2 id="2" autocomplete="off">
              <label class="btn btn-block btn-outline-danger" for="2">Despesa</label>
            </div>
          </div>
        </div>
        <div class="mb-6">
          <div class="row">
            <div class="col-md-5">
              <label for="CategoriaRegistro_idCategoriaRegistro	">Valor</label>
              <div class="input-group mb-3">
                <span class="input-group-text">R$</span>
                <input type="number" name="valorRegistro" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <label for="dataRegistro">Data</label>
              <input type="date" name="dataRegistro" class="form-control">
            </div>
            <div class="col-md-3">
              <label for="horaRegistro">Hora</label>
              <input type="time" name="horaRegistro" class="form-control">
            </div>
          </div>
        </div>
        <div class="mb-6">
          <div class="row">
            <div class="col-md-6">
              <label for="descricaoRegistro">Descrição</label>
              <input type="text" name="descricaoRegistro" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="CategoriaRegistro_idCategoriaRegistro">Categoria</label>
              <select name="CategoriaRegistro_idCategoriaRegistro" class="form-select">
                <option selected value="-">---</option>
                <?php
                $categorias = getCategoriasRegistro($conn);
                while ($categoria = $categorias->fetch_object()) {
                  echo "<option value=\"$categoria->idCategoriaRegistro\">$categoria->descricaoCategoriaRegistro</option>";
                }
                ?>
              </select>
            </div>
          </div>
        </div>
        <div class="mb-6">
          <div class="row">
            <div class="col-md-6">
              <label for="Usuario_idUsuario">Usuario</label>
              <select name="Usuario_idUsuario" class="form-select">
                <option selected value="-">---</option>
                <?php
                $usuarios = getUsuarios($conn);
                while ($usuario = $usuarios->fetch_object()) {
                  echo "<option value=\"$usuario->idUsuario\">$usuario->nomeUsuario</option>";
                }
                ?>
              </select>
            </div>
            <div class="col-md-6">
              <label for="Conta_idConta">Conta</label>
              <select name="Conta_idConta" class="form-select">
                <option value="-" selected>---</option>
                <?php
                $contas = getContas($conn);
                while ($conta = $contas->fetch_object()) {
                  echo "<option value=\"$conta->idConta\">$conta->nomeConta</option>";
                }
                ?>
              </select>
            </div>
          </div>
        </div>
        <div class="mb-6">
          <label for="statusRegistro">Status</label>
          <select name="statusRegistro" type="color" class="form-control">
            <option selected>---</option>
            <option value="1" class="badge text-bg-success">Concluido</option>
            <option value="2" class="badge text-bg-primary">Agendado</option>
            <option value="3" class="badge text-bg-warning">Pendente</option>
            <option value="4" class="badge text-bg-danger">Cancelada</option>
          </select>
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
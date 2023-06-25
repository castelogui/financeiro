<?php
include("./src/util/icones.php");
$categoriaRegistro = getCategoriaRegistroById($_GET['idCategoriaRegistro'], $conn);
?>
<div class="row">
  <div class="col-10">
    <h1>Editar Categoria Registro:
      <?php echo $categoriaRegistro->descricaoCategoriaRegistro ?>
    </h1>
  </div>
  <div class="col-2">
    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='?page=listarCategoriaRegistro'">
      <i class="fa-solid fa-arrow-left"></i> Voltar
    </button>
  </div>
</div>
<form action="?page=salvarCategoriaRegistro" method="POST">
  <div class="modal-body">
    <input type="hidden" name="acao" value="editarCategoriaRegistro">
    <input type="hidden" name="idCategoriaRegistro" value="<?php print $categoriaRegistro->idCategoriaRegistro; ?>">
    <div class="mb-6">
      <label for="TipoRegistro_idTipoRegistro">Tipo</label>
      <div class="row">
        <div class="col-md-6">
          <input type="radio" class="btn-check" name="TipoRegistro_idTipoRegistro" value="1" id="1" autocomplete="off" <?php echo $categoriaRegistro->TipoRegistro_idTipoRegistro == 1 ? "checked" : '' ?>>
          <label class="btn btn-block btn-outline-success" for="1">Receita</label>
        </div>
        <div class="col-md-6">
          <input type="radio" class="btn-check" name="TipoRegistro_idTipoRegistro" value="2" id="2" autocomplete="off" <?php echo $categoriaRegistro->TipoRegistro_idTipoRegistro == 2 ? "checked" : '' ?>>
          <label class="btn btn-block btn-outline-danger" for="2">Despesa</label>
        </div>
      </div>
    </div>
    <div class="mb-6">
      <div class="row">
        <div class="col-md-6">
          <label for="descricaoCategoriaRegistro">Descrição</label>
          <input type="text" name="descricaoCategoriaRegistro" class="form-control" value="<?php echo $categoriaRegistro->descricaoCategoriaRegistro ?>">
        </div>
        <div class="col-md-6">
          <label for="iconeCategoriaRegistro">Ícone</label>
          <div class="input-group">
            <span class="input-group-text" id="iconeSelecionado">
              <i class="fas fa-plus"></i>
            </span>
            <select name="iconeCategoriaRegistro" class="form-select" onchange="atualizarIcone(this)">
              <option value="<?php echo $categoriaRegistro->iconeCategoriaRegistro ?>" selected><?php echo $categoriaRegistro->iconeCategoriaRegistro ?></option>
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
        <!--Seleciona a categoria pai-->
        <div class="col-md-4">
          <label for="idCategoriaPai">Filha de:</label>
          <select name="idCategoriaPai" class="form-select">
            <option value="<?php echo $categoriaRegistro->idCategoriaPai ?>" selected>
              <?php
              $categoriaPai = getCategoriaRegistroById($categoriaRegistro->idCategoriaPai, $conn);
              echo $categoriaRegistro->idCategoriaPai == 0 ? "Nenhuma" : $categoriaPai->descricaoCategoriaRegistro;
              // echo $categoriaPai->descricaoCategoriaRegistro;
              ?>
            </option>
            <?php
            $categorias = getCategoriaRegistroPai($conn);
            while ($categoria = $categorias->fetch_object()) {
              if ($categoria->idCategoriaRegistro != $categoriaPai->idCategoriaRegistro) {
                echo "<option value=" . $categoria->idCategoriaRegistro . ">" . $categoria->descricaoCategoriaRegistro . "</option>";
              }
            }
            ?>
          </select>
        </div>
        <div class="col-md-2">
          <label for="permiteFilhos">Pai</label>
          <div class="form-check form-switch">
            <input class="form-check-input" name="permiteFilhos" type="checkbox" role="switch" id="permiteFilhos" <?php echo $categoriaRegistro->permiteFilhos == 1 ? "checked" : "" ?>>
            <label class="form-check-label" for="permiteFilhos"></label>
          </div>
        </div>
        <div class="col-md-4">
          <label for="corCategoriaRegistro">Cor</label>
          <select name="corCategoriaRegistro" type="color" class="form-control badge">
            <option selected class="<?php echo $categoriaRegistro->corCategoriaRegistro ?>"><?php echo $categoriaRegistro->corCategoriaRegistro ?></option>
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
        <div class="col-md-2">
          <label for="statusCategoriaRegistro">Status</label>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" name="statusCategoriaRegistro" id="statusCategoriaRegistro" <?php echo $categoriaRegistro->statusCategoriaRegistro == 1 ? "checked" : "" ?>>
            <label class="form-check-label" for="statusCategoriaRegistro"></label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.href='?page=listarCategoriaRegistro'">Fechar</button>
    <button type="submit" class="btn btn-success">Cadastrar</button>
  </div>
</form>


<script>
  function atualizarIcone(selectElement) {
    var iconeSelecionadoElement = document.getElementById("iconeSelecionado");
    var opcaoSelecionada = selectElement.value;

    iconeSelecionadoElement.innerHTML = '<i class="' + opcaoSelecionada + '"></i>';
  }
</script>
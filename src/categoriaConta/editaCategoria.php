<?php
include("./src/util/icones.php");
$categoriaConta = getCategoriaContaById($_GET['idCategoriaConta'], $conn);
?>
<div class="row">
  <div class="col-10">
    <h1>Editar Categoria:
      <?php echo $categoriaConta->nomeCategoriaConta ?>
    </h1>
  </div>
  <div class="col-2">
    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='?page=listarCategoria'">
      <i class="fa-solid fa-arrow-left"></i> Voltar
    </button>
  </div>
</div>

<form action="?page=salvarCategoria" method="POST">
  <input type="hidden" name="acao" value="editarCategoria">
  <input type="hidden" name="idCategoriaConta" value="<?php print $categoriaConta->idCategoriaConta; ?>">
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="iconeCategoriaConta">Ícone da Categoria</label>
      <div class="input-group">
        <span class="input-group-text" id="iconeSelecionado">
          <i class="fas fa-plus"></i>
        </span>
        <select name="iconeCategoriaConta" class="form-select" onchange="atualizarIcone(this)">
          <option value="<?php echo $categoriaConta->iconeCategoriaConta ?>" selected><?php echo $categoriaConta->iconeCategoriaConta ?></option>
          <?php
          for ($i = 0; $i < 50; $i++) {
            $icone = $icones[$i % count($icones)];
            if ($icone != $categoriaConta->iconeCategoriaConta) {
              $palavras = explode("-", $icone);
              $nomeIcone = end($palavras);
              echo "<option value=\"$icone\"><i class=\"$icone\"></i>" . ($i + 1) . " " . ucfirst($nomeIcone) . "</option>";
            }
          }
          ?>
        </select>
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="nomeCategoriaConta">Nome da Categoria</label>
      <input type="text" name="nomeCategoriaConta" class="form-control" value="<?php echo $categoriaConta->nomeCategoriaConta; ?>">
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 mb-3">
      <button type="button" class="btn btn-secondary" onclick="location.href='?page=listarCategoria'">Cancelar</button>
      <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
    <div class="col-md-4 mb-3">
      <div class="form-check form-switch">
        <?php
        $statusCategoriaConta = "";
        if ($categoriaConta->statusCategoriaConta == 1) {
          $statusCategoriaConta = "checked";
        } else {
          print "";
        }
        ?>
        <input class="form-check-input" name="statusCategoriaConta" type="checkbox" role="switch" id="statusCategoriaConta" <?php echo $statusCategoriaConta ?>>
        <label class="form-check-label" for="statusCategoriaConta">Status</label>
      </div>
    </div>
  </div>
</form>

<script>
  // rodar funcao atualizarIcone() quando a pagina carregar
  window.addEventListener("load", function() {
    atualizarIcone(document.querySelector("select"));
  });

  // funcao para atualizar o icone selecionado
  function atualizarIcone(selectElement) {
    var iconeSelecionadoElement = document.getElementById("iconeSelecionado");
    var opcaoSelecionada = selectElement.value;

    iconeSelecionadoElement.innerHTML = '<i class="' + opcaoSelecionada + '"></i>';
  }
</script>
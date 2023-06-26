<div class="row">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">
        <a class="btn btn-sm btn-link" onclick="location.href='?page=listarTransacoes'">Transações</a>
      </li>
      <li class="breadcrumb-item">
        <a class="btn btn-sm btn-link" onclick="location.href='?page=listarCategoriaRegistro'">Categorias</a>
      </li>
    </ol>
  </nav>
</div>
<div class="row">
  <div class="col-10">
    <h1>Transações</h1>
  </div>
  <div class="col-2">
    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#modalCadastraRegistro">
      <i class="fa-solid fa-plus"></i> Novo
    </button>
  </div>
</div>
<?php include('./src/registro/transacao/cadastraTransacao.php') ?>
<br>

<form class="form-inline my-2 my-lg-0">
  <div class="row">
    <div class="col-md-3">
      <label for="">Data da Transação</label>
      <div class="input-group mb-3">
        <input type="date" class="form-control" name="" id="" value="now()">
        <span class="input-group-text">-</span>
        <input type="date" class="form-control" name="" id="">
      </div>
    </div>
    <div class="col-md-2">
      <label for="">Conta</label>
      <div class="input-group mb-3">
        <select class="form-select text-bg-primary">
          <option selected>---</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
      </div>
    </div>
    <div class="col-md-2">
      <label for="">Categoria</label>
      <div class="input-group mb-3">
        <select class="form-select text-bg-primary">
          <option selected>---</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <label for="">Valor</label>
      <div class="input-group mb-3">
        <span class="input-group-text">R$</span>
        <input type="number" class="form-control" name="" id="" value="now()">
        <span class="input-group-text">a</span>
        <input type="number" class="form-control" name="" id="">
      </div>
    </div>
    <div class="col-md-2">
      <label for="">Status</label>
      <div class="input-group mb-3">
        <select class="form-select text-bg-secundary" id="status-select">
          <option selected>---</option>
          <option value="1" class="text-bg-success">Concluida</option>
          <option value="2" class="text-bg-danger">Cancelada</option>
          <option value="3" class="text-bg-warning">Pendente</option>
          <option value="3" class="text-bg-info">Estornada</option>
        </select>
        <button class="btn btn-primary" type="button" id="button-addon2">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </div>
    </div>
  </div>
</form>
<table class="table table-sm table-hover ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Categoria</th>
      <th scope="col">Conta</th>
      <th scope="col">Data Hora</th>
      <th scope="col">Tipo</th>
      <th scope="col">Valor</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $transacoes = getTransations($conn);
    while ($transacao = $transacoes->fetch_object()) {
      $tipoRegistroAtual = getTipoRegistroById($transacao->TipoRegistro_idTipoRegistro, $conn);
      $corTipoRegistro = $tipoRegistroAtual->descricaoTipoRegistro == "Despesa" ? "danger" : "success";
      $categoriaRegistro = getCategoriaRegistroById($transacao->CategoriaRegistro_idCategoriaRegistro, $conn);
      $contaRegistro = getContaById($transacao->Conta_idConta, $conn);
      switch ($transacao->statusRegistro) {
        case 1:
          $statusCor = "success";
          $statusName = "Concluida";
          break;
        case 2:
          $statusCor = "warning";
          $statusName = "Pendente";
          break;
        case 3:
          $statusCor = "danger";
          $statusName = "Cancelada";
          break;
        default:
          $statusCor = "secondary";
          $statusName = "Desconhecido";
          break;
      }
    ?>
      <tr>
        <th scope="row"><?php echo $transacao->idRegistro ?></th>
        <td><?php echo $categoriaRegistro->descricaoCategoriaRegistro ?></td>
        <td><?php echo $contaRegistro->nomeConta ?></td>
        <td><?php echo $transacao->dataRegistro . ' ' . $transacao->horaRegistro ?></td>
        <td class="text-bg-<?php echo $corTipoRegistro ?>"><?php echo $tipoRegistroAtual->descricaoTipoRegistro ?></td>
        <td><?php
                echo $tipoRegistroAtual->idTipoRegistro == 1  ? 'R$ +'. $transacao->valorRegistro : 'R$ ' . $transacao->valorRegistro;
                ?>
        </td>
        <td>
          <span class="badge bg-<?php echo $statusCor ?>">
            <?php echo $statusName ?>
          </span>
        </td>
      </tr>
    <?php }

    ?>
  </tbody>
  <tfooter>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Categoria</th>
      <th scope="col">Conta</th>
      <th scope="col">Data Hora</th>
      <th scope="col">Tipo</th>
      <th scope="col">Valor</th>
      <th scope="col">Status</th>
    </tr>
  </tfooter>
</table>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var statusSelect = document.getElementById('status-select');

    statusSelect.addEventListener('change', function() {
      var selectedColorClass = this.options[this.selectedIndex].className;
      this.className = 'form-select ' + selectedColorClass;
    });
  });
</script>
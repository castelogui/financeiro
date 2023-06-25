<?php
$conta = getContaById($_GET['idConta'], $conn);
$usuario = getUserById($conta->Usuario_idUsuario, $conn);
$categoriaConta = getCategoriaContaById($conta->CategoriaConta_idCategoriaConta, $conn);
?>
<!-- <div class="row">
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
</div> -->
<div class="row">
  <div class="col-10">
    <h1><?php echo $conta->nomeConta ?></h1>
  </div>
  <div class="col-2">
    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='?page=listarConta'">
      <i class="fa-solid fa-arrow-left"></i> Retornar
    </button>
  </div>
</div>
<br>

<div class="row">
  <div class="col-md-6">
    <h2 class="modal-title" id="TituloModalEditaConta">
      Detalhes Conta
    </h2>
  </div>
  <div class="col-6">
    <div class="btn-group btn-block">
      <button type="button" class="btn btn-primary" onclick="location.href='?page=editarConta&idConta=<?php echo $conta->idConta ?>'">
        <i class="fa-solid fa-pen-to-square"></i> Editar
      </button>
      <button type="button" class="btn btn-primary">
        <i class="fa-solid fa-print"></i> Imprimir
      </button>
    </div>
  </div>
</div>
</div>
<input type="hidden" name="acao" value="cadastrarConta">
<div class="row">
  <div class="col-md-4 mb-3">
    <label for="usuario">
      Usuario:
      <span class="badge bg-primary">
        <?php echo $usuario->nomeUsuario . ' ' . $usuario->sobrenomeUsuario; ?>
      </span>
    </label>
  </div>
  <div class="col-md-4 mb-3">
    <label for="categoria">
      Categoria:
      <span class="badge bg-primary">
        <i class="fa-solid <?php echo $categoriaConta->iconeCategoriaConta ?>"></i>
        <?php
        echo $categoriaConta->nomeCategoriaConta;
        ?>
      </span>
    </label>
  </div>
  <div class="col-md-2 mb-3">
    <label for="cor">
      Status:
      <span class="badge bg-<?php $conta->statusConta == 1 ? print "success" : print "danger"; ?>">
        <?php $conta->statusConta == 1 ? print "Ativa" : print "Inativa"; ?>
      </span>
    </label>
  </div>
  <div class="col-md-2 mb-3">
    <label for="cor">
      Cor: <span class="badge bg-primary">Cor</span>
    </label>
  </div>
</div>
<div class="row">
  <div class="col-md-8 mb-3">
  </div>
  <div class="col-md-2 mb-3">
    <label for="saldo">
      Saldo Atual: <span class="badge bg-primary ">
        <?php echo 'R$ ' . $conta->saldoConta; ?>
      </span>
    </label>
  </div>
  <div class="col-md-2 mb-3">
    <label for="saldo">
      Saldo Previsto: <span class="badge bg-primary ">
        <?php echo 'R$ 0,00'; ?>
      </span>
    </label>
  </div>
</div>
<table class="table">
  <form class="form-inline my-2 my-lg-0">
    <div class="row">
      <h4>Extrato</h4>
      <div class="input-group mb-3">
        <select class="form-select text-bg-primary">
          <option selected>Filtrar</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
        <input type="date" class="form-control" name="" id="" value="now()">
        <span class="input-group-text">-</span>
        <input type="date" class="form-control" name="" id="">
        <button class="btn btn-primary" type="button" id="button-addon2">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </div>
    </div>
  </form>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Categoria</th>
      <th scope="col">Data Hora</th>
      <th scope="col">Valor</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">8</th>
      <td>Mercado</td>
      <td>02 Jun 23 - 14:59</td>
      <td>R$ 23,80</td>
    </tr>
    <tr>
      <th scope="row">7</th>
      <td>Padaria</td>
      <td>01 Jun 23 - 07:33</td>
      <td>R$ 13,46</td>
    </tr>
    <tr>
      <th scope="row">6</th>
      <td>Luz</td>
      <td>01 Jun 23 - 19:41</td>
      <td>R$ 143</td>
    </tr>
  </tbody>
  <tfooter>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Categoria</th>
      <th scope="col">Data Hora</th>
      <th scope="col">R$ 320.43</th>
    </tr>
  </tfooter>
</table>
</div>
<div>
  <button type="submit" class="btn btn-success">Cadastrar</button>
</div>
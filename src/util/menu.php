<?php if (!empty($_SESSION)) : ?>
  <li class="nav-item">
    <a class="nav-link" href="?page=listarUsuario">
      <i class="fa-solid fa-user me-2"></i>Usuários
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?page=listarConta">
      <i class="fa-solid fa-sack-dollar me-2"></i>Contas
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?page=listarTransacoes">
      <i class="fa-solid fa-file-invoice-dollar me-2"></i>Registros
    </a>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="fa-solid fa-dollar-sign me-2"></i>Transações
    </a>
  </li> -->
<?php endif; ?>
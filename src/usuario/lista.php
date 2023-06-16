<div class="row">
  <div class="col-10">
    <h1>Usuários</h1>
  </div>
  <div class="col-2">
    <?php
    include("cadastra.php");
    print $botaoCadastraUsuario;
    print $modalCadastraUsuario;
    ?>
  </div>
</div>
<br>
<?php
$sql = "SELECT * FROM usuario";
$res = $conn->query($sql);
$qtd = $res->num_rows;
if ($qtd > 0) {
  print "<div class='table-responsive'>
        <table class='table table-sm table-hover table-striped table-bordered'>";
  print  "<tr class='thead-dark'>
            <th>#</th>
            <th>Nome</th>
            <th>Data Nascimento</th>
            <th>Username</th>
            <th>E-mail</th>
            <th>Status</th>
            <th>Ações</th>              
          </tr>";
  while ($row = $res->fetch_object()) {
    print  "<tr>
              <td>{$row->idUsuario}</td>
              <td>{$row->nomeUsuario} {$row->sobrenomeUsuario}</td>
              <td>{$row->dtNascUsuario}</td>
              <td>{$row->username}</td>
              <td>{$row->emailUsuario}</td>";
    if ($row->statusUsuario == true) {
      print '<td>
              <span class="badge bg-success">Ativo</span>
            </td>';
    } else {
      print '<td>
              <span class="badge bg-warning text-white">Inativo</span>
            </td>';
    }
    print  "<td>
               <button onclick=\"location.href='?page=editarUsuario&idUsuario={$row->idUsuario}';\"
               class='btn btn-block btn-primary'><i class='fa-solid fa-pencil fa-fade'></i> Editar</button>
             </td>                  
           </tr>";
  };
  print  "<tr class='thead-dark'>
            <th>#</th>
            <th>Nome</th>
            <th>Data Nascimento</th>
            <th>Username</th>
            <th>E-mail</th>
            <th>Status</th>
            <th>Ações</th>              
          </tr>";
  print "</table>
        </div>";
} else {
  print "<p class='alert alert-danger'>Não foi encontrado nenhum usuário.</p>";
}
?>
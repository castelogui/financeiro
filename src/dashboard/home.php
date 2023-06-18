<?php
if (empty($_SESSION)) {
  print "<script>location.href='?page=index'</script>";
}
?>

<div class="card" >
  <div class="card-header">
    <h1 class="display-3">Olá!</h1>
  </div>
  <div class="card-body">
    <p class="lead">Este sistema está sendo desenvolvido para proporcionar um controle financeiro eficiente e manter suas finanças sempre em ordem. </p>
    <hr class="my-4">
    <p>Ele contará com os recursos de controle de usuários, controle de contas e transações,
      gerenciamento de orçamentos, análise das finanças e resumo mensal.
      Com este sistema, poderemos ter o controle total das nossas finanças de
      maneira simples e eficiente. Mantenha-se organizado(a), acompanhe suas receitas
      e gastos mensais e tome decisões financeiras mais inteligentes.
    </p>
  </div>
  <div class="card-footer">
    <a class="btn btn-primary btn-lg" href="#" role="button">Leia mais</a>
  </div>
</div>
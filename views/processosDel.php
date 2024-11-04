<?php
/*
Apaga o registro selecionado
*/

//Verifica se o id do processo foi passado pela URL, caso não haja, redireciona para a página de listagem de processos
if (isset($_GET['id'])) {
  $SQL = "SELECT * FROM processos  where ID_CLIENTE   = " . $_GET['id'];
  $RS = $mysqli->query($SQL);
  $cliente = [];

  while ($row = $RS->fetch_assoc()) {
    $cliente[] = $row;
  }
  $mysqli->close();

  if (count($cliente) == 0)
    header('Location: dashboard.php?dir=views&file=processosList');
}

?>

<div class="principal">
  <div class="col-sm-6 text-left">
    <h1>Apagar Processo</h1><!--Titulo da Página-->
    <hr>

    <form action="assets/processaDelProcessos.php" method="POST">

      <div class="form-group">
        Deseja apagar o processo <b><?php echo $cliente[0]['NUMERO_PROCESSO_DIGITAL'] ?></b> do cliente: <b><?php echo $cliente[0]['NOME_REQUERENTE'] ?></b>?
      </div>


      <hr />
      <input type="hidden" name="id" value="<?php echo $cliente[0]['ID_CLIENTE'] ?>">
      <button type="submit" class="btn btn-danger">Apagar</button>
      <a href="dashboard.php?dir=views&file=processosList" class="btn btn-primary">Voltar</a>
    </form>

  </div>
</div>
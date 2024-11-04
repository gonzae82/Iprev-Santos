<?php
/*
Apaga o registro selecionado
*/

//Verifica se o id do processo foi passado pela URL, caso não haja, redireciona para a página de listagem de processos
if (isset($_GET['id'])) {
  $SQL = "SELECT * FROM processos_detalhes  where id   = " . $_GET['id'];
  $RS = $mysqli->query($SQL);
  $indice = [];

  while ($row = $RS->fetch_assoc()) {
    $indice[] = $row;
  }
  $mysqli->close();

  if (count($indice) == 0)
    header('Location: dashboard.php?dir=views&file=processosList');
}

?>

<div class="principal">
  <div class="col-sm-6 text-left">
    <h1>Apagar Processo</h1><!--Titulo da Página-->
    <hr>

    <form action="assets/processaDelDemonstrativo.php" method="POST">

      <div class="form-group">
        Deseja apagar o índice de data inicial em:  <b><?php echo $indice[0]['data_inicial'] ?></b>?
      </div>


      <hr />
      <input type="hidden" name="id" value="<?php echo $indice[0]['id'] ?>">
      <input type="hidden" name="processo_id" value="<?php echo $indice[0]['processo_id'] ?>">
      <button type="submit" class="btn btn-danger">Apagar</button>
      <a href="dashboard.php?dir=views&file=processosDemonstrativoList&id=<?php echo $indice[0]['processo_id']?>" class="btn btn-primary">Voltar</a>
    </form>

  </div>
</div>


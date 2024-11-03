<?php
/*
Edita o usuário selecionado e exibe os dados do usuário selecionado.
*/

//Verifica se o id do usuário foi passado pela URL, caso não haja, redireciona para a página de listagem de usuários
if (isset($_GET['id'])) {
  $SQL = "SELECT * FROM selic where id = " . $_GET['id'];
  $RS = $mysqli->query($SQL);
  $indice = [];

  while ($row = $RS->fetch_assoc()) {
    $indice[] = $row;
  }
  $mysqli->close();

  if (count($indice) == 0)
    header('Location: dashboard.php?dir=views&file=selicList&msgd="Não foi possível encontrar o indíce."');
} else
  header('Location: dashboard.php?dir=views&file=selicist');
?>

<div class="principal">
  <div class="col-sm-8 text-left">
    <h1>Editar Selic</h1><!--Titulo da Página-->
    <hr />
    <div class="col-sm-6">
      <form action="assets/processaEditSelic.php" method="POST">
        <div class="form-group">
          <label for="nome">Referência:</label>
          <input type="text" class="form-control" id="referencia" name="referencia" value="<?php echo $indice[0]['referencia'] ?>">
        </div>

        <div class="form-group">
          <label for="nome">Data:</label>
          <input type="date" class="form-control" id="data" name="data" value="<?php echo $indice[0]['data'] ?>">
        </div>

        <div class="form-group">
          <label for="nome">Indice:</label>
          <input type="any" pattern="^\d*(\.\d{0,6})?$" class="form-control" id="indice" name="indice" value="<?php echo $indice[0]['indice'] ?>">
        </div>

        <hr />
        <input type="hidden" name="id" value="<?php echo $indice[0]['id'] ?>">
        <button type="submit" class="btn btn-warning">Atualizar</button>
        <a href="dashboard.php?dir=views&file=selicList" class="btn btn-primary">Voltar</a>

      </form>

    </div>
  </div>
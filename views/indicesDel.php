<?php
/*
Edita o usuário selecionado e exibe os dados do usuário selecionado.
*/

//Verifica se o id do usuário foi passado pela URL, caso não haja, redireciona para a página de listagem de usuários
if (isset($_GET['id'])) {
  $SQL = "SELECT * FROM indices where id = " . $_GET['id'];
  $RS = $mysqli->query($SQL);
  $indice = [];

  while ($row = $RS->fetch_assoc()) {
    $indice[] = $row;
  }
  $mysqli->close();

  if (count($indice) == 0)
    header('Location: dashboard.php?dir=views&file=usuariosList');
} else

?>

<div class="principal">
  <div class="col-sm-6 text-left">
    <h1>Apagar Indíce</h1><!--Titulo da Página-->
    <hr>

    <form action="assets/processaDelIndice.php" method="POST">

      <div class="form-group">
        Deseja apagar o Indíce <b><?php echo $indice[0]['referencia'] ?></b>?
      </div>


      <hr />
      <input type="hidden" name="id" value="<?php echo $indice[0]['id'] ?>">
      <button type="submit" class="btn btn-danger">Apagar</button>
      <a href="dashboard.php?dir=views&file=indicesList" class="btn btn-primary">Voltar</a>
    </form>

  </div>
</div>
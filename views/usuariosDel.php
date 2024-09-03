<?php
/*
Edita o usuário selecionado e exibe os dados do usuário selecionado.
*/

//Verifica se o id do usuário foi passado pela URL, caso não haja, redireciona para a página de listagem de usuários
if (isset($_GET['id'])) {
  $SQL = "SELECT * FROM usuarios where id = " . $_GET['id'];
  $RS = $mysqli->query($SQL);
  $usuario = [];

  while ($row = $RS->fetch_assoc()) {
      $usuario[] = $row;   
   }
  $mysqli->close();

  if (count($usuario) == 0)
    header('Location: dashboard.php?dir=views&file=usuariosList');
    
} else
      
?>

<div class="principal">
  <div class="col-sm-6 text-left">
    <h1>Apagar Usuário</h1><!--Titulo da Página-->
    <hr>
    
  <form action="assets/processaDelUsuario.php" method="POST">
      
      <div class="form-group">
          Deseja apagar o usuário <b><?php echo $usuario[0]['nome'] ?></b>?
      </div>

  
    <hr/>
    <input type="hidden" name="id" value="<?php echo $usuario[0]['id'] ?>">
    <button type="submit" class="btn btn-danger">Apagar</button> 
    <a href="dashboard.php?dir=views&file=usuariosList" class="btn btn-primary">Voltar</a>
  </form> 

</div>
</div>
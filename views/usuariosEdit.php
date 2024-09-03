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
    header('Location: dashboard.php?dir=views&file=usuariosList');
?>

<div class="principal">
  <div class="col-sm-6 text-left">
    <h1>Editar Usuários</h1><!--Titulo da Página-->    
    <hr/>
  <form action="assets/processaEditUsuario.php" method="POST">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $usuario[0]['nome'] ?>">
      </div>

    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $usuario[0]['email'] ?>">
    </div>
    <div class="form-group">
      <label for="senha">Senha:</label>
      <input type="password" class="form-control" id="senha" name="senha" placeholder="Troque a senha do usuário">
    </div>

    <label for="cargo">Cargo:</label>
    <select name="cargo" class="form-control" id="cargo" required>
      <option value="<?php echo $usuario[0]['cargo'] ?>"><?php echo $usuario[0]['cargo'] ?></option>
      <option value="Gerente">Gerente</option>
      <option value="Supervisor">Supervisor</option>
      <option value="Analista">Analista</option>
      <option value="Desenvolvedor">Desenvolvedor</option>
    </select><br>
    
    <hr/>
    <input type="hidden" name="id" value="<?php echo $usuario[0]['id'] ?>">
    <button type="submit" class="btn btn-warning">Atualizar</button>       
    <a href="dashboard.php?dir=views&file=usuariosList" class="btn btn-primary">Voltar</a> 
    
  </form> 
  
</div>
</div>
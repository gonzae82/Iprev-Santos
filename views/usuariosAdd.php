<div class="principal">
  <div class="col-sm-6 text-left">
    <h1>Cadastro de Usuários</h1><!--Titulo da Página-->
    <hr>

  <form action="assets/processaAddUsuario.php" method="POST">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome">
      </div>

    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
      <label for="senha">Senha:</label>
      <input type="password" class="form-control" id="senha" name="senha">
    </div>

    <label for="cargo">Cargo:</label>
    <select name="cargo" class="form-control" id="cargo" required>
      <option value="Gerente">Gerente</option>
      <option value="Supervisor">Supervisor</option>
      <option value="Analista">Analista</option>
      <option value="Desenvolvedor">Desenvolvedor</option>
    </select><br>
    
    <hr/>
    <button type="submit" class="btn btn-success">Cadastrar</button>
    <a href="dashboard.php?dir=views&file=usuariosList" class="btn btn-primary">Voltar</a>
  </form> 

</div>
</div>
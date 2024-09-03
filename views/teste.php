<div class="principal">
  <div class="col-sm-6 text-left">
    <h1>Testes</h1><!--Titulo da Página-->
    <hr>

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
      <option value="gerente">Gerente</option>
      <option value="supervisor">Supervisor</option>
      <option value="analista">Analista</option>
      <option value="desenvolvedor">Desenvolvedor</option>
    </select><br>
    
    <hr/>
    <button id="enviar" type="submit" class="btn btn-primary">Cadastrar</button>

  <div id="mensagem"></div>

</div>
</div>
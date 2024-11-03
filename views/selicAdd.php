<div class="principal">
  <div class="col-sm-6 text-left">
    <h1>Cadastro da Selic</h1><!--Titulo da Página-->
    <hr>
    <div class="col-sm-6">
      <form action="assets/processaAddSelic.php" method="POST">
        <div class="form-group">
          <label for="nome">Referência:</label>
          <input type="text" class="form-control" id="referencia" name="referencia">
        </div>

        <div class="form-group">
          <label for="data">Data:</label>
          <input type="date" class="form-control" id="data" name="data">
        </div>
        <div class="form-group">
          <label for="indice">Selic:</label>
          <input type="percent" pattern="^\d*(\.\d{0,6})?$" class="form-control" id="indice" name="indice">
        </div>

        <hr />
        <button type="submit" class="btn btn-success">Cadastrar</button>
        <a href="dashboard.php?dir=views&file=selicList" class="btn btn-primary">Voltar</a>
      </form>
    </div>
  </div>
</div>
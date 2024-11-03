<?php
/*
Edita o usuário selecionado e exibe os dados do usuário selecionado.
*/

//Verifica se o id do usuário foi passado pela URL, caso não haja, redireciona para a página de listagem de usuários
if (isset($_GET['id'])) {
    $processo_id = $_GET['id'];
    $SQL = "SELECT * FROM processos_detalhes where processo_id = " . $_GET['id'];
    $RS = $mysqli->query($SQL);
    $processo = [];

    while ($row = $RS->fetch_assoc()) {
        $processo[] = $row;
    }
    $mysqli->close();

}
?>

<div class="principal">
    <div class="col-sm-12 text-left">
        <h1>Editar Índices do Processo</h1><!--Titulo da Página-->
        <hr>        
    </div>

    <form action="assets/processaEditDemonstrativo.php" method="post" class="row row-cols-1 row-cols-md-4 g-4">
        <!-- Adiciona Linha nova a páginha-->
        <div id="linha" class="linha">
            <div class="form-group col-md-3">
                <label for="data_indice">Data Inicial:</label>
                <div id="data_indice_container">
                    <input type="date" id="data_inicial" class="form-control" name="data_inicial">
                    
                    
                </div>
            </div>
            
            <div class="form-group col-md-3">
                <label for="diferenca_inicial">Diferença inicial:</label>
                <div id="diferenca_inicial_container">
                    <input type="text" class="diferenca_inicial form-control" name="diferenca_inicial">
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="ir">IR Inicial:</label>
                <div id="ir_container">
                    <input type="text" class="form-control" name="ir_inicial">
                </div>
            </div>

            <div class="form-group col-md-3">
                <label for="valor_indice">Índice Inicial:</label>
                <div id="valor_indice_container">
                    <input type="text" class="form-control" name="indice_inicial">
                </div>
            </div>
        </div>
    <hr />
    <!-- Botão para adicionar nova linha -->   
    <input type="hidden" name="processo_id" value="<?php echo $processo_id ?>"> 
    <input type="submit" value="Adicionar Dados" class="btn btn-success">
    <input type="reset" value="Limpar" class="btn btn-warning">
    <a href="dashboard.php?dir=views&file=processosList&id=<?php echo $processo_id ?>" class="btn btn-primary">Voltar</a>
    <hr />
    </form>

    <?php
        //Exibe a mensagem de sucesso ao retornar Adicionar/Editar ou Apagar Usuário
        if (isset($_GET['msg'])) {
            echo "<div class='alert alert-success' role='alert'>" . $_GET['msg'] . "</div>";
        }

        if (isset($_GET['msgd'])) {
            echo "<div class='alert alert-danger' role='alert'>" . $_GET['msgd'] . "</div>";
        }
        ?>

    <div class="col-sm-12 tabela">
        <table id="demonstrativo" class="table table-hover">
            <thead>
                <tr>
                    <th>Data Inicial</th>                    
                    <th>Diferença Inicial</th>
                    <th>IR Inicial</th>
                    <th>Índice Inicial</th>
                    <th>Diferença Atualizada</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //Percorre o array de usuários e exibe os dados na tabela                                      
                foreach ($processo as $indice) {
                    echo "<tr>";
                    $indice['data_inicial'] = date('m/Y', strtotime($indice['data_inicial']));
                    echo "<td>" . $indice['data_inicial'] . "</td>";                    
                    echo "<td>" . "R$ " . number_format($indice['diferenca_inicial'], 2, ',', '.') . "</td>";                    
                    echo "<td>" . "R$ " . number_format($indice['ir_inicial'], 2, ',', '.') . "</td>";
                    echo "<td>" . $indice['indice_inicial'] . "</td>";
                    echo "<td>XXX</td>";


                    echo "<td>
                        <a href='dashboard.php?id=" . $indice['id'] . "&dir=views&file=processosDemonstrativoEdit'>
                        <button type='button' class='btn btn-outline-dark'>
                            <span class='glyphicon glyphicon-edit'>                
                            </span>
                        </button>
                        </a>
                    
                        <a href='dashboard.php?id=" . $indice['id'] . "&dir=views&file=processosDemonstrativoDel'>
                        <button type='button' class='btn btn-outline-dark'>
                            <span class='glyphicon glyphicon-remove'>                
                            </span>
                        </button>
                        </a>
                                            
                        </td>";
                    echo "</tr>";
                }
                //encerra a conexão com o banco de dados
                $mysqli->close();
                ?>

            </tbody>
        </table>
    </div>
  
</div>
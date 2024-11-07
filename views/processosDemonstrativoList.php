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

<div class="principal" id="data-page" data-page="processosDemonstrativoList">
    <div class="col-sm-12 text-left">
        <h1>Editar Índices do Processo</h1><!--Titulo da Página-->
        <hr>        
    </div>

    <form action="assets/processaEditDemonstrativo.php" method="post" class="row g-4">
    <!-- Adiciona Linha nova à página -->
    <div id="linha" class="linha col-12">
        <div class="form-group col-md-2">
            <label for="tipo_indice">Tipo de Índice:</label>
            <div id="tipo_indice_container">
                <select id="tipo_indice" class="form-control" name="tipo_indice">
                    <option value="normal">Normal</option>
                    <option value="13">13º</option>
                </select>
            </div>
        </div>

        <div class="form-group col-md-2">
            <label for="data_inicial">Data Inicial:</label>
            <div id="data_indice_container">
                <input type="date" id="data_inicial" class="form-control" name="data_inicial">                                    
            </div>
        </div>

        <div class="form-group col-md-2">
            <label for="diferenca_inicial">Diferença Inicial:</label>
            <div id="diferenca_inicial_container">
                <input type="text" class="diferenca_inicial form-control" name="diferenca_inicial">
            </div>
        </div>

        <div class="form-group col-md-2">
            <label for="ir">IR Inicial:</label>
            <div id="ir_container">
                <input type="text" class="form-control" name="ir_inicial">
            </div>
        </div>

        <div class="form-group col-md-2">
            <label for="indice_inicial">Índice Inicial:</label>
            <div id="valor_indice_container">
                <input type="text" class="form-control" id="indice_inicial" name="indice_inicial">
            </div>
        </div>
    </div>
           
    <!-- Botão para adicionar nova linha -->
    <div class="form-group col-md-12">
    <hr />   
    <input type="hidden" name="processo_id" value="<?php echo $processo_id ?>"> 
    <div class="d-flex justify-content-between mt-3">
        <input type="submit" value="Adicionar Dados" class="btn btn-success">
        <input type="reset" value="Limpar" class="btn btn-warning">
        <a href="dashboard.php?dir=views&file=processosEdit&id=<?php echo $processo_id ?>" class="btn btn-primary">Voltar</a>
    </div>
    <hr />   
</div>    
   
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
                    <th>#</th>          
                    <th>Tipo Índice</th>          
                    <th>Data Inicial</th>
                    <th>Diferença Inicial</th>
                    <th>IR Inicial</th>
                    <th>Índice Inicial</th>
                    <th>Selic Acumulada</th>
                    <th>Diferença Atualizada</th>
                    <th>CAPEP</th>
                    <th>IPREV</th>
                    <th>I.R.</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //Percorre o array de usuários e exibe os dados na tabela                                      
                $n=1;
                foreach ($processo as $indice) {
                    echo "<tr>";
                    $indice['data_inicial'] = date('m/Y', strtotime($indice['data_inicial']));
                    echo "<td>" . $n . "</td>";
                    echo "<td>" . $indice['tipo_indice'] . "</td>";
                    echo "<td>" . $indice['data_inicial'] . "</td>";                    
                    echo "<td>" . "R$ " . number_format($indice['diferenca_inicial'], 2, ',', '.') . "</td>";                    
                    echo "<td>" . "R$ " . number_format($indice['ir_inicial'], 2, ',', '.') . "</td>";
                    echo "<td>" . number_format($indice['indice_inicial'], 6, ',', '.') . "</td>";                    
                    echo "<td>" . $indice['selic_acumulada'] . " %</td>"; 
                    echo "<td>" . "R$ " . $indice['diferenca_atualizada'] . "</td>"; 
                    echo "<td>" . "R$ " . $indice['capep'] . "</td>"; 
                    echo "<td>" . "R$ " . $indice['iprev'] . "</td>"; 
                    echo "<td>" . "R$ " . $indice['ir'] . "</td>"; 
                    

                    echo "<td>                        
                        <a href='dashboard.php?id=" . $indice['id'] . "&dir=views&file=processosDemonstrativoDel'>
                        <button type='button' class='btn btn-outline-dark'>
                            <span class='glyphicon glyphicon-remove'>                
                            </span>
                        </button>
                        </a>
                                            
                        </td>";
                    echo "</tr>";
                    //Incrementa contador de Linha
                    $n++;
                }               
                ?>

            </tbody>
        </table>
    </div>
  
</div>

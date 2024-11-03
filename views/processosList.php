<?php
/*
Lista a tabela de clientes e cria o botão para adicionar um novo processo e editar um processo existente.
*/

//Select de todos os usuários no banco de dados
$SQL = "SELECT * FROM processos";

//Executa a query
$RS = $mysqli->query($SQL);

//Cria um array para armazenar os dados
$clientes = [];

//Percorre os dados e armazena no array criado
while ($row = $RS->fetch_assoc()) {
    $clientes[] = $row;
}

?>

<div class="principal">
    <div class="col-sm-12 text-left">
        <h1>Listas de Processos</h1><!--Titulo da Página-->
        <hr>
        <a href="dashboard.php?dir=views&file=processosAdd"><span class="glyphicon glyphicon-plus"></span> Novo Cadastro</a>
        <hr>

        <?php
        //Exibe a mensagem de sucesso ao retornar Adicionar/Editar ou Apagar Usuário
        if (isset($_GET['msg'])) {
            echo "<div class='alert alert-success' role='alert'>" . $_GET['msg'] . "</div>";
        }

        if (isset($_GET['msgd'])) {
            echo "<div class='alert alert-danger' role='alert'>" . $_GET['msgd'] . "</div>";
        }
        ?>

        <div class="col-sm-8 tabela">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th># Processo</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //Percorre o array de usuários e exibe os dados na tabela
                    foreach ($clientes as $cliente) {
                        echo "<tr>";
                        echo "<td>" . $cliente['NUMERO_PROCESSO_DIGITAL'] . "</td>";
                        echo "<td>" . $cliente['NOME_REQUERENTE']  . "</td>";
                        echo "<td>" . $cliente['CPF_REQUERENTE'] . "</td>";

                        echo "<td>
                        <a href='dashboard.php?id=" . $cliente['ID_CLIENTE'] . "&dir=views&file=processosEdit'>
                        <button type='button' class='btn btn-outline-dark'>
                            <span class='glyphicon glyphicon-edit'>                
                            </span>
                        </button>
                        </a>
                    
                        <a href='dashboard.php?id=" . $cliente['ID_CLIENTE'] . "&dir=views&file=processosDel'>
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
</div>
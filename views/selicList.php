<?php
/*
Lista a tabela de usuários e cria o botão para adicionar um novo usuário e editar um usuário existente.
*/

//Select de todos os usuários no banco de dados
$SQL = "SELECT * FROM selic";

//Executa a query
$RS = $mysqli->query($SQL);

//Cria um array para armazenar os dados
$indices = [];

//Percorre os dados e armazena no array criado
while ($row = $RS->fetch_assoc()) {
    $indices[] = $row;
}

?>

<div class="principal">
    <div class="col-sm-12 text-left">
        <h1>Lista de Índices Selic</h1><!--Titulo da Página-->
        <hr>
        <a href="dashboard.php?dir=views&file=selicAdd"><span class="glyphicon glyphicon-plus"></span> Novo Cadastro</a>
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
                        <th>Referência</th>
                        <th>Data</th>
                        <th>Selic</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    //Percorre o array de usuários e exibe os dados na tabela
                    foreach ($indices as $indice) {
                        echo "<tr>";
                        echo "<td>" . $indice['referencia']  . "</td>";
                        //Checar se há necessidade de exibir esta coluna ou mudar o formato da data
                        echo "<td>" . date('Y-m', strtotime($indice['data'])) . "</td>";
                        echo "<td>" . $indice['indice'] . " % </td>";
                        echo "<td>
                        <a href='dashboard.php?id=" . $indice['id'] . "&dir=views&file=selicEdit'>
                        <button type='button' class='btn btn-outline-dark'>
                            <span class='glyphicon glyphicon-edit'>                
                            </span>
                        </button>
                        </a>
                    
                        <a href='dashboard.php?id=" . $indice['id'] . "&dir=views&file=selicDel'>
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
<?php
/*
Lista a tabela de usuários e cria o botão para adicionar um novo usuário e editar um usuário existente.
*/

//Select de todos os usuários no banco de dados
$SQL = "SELECT * FROM usuarios";

//Executa a query
$RS = $mysqli->query($SQL);

//Cria um array para armazenar os dados
$usuarios = [];

//Percorre os dados e armazena no array criado
while ($row = $RS->fetch_assoc()) {
    $usuarios[] = $row;   
 }
 
?>


<div class="principal">
    <div class="col-sm-12 text-left">
        <h1>Usuários</h1><!--Titulo da Página-->
        <hr>
        <a href="dashboard.php?dir=views&file=usuariosAdd"><span class="glyphicon glyphicon-plus"></span> Novo Cadastro</a>        
        <hr>
        
        
        <?php
            //Exibe a mensagem de sucesso ao retornar Adicionar/Editar ou Apagar Usuário
            if(isset($_GET['msg'])){
                echo "<div class='alert alert-success' role='alert'>". $_GET['msg'] . "</div>";
            }

            if(isset($_GET['msgd'])){
                echo "<div class='alert alert-danger' role='alert'>". $_GET['msgd'] . "</div>";
            }
        ?>
        
        
        <div class="tabela">         
            <table class="table table-hover">
                <thead>
                    <tr>                        
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Cargo</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                
                <?php
                    //Percorre o array de usuários e exibe os dados na tabela
                    foreach ($usuarios as $usuario) {
                    echo "<tr>";
                    echo "<td>" . $usuario['nome']  . "</td>";
                    echo "<td>" . $usuario['email'] . "</td>";
                    echo "<td>" . $usuario['cargo'] . "</td>";
                    echo "<td>
                        <a href='dashboard.php?id=". $usuario['id'] . "&dir=views&file=usuariosEdit'>
                        <button type='button' class='btn btn-outline-dark'>
                            <span class='glyphicon glyphicon-edit'>                
                            </span>
                        </button>
                        </a>
                    
                        <a href='dashboard.php?id=". $usuario['id'] . "&dir=views&file=usuariosDel'>
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
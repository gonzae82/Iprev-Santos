<?php
include 'db.php';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $referencia = $_POST["referencia"];
    $data = $_POST["data"];
    $indice = $_POST["indice"];

    //Atualizar o usuário no banco de dados
    $SQL = "Update selic set 
        referencia = '$referencia', 
        data = '$data', 
        indice = '$indice'       
        where id = " . $_POST['id'];

    // Executar a query    
    if ($mysqli->query($SQL) === TRUE) {

        // Redirecionar para a página de listagem de usuários        
        header('Location: ../dashboard.php?dir=views&file=selicList&msg=Indíce Selic alterado com sucesso.');
    } else {
        // Caso ocorra algum erro
        //echo "Erro: " . $SQL . "<br>" . $mysqli->error;
        header('Location: ../dashboard.php?dir=views&file=selicList&msgd=Erro ao atualizar Indíce Selic.');
    }

    // Fechar a conexão com o banco de dados
    $mysqli->close();
}

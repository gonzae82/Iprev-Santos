<?php

// Iniciar a sessão
session_start();

// Incluir o arquivo de conexão com o banco de dados
include_once 'db.php';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Apagar o usuário no banco de dados
    $SQL = "DELETE FROM processos WHERE  ID_CLIENTE = " . $_POST['id'];

    // Executar a query
    if ($mysqli->query($SQL) === TRUE) {

        // Redirecionar para a página de listagem de processos
        header('Location: ../dashboard.php?dir=views&file=processosList&msg=Processo apagado com sucesso.');
    } else {
        // Caso ocorra algum erro
        //echo "Erro: " . $SQL . "<br>" . $mysqli->error;
        header('Location: ../dashboard.php?dir=views&file=processosList&msgd=Não foi possível apagar o processo.');
    }
    // Fechar a conexão com o banco de dados    
    $mysqli->close();
}

<?php

// Iniciar a sessão
session_start();

// Incluir o arquivo de conexão com o banco de dados
include_once 'db.php';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {   

   // Apagar o usuário no banco de dados
   $SQL = "DELETE FROM processos_detalhes WHERE id = " . $_POST['id'];


    // Executar a query
    if ($mysqli->query($SQL) === TRUE) {
        //echo "Indíce apagado com sucesso.";
        // Redirecionar para a página de listagem de usuários
        header('Location: ../dashboard.php?dir=views&file=processosDemonstrativoList&id='.$_POST['processo_id'].'&msg=Indíce apagado com sucesso.');
    } else {
        // Caso ocorra algum erro
        //echo "Erro: " . $SQL . "<br>" . $mysqli->error;
        header('Location: ../dashboard.php?dir=views&file=processosDemonstrativoList&id='.$_POST['processo_id'].'&msgd=Não foi possível apagar o indíce.');
    }
    // Fechar a conexão com o banco de dados    
    $mysqli->close();
    
}

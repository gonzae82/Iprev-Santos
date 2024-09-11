<?php

// Iniciar a sessão
session_start();

// Incluir o arquivo de conexão com o banco de dados
include_once 'db.php';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Apagar o usuário no banco de dados
    $SQL = "DELETE FROM usuarios WHERE id = " . $_POST['id'];

    // Verificar se o usuário logado é o mesmo que está sendo apagado, para prevenir que o usuário logado seja apagado
    if ($_SESSION['usuario_id'] == $_POST['id']) {
        header('Location: ../dashboard.php?dir=views&file=usuariosList&msgd=Você não pode apagar o seu próprio usuário.');
    } else {
        // Executar a query
        if ($mysqli->query($SQL) === TRUE) {
            //echo "Usuário apagado com sucesso.";
            // Redirecionar para a página de listagem de usuários
            header('Location: ../dashboard.php?dir=views&file=usuariosList&msg=Usuário apagado com sucesso.');
        } else {
            // Caso ocorra algum erro
            //echo "Erro: " . $SQL . "<br>" . $mysqli->error;
            header('Location: ../dashboard.php?dir=views&file=usuariosList&msgd=Não foi possível apagar o usuário.');
        }
    }
    // Fechar a conexão com o banco de dados    
    $mysqli->close();
}

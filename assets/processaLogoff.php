<?php
session_start();
if (isset($_SESSION)) {
    
    // Destroí aos dados da sessão do usuário.
    session_destroy();
    
    // Redireciona para a página de login
    header("Location: ../login.html");
    
    // Adiciona exit para garantir que o script seja interrompido após redirecionamento
    exit(); 
} else {

    // Adiciona exit para garantir que o script seja interrompido após redirecionamento
    exit();
}
?>

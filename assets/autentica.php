<?php

// Iniciar a sessão
session_start();

// Verificar se o usuário está logado checando se há sessão, se não estiver envia para pág de login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit(); 
}
?>
<?php
session_start();
if (isset($_SESSION)) {
    session_destroy();
    header("Location: ../login.html");
    exit(); // Adiciona exit para garantir que o script seja interrompido após redirecionamento
} else {
    exit();
}
?>

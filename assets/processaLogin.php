<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Prevenir SQL Injection
    $usuario = $mysqli->real_escape_string($usuario);
    $senha = $mysqli->real_escape_string($senha);

    // Consultar o banco de dados para verificar as credenciais
    $sql = "SELECT * FROM usuarios WHERE email = '$usuario'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verificar a senha
        if (password_verify($senha, $row['senha'])) {
            $_SESSION['usuario'] = $usuario;
            header("Location: ../index.php");
            exit();
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }
}
?>
<?php

// Iniciar a sessão
session_start();

//Incluir o arquivo de conexão com o banco de dados
include_once 'db.php';

// Verificar se o método de requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Receber os dados do formulário
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Prevenir SQL Injection
    $usuario = $mysqli->real_escape_string($usuario);
    $senha = $mysqli->real_escape_string($senha);

    // Consultar o banco de dados para verificar as credenciais
    $sql = "SELECT * FROM usuarios WHERE email = '$usuario'";

    // Executar a consulta
    $result = $mysqli->query($sql);

    // Verificar se o usuário existe
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verificar a senha
        if (password_verify($senha, $row['senha'])) {

            // Armazena os dados do usuário na sessão
            $_SESSION['usuario'] = $usuario;
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['cargo'] = $row['cargo'];

            // Redireciona para a página de dashboard
            header("Location: ../dashboard.php?dir=views&file=home");
            exit();
        } else {
            // Senha incorreta
            echo "Senha incorreta.";
        }
    } else {

        // Caso o Usuário não seja encontrado no banco de dados
        echo "Usuário não encontrado.";
    }

    // Fechar a conexão com o banco de dados
    $mysqli->close();
}

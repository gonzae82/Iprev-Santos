<?php

// Incluir o arquivo de conexão com o banco de dados
include_once 'db.php';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obter os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $cargo = $_POST["cargo"];

    // Hash da senha
    $hashed_password = password_hash($senha, PASSWORD_DEFAULT);

    // Inserir o novo usuário no banco de dados
    $SQL = "INSERT INTO usuarios (nome, email, senha, cargo) VALUES ('$nome', '$email', '$hashed_password', '$cargo')";

    // Executar a query
    if ($mysqli->query($SQL) === TRUE) {
        // Redirecionar para a página de listagem de usuários
        //echo "Usuário criado com sucesso.";
        header('Location: ../dashboard.php?dir=views&file=usuariosList&msg=Usuário criado com sucesso.');
    } else {
        // Caso ocorra algum erro
        //echo "Erro: " . $SQL . "<br>" . $mysqli->error;
        header('Location: ../dashboard.php?dir=views&file=usuariosList&msgd=Erro ao criar o usuario.');
    }
}

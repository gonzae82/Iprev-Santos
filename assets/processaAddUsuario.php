<?php
include 'db.php';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Hash da senha
    $hashed_password = password_hash($senha, PASSWORD_DEFAULT);

    // Inserir o novo usuário no banco de dados
    $sql = "INSERT INTO usuarios (nome, email, senha, cargo) VALUES ('$nome', '$email', '$hashed_password', 'admin')";

    if ($mysqli->query($sql) === TRUE) {
        echo "Usuário criado com sucesso.";
    } else {
        echo "Erro: " . $sql . "<br>" . $mysqli->error;
    }
}

?>
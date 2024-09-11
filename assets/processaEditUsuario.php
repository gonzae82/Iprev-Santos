<?php
include 'db.php';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $cargo = $_POST["cargo"];

    // Hash da senha
    $hashed_password = password_hash($senha, PASSWORD_DEFAULT);

    //Atualizar o usuário no banco de dados
    $SQL = "Update usuarios set 
        nome = '$nome', 
        email = '$email', 
        senha = '$hashed_password', 
        cargo = '$cargo' 
        where id = " . $_POST['id'];

    // Executar a query    
    if ($mysqli->query($SQL) === TRUE) {

        // Redirecionar para a página de listagem de usuários
        //echo "Usuário atualizado com sucesso.";
        header('Location: ../dashboard.php?dir=views&file=usuariosList&msg=Usuário alterado com sucesso.');
    } else {
        // Caso ocorra algum erro
        echo "Erro: " . $SQL . "<br>" . $mysqli->error;
    }

    // Fechar a conexão com o banco de dados
    $mysqli->close();
}

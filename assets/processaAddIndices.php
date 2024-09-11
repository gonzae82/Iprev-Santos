<?php

// Incluir o arquivo de conexão com o banco de dados
include_once 'db.php';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obter os dados do formulário
    $referencia = $_POST["referencia"];
    $data = $_POST["data"];
    $indice = $_POST["indice"];

    // Inserir o novo indíce no banco de dados
    $SQL = "INSERT INTO indices (referencia, data, indice) VALUES ('$referencia', '$data', '$indice')";

    // Executar a query
    if ($mysqli->query($SQL) === TRUE) {
        // Redirecionar para a página de listagem de usuários
        //echo "Indíce criado com sucesso.";
        header('Location: ../dashboard.php?dir=views&file=indicesList&msg=Usuário criado com sucesso.');
    } else {
        // Caso ocorra algum erro
        //echo "Erro: " . $SQL . "<br>" . $mysqli->error;
        header('Location: ../dashboard.php?dir=views&file=indicesList&msgd=Erro ao criar o indíce.');
    }
}

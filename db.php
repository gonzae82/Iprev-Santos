<?php
$servidor = "localhost";
$usuario = "root";
$senha = "siaemicr";
$db = "processos_judiciais";

// Estabelecer conexão com o banco de dados
$mysqli = new mysqli($servidor, $usuario, $senha, $db);

// Verificar se ocorreu algum erro na conexão
if ($mysqli->connect_errno) {
    echo "Erro ao conectar a base de dados: " . $mysqli->connect_error;
    exit();
}

<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$servidor = $_ENV['DB_HOST'];
$usuario = $_ENV['DB_USER'];
$senha = $_ENV['DB_PASS'];
$db = $_ENV['DB_NAME'];


// Estabelecer conexão com o banco de dados
$mysqli = new mysqli($servidor, $usuario, $senha, $db);

// Verificar se ocorreu algum erro na conexão
if ($mysqli->connect_errno) {
    echo "Erro ao conectar a base de dados: " . $mysqli->connect_error;
    exit();
}

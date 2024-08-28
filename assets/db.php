<?php
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Verificar qual o sistema operacional instalado
$OS = PHP_OS;

// Verificar se o sistema operacional é Windows
if (strtoupper(substr($OS, 0, 3)) === 'WIN') {
    // Código para o  Windows
    $servidor = $_ENV['DB_HOST'];
    $usuario = $_ENV['DB_USER'];
    $senha = $_ENV['DB_PASS'];
    $db = $_ENV['DB_NAME'];
} else {
    // Código para outros sistemas operacionais (Linux, macOS, etc.)
    $servidor = $_ENV['DB_HOST'];
    $usuario = $_ENV['DB_USER_WEB'];
    $senha = $_ENV['DB_PASS_WEB'];
    $db = $_ENV['DB_NAME_WEB'];
}

// Estabelecer conexão com o banco de dados
$mysqli = new mysqli($servidor, $usuario, $senha, $db);

// Definir o conjunto de caracteres para UTF-8
$mysqli->set_charset("utf8");

// Verificar se ocorreu algum erro na conexão
if ($mysqli->connect_errno) {
    return "Erro ao conectar a base de dados: " . $mysqli->connect_error;
    exit();
}

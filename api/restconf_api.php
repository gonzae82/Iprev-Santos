<?php
include_once '../assets/db.php';
header('Content-Type: application/json');

// Captura o caminho solicitado
$requestUri = $_SERVER['REQUEST_URI'];
$basePath = '/projetos/iprevsantos/api/';

// Remove o caminho base para obter apenas a parte relevante da rota
$route = str_replace($basePath, '', $requestUri);

// Divide a rota para identificar o endpoint e os parâmetros
$routeParts = explode('/', trim($route, '/'));

//Data Limite do Índice antes da Selic
$limite = '2021-13';

if (count($routeParts) >= 2) {
    $endpoint = $routeParts[0];
    $param = $routeParts[1];
    $tipoIndice = isset($routeParts[2]) ? $routeParts[2] : null; // Captura o tipo de índice, se existir

    switch ($endpoint) {
        case 'indice':
        if ($param <= $limite) {    
            $SQL = "SELECT indice FROM indices where data like '" . $param."'";
            $RS = $mysqli->query($SQL);

            // Inicializando a variável para armazenar o índice
            $indice = null; 
            if ($RS) {
                // Fetch associativo para pegar os resultados
                while ($row = $RS->fetch_assoc()) {
                    // Armazena o índice encontrado
                    $indice = $row['indice']; 
                }                                
                // Resposta JSON do indice
                echo json_encode(["indice" => $indice]);
            } else {
                echo json_encode(["error" => "Erro na consulta SQL: " . $mysqli->error]);
            }                   
        } else {
            $SQL = "SELECT indice FROM selic where data like '" . $param."'";
            $RS = $mysqli->query($SQL);

            // Inicializando a variável para armazenar o índice
            $indice = null; 
            if ($RS) {
                // Fetch associativo para pegar os resultados
                while ($row = $RS->fetch_assoc()) {
                    // Armazena o índice encontrado
                    $indice = $row['indice']; 
                }                                
                // Resposta JSON do indice
                echo json_encode(["indice" => $indice]);
            } else {
                echo json_encode(["error" => "Erro na consulta SQL: " . $mysqli->error]);
            }                   
        }

            break;    

        case 'indice_full':
            $SQL = "SELECT indice FROM indices where data like '" . $param."'";
            $RS = $mysqli->query($SQL);

            // Inicializando a variável para armazenar o índice
            $indice = null; 
            if ($RS) {
                // Fetch associativo para pegar os resultados
                while ($row = $RS->fetch_assoc()) {
                    // Armazena o índice encontrado
                    $indice = $row['indice']; 
                }                                
                // Resposta JSON do indice
                echo json_encode(["indice" => $indice]);
            } else {
                echo json_encode(["error" => "Erro na consulta SQL: " . $mysqli->error]);
            }    
            
            break;
        
        default:
            http_response_code(404);
            echo json_encode(["error" => "Endpoint desconhecido"]);
            break;    
    }
} else {
    // Rota inválida
    http_response_code(400);
    echo json_encode(["error" => "Rota inválida"]);
}

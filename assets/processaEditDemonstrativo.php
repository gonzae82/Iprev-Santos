<?php
include_once 'db.php';

// Verifica se a variável $_POST está definida e não está vazia
if (isset($_POST) && !empty($_POST)) {

$processo_id = $mysqli->real_escape_string($_POST['processo_id']);

$data_inicial = $mysqli->real_escape_string($_POST['data_inicial']);
$indice_inicial = $mysqli->real_escape_string($_POST['indice_inicial']);
$diferenca_inicial = $mysqli->real_escape_string($_POST['diferenca_inicial']);
$ir_inicial = $mysqli->real_escape_string($_POST['ir_inicial']);


// Verifica se alguma variável está vazia
if (empty($data_inicial) || empty($indice_inicial) || empty($diferenca_inicial) || empty($ir_inicial)) {
    header('Location: ../dashboard.php?dir=views&file=processosDemonstrativoList&id=' . $processo_id . '&msgd=Erro ao criar o índice, campos vazios.');
    exit(); // encerra o script para garantir que o redirecionamento ocorra
}

//Convertendo para o formato do MySQL
$indice_inicial_mysql = converteValor($indice_inicial);
$diferenca_inicial_mysql = converteValor($diferenca_inicial);
$ir_inicial_mysql = converteValor($ir_inicial);

// Inserir o novo indíce no banco de dados
$SQL = "INSERT INTO processos_detalhes (processo_id,data_inicial, indice_inicial, diferenca_inicial, ir_inicial) VALUES ('$processo_id','$data_inicial', '$indice_inicial_mysql', '$diferenca_inicial_mysql', '$ir_inicial_mysql')";
    
    // Executar a query
    if ($mysqli->query($SQL) === TRUE) {
        // Redirecionar para a página de listagem do demonstrativo        
        header('Location: ../dashboard.php?dir=views&file=processosDemonstrativoList&id= '. $processo_id .'&msg=Registro criado com sucesso.');
    } else {
        // Caso ocorra algum erro        
        header('Location: ../dashboard.php?dir=views&file=processosDemonstrativoList&id= '.$processo_id .'&msgd=Erro ao criar o indíce.');        
    }
}

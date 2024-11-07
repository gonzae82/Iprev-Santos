<?php
// Iniciar a sessão
session_start();

include_once 'db.php';
// Verifica se a variável $_POST está definida e não está vazia
if (isset($_POST) && !empty($_POST)) {
    
    // Coleta dos dados do formulário, usando filtros básicos para evitar injeção de SQL
    $id = $mysqli->real_escape_string($_POST['id'] ?? '');
    $numero_processo_digital = $mysqli->real_escape_string($_POST['NUMERO_PROCESSO_DIGITAL'] ?? '');
    $nome_requerente = $mysqli->real_escape_string($_POST['NOME_REQUERENTE'] ?? '');
    $cpf_requerente = $mysqli->real_escape_string($_POST['CPF_REQUERENTE'] ?? '');
    $reg_requerente = $mysqli->real_escape_string($_POST['REG_REQUERENTE'] ?? '');
    $processo_administrativo = $mysqli->real_escape_string($_POST['PROCESSO_ADMINISTRATIVO'] ?? '');
    $citacao_requerente = $mysqli->real_escape_string($_POST['CITACAO_REQUERENTE'] ?? '');
    $calculo_ir = $mysqli->real_escape_string($_POST['CALCULO_IR'] ?? '');
    $data_atualizacao = $mysqli->real_escape_string($_POST['DATA_ATUALIZACAO'] ?? '');
    $valor_principal = $mysqli->real_escape_string($_POST['VALOR_PRINCIPAL'] ?? '');
    $valor_atualizado = $mysqli->real_escape_string($_POST['VALOR_ATUALIZADO'] ?? '');
    $selic_mes_final = $mysqli->real_escape_string($_POST['selic_mes_final'] ?? '');
    $indice_final = $mysqli->real_escape_string($_POST['indice_final'] ?? '');
    $indice_selic_final = $mysqli->real_escape_string($_POST['indice_selic_final'] ?? '');

    
    $custas = $mysqli->real_escape_string($_POST['CUSTAS'] ?? '');
    $honorarios = $mysqli->real_escape_string($_POST['HONORARIOS'] ?? '');
    $honorarios_percentual = $mysqli->real_escape_string($_POST['HONORARIOS_PERCENTUAL'] ?? '');
    $capep_valor = $mysqli->real_escape_string($_POST['CAPEP_VALOR'] ?? '');
    $iprev_valor = $mysqli->real_escape_string($_POST['IPREV_VALOR'] ?? '');
    
    //Verifica quem é o usuário logado para ser o Responsável pelo demonstrativo
    $nome_responsavel = $_SESSION['nome'];;
    $cargo_responsavel = $_SESSION['cargo'];
    
    $data_responsavel = date('Y-m-d');
    $conclusoes = $mysqli->real_escape_string($_POST['CONCLUSOES'] ?? '');

    // Preparação e execução da consulta SQL para inserção na tabela "processos"
    $SQL_PROCESSO_UPDATE = "UPDATE processos 
    SET NUMERO_PROCESSO_DIGITAL = '$numero_processo_digital', 
        NOME_REQUERENTE = '$nome_requerente', 
        CPF_REQUERENTE = '$cpf_requerente', 
        REG_REQUERENTE = '$reg_requerente', 
        PROCESSO_ADMINISTRATIVO = '$processo_administrativo', 
        CITACAO_REQUERENTE = '$citacao_requerente', 
        CALCULO_IR = '$calculo_ir', 
        DATA_ATUALIZACAO = '$data_atualizacao', 
        VALOR_PRINCIPAL = '$valor_principal', 
        VALOR_ATUALIZADO = '$valor_atualizado', 
        selic_mes_final = '$selic_mes_final', 
        indice_final = '$indice_final', 
        indice_selic_final = '$indice_selic_final',         
        CUSTAS = '$custas', 
        HONORARIOS = '$honorarios', 
        HONORARIOS_PERCENTUAL = '$honorarios_percentual', 
        IPREV_VALOR = '$iprev_valor', 
        NOME_RESPONSAVEL = '$nome_responsavel', 
        CARGO_RESPONSAVEL = '$cargo_responsavel', 
        DATA_RESPONSAVEL = '$data_responsavel', 
        CONCLUSOES = '$conclusoes', 
        CAPEP_VALOR = '$capep_valor' 
    WHERE ID_CLIENTE = '$id'";

        if ($mysqli->query($SQL_PROCESSO_UPDATE) === TRUE) {

            // Redirecionar para a página de listagem de processos
            //echo "Usuário atualizado com sucesso.";
            header('Location: ../dashboard.php?dir=views&file=processosList&msg=Processo alterado com sucesso.');
        } else {
            // Caso ocorra algum erro
            echo "Erro: " . $SQL . "<br>" . $mysqli->error;
        }    
    
} else {
    echo "Nenhum dado foi recebido.";
}

// Fecha a conexão
$mysqli->close();
?>
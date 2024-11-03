<?php
include_once 'db.php';

// Verifica se a variável $_POST está definida e não está vazia
if (isset($_POST) && !empty($_POST)) {
    
    // Coleta dos dados do formulário, usando filtros básicos para evitar injeção de SQL
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
    $juros_moratorios = $mysqli->real_escape_string($_POST['JUROS_MORATORIOS'] ?? '');
    $custas = $mysqli->real_escape_string($_POST['CUSTAS'] ?? '');
    $honorarios = $mysqli->real_escape_string($_POST['HONORARIOS'] ?? '');
    $honorarios_percentual = $mysqli->real_escape_string($_POST['HONORARIOS_PERCENTUAL'] ?? '');
    $capep_valor = $mysqli->real_escape_string($_POST['CAPEP_VALOR'] ?? '');
    $iprev_valor = $mysqli->real_escape_string($_POST['IPREV_VALOR'] ?? '');
    $nome_responsavel = $mysqli->real_escape_string($_POST['NOME_RESPONSAVEL'] ?? '');
    $cargo_responsavel = $mysqli->real_escape_string($_POST['CARGO_RESPONSAVEL'] ?? '');
    $data_responsavel = $mysqli->real_escape_string($_POST['DATA_RESPONSAVEL'] ?? '');
    $conclusoes = $mysqli->real_escape_string($_POST['CONCLUSOES'] ?? '');


    // Preparação e execução da consulta SQL para inserção na tabela "processos"
    $SQL_PROCESSO_ADD = "INSERT INTO processos(NUMERO_PROCESSO_DIGITAL, NOME_REQUERENTE, CPF_REQUERENTE, REG_REQUERENTE, PROCESSO_ADMINISTRATIVO, CITACAO_REQUERENTE, CALCULO_IR, DATA_ATUALIZACAO, VALOR_PRINCIPAL, VALOR_ATUALIZADO, JUROS_MORATORIOS, CUSTAS, HONORARIOS, HONORARIOS_PERCENTUAL, IPREV_VALOR, NOME_RESPONSAVEL, CARGO_RESPONSAVEL, DATA_RESPONSAVEL, CONCLUSOES, CAPEP_VALOR)
        VALUES ('$numero_processo_digital', '$nome_requerente', '$cpf_requerente', '$reg_requerente', '$processo_administrativo', '$citacao_requerente', '$calculo_ir', '$data_atualizacao', '$valor_principal', '$valor_atualizado', '$juros_moratorios', '$custas', '$honorarios', '$honorarios_percentual', '$iprev_valor', '$nome_responsavel', '$cargo_responsavel', '$data_responsavel', '$conclusoes', '$capep_valor')";
        
        if ($mysqli->query($SQL_PROCESSO_ADD) === TRUE) {

            // Redirecionar para a página de listagem de processos
            //echo "Usuário atualizado com sucesso.";
            header('Location: ../dashboard.php?dir=views&file=processosList&msg=Processo alterado com sucesso.');
        } else {
            // Caso ocorra algum erro
            echo "Erro: " . $SQSQL_PROCESSO_ADD . "<br>" . $mysqli->error;
        }    
    
        } else {
            echo "Nenhum dado foi recebido.";
        }

// Fecha a conexão
$mysqli->close();
?>

<?php
include_once 'db.php';

// Verifica se a variável $_POST está definida e não está vazia
if (isset($_POST) && !empty($_POST)) {

    // Coleta dos dados do formulário
    $numero_processo_digital = $_POST['NUMERO_PROCESSO_DIGITAL'] ?? '';
    $nome_requerente = $_POST['NOME_REQUERENTE'] ?? '';
    $cpf_requerente = $_POST['CPF_REQUERENTE'] ?? '';
    $reg_requerente = $_POST['REG_REQUERENTE'] ?? '';
    $processo_administrativo = $_POST['PROCESSO_ADMINISTRATIVO'] ?? '';
    $citacao_requerente = $_POST['CITACAO_REQUERENTE'] ?? '';
    $calculo_ir = $_POST['CALCULO_IR'] ?? '';
    $data_atualizacao = $_POST['DATA_ATUALIZACAO'] ?? '';
    $valor_principal = $_POST['VALOR_PRINCIPAL'] ?? '';
    $valor_atualizado = $_POST['VALOR_ATUALIZADO'] ?? '';
    $juros_moratorios = $_POST['JUROS_MORATORIOS'] ?? '';
    $custas = $_POST['CUSTAS'] ?? '';
    $honorarios = $_POST['HONORARIOS'] ?? '';
    $honorarios_percentual = $_POST['HONORARIOS_PERCENTUAL'] ?? '';
    $capep_valor = $_POST['CAPEP_VALOR'] ?? '';
    $iprev_valor = $_POST['IPREV_VALOR'] ?? '';
    $nome_responsavel = $_POST['NOME_RESPONSAVEL'] ?? '';
    $cargo_responsavel = $_POST['CARGO_RESPONSAVEL'] ?? '';
    $data_responsavel = $_POST['DATA_RESPONSAVEL'] ?? '';
    $conclusoes = $_POST['CONCLUSOES'] ?? '';

  /*//Conexão com o banco de dados
    $servidor = "localhost";
    $usuario = "root";
    $senha = "siaemicr";
    $db = "processos_judiciais"; */

    $conn = new mysqli($servidor, $usuario, $senha, $db);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Preparação e execução da consulta SQL para inserção na tabela "cadastro_cliente"
    $sql_code_cadastro_cliente = "INSERT INTO cadastro_cliente (NUMERO_PROCESSO_DIGITAL, NOME_REQUERENTE, CPF_REQUERENTE, REG_REQUERENTE, PROCESSO_ADMINISTRATIVO, CITACAO_REQUERENTE, CALCULO_IR, DATA_ATUALIZACAO, VALOR_PRINCIPAL, VALOR_ATUALIZADO, JUROS_MORATORIOS, CUSTAS, HONORARIOS, HONORARIOS_PERCENTUAL, IPREV_VALOR, NOME_RESPONSAVEL, CARGO_RESPONSAVEL, DATA_RESPONSAVEL, CONCLUSOES, CAPEP_VALOR)
        VALUES ('$numero_processo_digital', '$nome_requerente', '$cpf_requerente', '$reg_requerente', '$processo_administrativo', '$citacao_requerente', '$calculo_ir', '$data_atualizacao', '$valor_principal', '$valor_atualizado', '$juros_moratorios', '$custas', '$honorarios', '$honorarios_percentual', '$iprev_valor', '$nome_responsavel', '$cargo_responsavel', '$data_responsavel', '$conclusoes', '$capep_valor')";

    if ($conn->query($sql_code_cadastro_cliente) === TRUE) {
        echo "Informações cadastradas com sucesso na tabela 'cadastro_cliente'!";
    } else {
        echo "Erro ao cadastrar informações na tabela 'cadastro_cliente': " . $conn->error;
    }

    // Obter o ID do cliente inserido
    $id_cliente = $conn->insert_id;

    // Datas e valores da tabela informacoes_financeira
    $data_indice = $_POST['data_indice'] ?? [];
    $valor_indice = $_POST['valor_indice'] ?? [];
    $diferenca_inicial = $_POST['diferenca_inicial'] ?? [];
    $ir = $_POST['ir'] ?? [];

    // Preparação e execução da consulta SQL para inserção na tabela "informacoes_financeiras"
    foreach ($data_indice as $key => $data) {
        $valor_ind = $valor_indice[$key] ?? '';
        $dif_inicial = $diferenca_inicial[$key] ?? '';
        $ir_value = $ir[$key] ?? '';

        $sql_code_informacoes_financeiras = "INSERT INTO informacoes_financeiras (ID_CLIENTE, DATA_INDICE, VALOR_INDICE, DIFERENCA_INICIAL, IR, CAL_IR_RETENCAO_LEGAL)
            VALUES ('$id_cliente', '$data', '$valor_ind', '$dif_inicial', '$ir_value', ($ir_value / $valor_ind * $valor_ind))";

        if ($conn->query($sql_code_informacoes_financeiras) === TRUE) {
            echo "Informações cadastradas com sucesso na tabela 'informacoes_financeiras'!";
            
            // Recuperar o ID da informação financeira inserida
            $id_informacao_inserida = $conn->insert_id;
            
            // Calcular o valor atualizado
            $valor_atualizado = floatval($dif_inicial) / floatval($valor_ind);
            
            // Preparar e executar a consulta SQL para atualizar o valor atualizado
            $sql_atualizar_valor_atualizado = "UPDATE informacoes_financeiras
                                               SET CAL_VALOR_ATUALIZADO = '$valor_atualizado'
                                               WHERE ID_INFORMACAO = '$id_informacao_inserida'";
            
            if ($conn->query($sql_atualizar_valor_atualizado) === TRUE) {
                echo "Valor atualizado atualizado com sucesso!";
                
                // Calcular o valor do CAPEP
                $calculo_capep = $valor_atualizado * 0.3;

                // Preparar e executar a consulta SQL para atualizar o CAPEP na tabela "informacoes_financeiras"
                $sql_atualizar_capep = "UPDATE informacoes_financeiras
                                        SET CAL_CAPEP_RETENCAO_LEGAL = '$calculo_capep'
                                        WHERE ID_INFORMACAO = '$id_informacao_inserida'";

                if ($conn->query($sql_atualizar_capep) === TRUE) {
                    echo "Valor do CAPEP calculado e atualizado com sucesso!";
                    
                    // Calcular o valor do IPREV
                    $calculo_iprev = $valor_atualizado * 0.12;

                    // Preparar e executar a consulta SQL para atualizar o IPREV na tabela "informacoes_financeiras"
                    $sql_atualizar_iprev = "UPDATE informacoes_financeiras
                                            SET CAL_IPREV_RETENCAO_LEGAL = '$calculo_iprev'
                                            WHERE ID_INFORMACAO = '$id_informacao_inserida'";

                    if ($conn->query($sql_atualizar_iprev) === TRUE) {
                        echo "Valor do IPREV calculado e atualizado com sucesso!";
                    } else {
                        echo "Erro ao atualizar valor do IPREV: " . $conn->error;
                    }
                } else {
                    echo "Erro ao atualizar valor do CAPEP: " . $conn->error;
                }
            } else {
                echo "Erro ao atualizar valor atualizado: " . $conn->error;
            }
        } else {
            echo "Erro ao cadastrar informações na tabela 'informacoes_financeiras': " . $conn->error;
        }
    }

    // Exibir o valor total do índice para cada linha
    foreach ($data_indice as $key => $data) {
        $valor_indice_array = explode('<br>', $valor_indice[$key]); // Converter a string em um array de valores
        $total_valor_indice = array_sum($valor_indice_array); // Calcular o total dos valores
        echo "<tr>";
        echo "<td>Total valor indice: ".$total_valor_indice."</td>";
        echo "</tr>";
    }


    // Exibir o valor total da Diferença Inicial para cada linha
    foreach ($data_indice as $key => $data) {
    $diferenca_inicial_array = explode('<br>', $diferenca_inicial[$key]); // Converter a string em um array de valores
    $total_diferenca_inicial = array_sum($diferenca_inicial_array); // Calcular o total dos valores
    echo "<tr>";
    echo "<td>Total diferenca inicial: ".$total_diferenca_inicial."</td>";
    echo "</tr>";
}


 // Exibir o valor total do IR para cada linha
foreach ($data_indice as $key => $data) {
    $ir_array = explode('<br>', $ir[$key]); // Converter a string em um array de valores
    $total_ir = array_sum($ir_array); // Calcular o total dos valores
    echo "<tr>";
    echo "<td>Total IR: ".$total_ir."</td>";
    echo "</tr>";
}

    
// Exibir o valor total do valor atualizado para cada linha
foreach ($data_indice as $key => $data) {
    $cal_valor_atualizado_array = explode('<br>', $row["CAL_VALOR_ATUALIZADO"]); // Converter a string em um array de valores
    $total_cal_valor_atualizado = array_sum($cal_valor_atualizado_array); // Calcular o total dos valores
    echo "<tr>";
    echo "<td>Total do valor atualizado: ".$total_cal_valor_atualizado."</td>";
    echo "</tr>";
}


// Exibir o valor total do Total CAPEP para cada linha
foreach ($data_indice as $key => $data) {
    $cal_capep_array = explode('<br>', $row["CAL_CAPEP_RETENCAO_LEGAL"]); // Converter a string em um array de valores
    $total_cal_capep = array_sum($cal_capep_array); // Calcular o total dos valores
    echo "<tr>";
    echo "<td>Total do CAL_CAPEP_RETENCAO_LEGAL: ".$total_cal_capep."</td>";
    echo "</tr>";
}


// Exibir o valor total doTotal IPREV para cada linha
foreach ($data_indice as $key => $data) {
    $cal_iprev_array = explode('<br>', $row["CAL_IPREV_RETENCAO_LEGAL"]); // Converter a string em um array de valores
    $total_cal_iprev = array_sum($cal_iprev_array); // Calcular o total dos valores
    echo "<tr>";
    echo "<td>Total do CAL_IPREV_RETENCAO_LEGAL: ".$total_cal_iprev."</td>";
    echo "</tr>";
}


// Exibir o valor total do Total IR para cada linha
foreach ($data_indice as $key => $data) {
    $cal_ir_array = explode('<br>', $row["CAL_IR_RETENCAO_LEGAL"]); // Converter a string em um array de valores
    $total_cal_ir = array_sum($cal_ir_array); // Calcular o total dos valores
    echo "<tr>";
    echo "<td>Total do CAL_IR_RETENCAO_LEGAL: ".$total_cal_ir."</td>";
    echo "</tr>";
}

    $conn->close();
} else {
    echo "Nenhum dado enviado pelo formulário.";
}
?>

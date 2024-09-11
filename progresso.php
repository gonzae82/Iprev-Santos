<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/progresso.css">
    <title>Iprev Santos</title>
    <link rel="icon" href="img/icone_aba.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Adicionando bordas aos elementos do formulário */
        input[type="text"],
        input[type="date"],
        button,
        textarea {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 8px;
            margin-bottom: 10px;
        }

        /* Estilizando os rótulos dos campos */
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        /* Estilizando células da tabela de resultados */
        .resultado_pesquisa th,
        .resultado_pesquisa td {
            border: 1px solid #ccc;
            padding: 5px;
            border: 1px solid black;
            /* Adicionando borda preta */
        }

        /* Adicionando bordas entre as colunas */
        .resultado_pesquisa td+td,
        .resultado_pesquisa th+th {
            border-left: 1px solid #ccc;
        }

        /* Adicionando borda preta ao redor dos resultados da pesquisa */
        .resultado_pesquisa {
            border: 1px solid black;
            margin-top: 20px;
            margin-bottom: 30px;
            padding: 10px;
            border-color: white;
        }

        /* Removendo a borda do título "Resultados da Pesquisa" */
        .resultado_pesquisa h4 {
            padding: 8px;
            display: inline-block;
        }

        .container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            /* Espaçamento na parte inferior */
        }

        .container>div {
            flex-grow: 1;
            margin-right: 10px;
            /* Espaçamento entre os campos */
        }

        .container>div:last-child {
            margin-right: 0;
            /* Remove o espaçamento do último campo */
        }

        .container>div>label {
            display: block;
            margin-bottom: 5px;
            /* Espaçamento entre a label e o textarea */
        }

        .container>div>textarea {
            width: 300px;
            /* Largura total */
            box-sizing: border-box;
            /* Inclui padding e border na largura */
        }
    </style>
</head>

<body>
    <a href="header.php"><button type="button" class="btn btn-outline-secondary">Voltar</button></a>
    <img src="./img/iprevsantos.png" class="rounded mx-auto d-block" alt="logo da empresa com a descrição iprev santos em duas cores (preto e dourado)">

    <h4 id="textoCadastro">Cadastro de Informações:</h4><br>

    <div class="container">
        <form action="processar_cadastro.php" method="post" class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col">
                <label for="NUMERO_PROCESSO_DIGITAL">Número do processo digital:</label>
                <input type="text" id="NUMERO_PROCESSO_DIGITAL" name="NUMERO_PROCESSO_DIGITAL">
            </div>
            <div class="col">
                <label for="NOME_REQUERENTE">Nome requerente:</label>
                <input type="text" id="NOME_REQUERENTE" name="NOME_REQUERENTE">
            </div>
            <div class="col">
                <label for="CPF_REQUERENTE">CPF:</label>
                <input type="text" id="CPF_REQUERENTE" name="CPF_REQUERENTE">
            </div>
            <div class="col">
                <label for="REG_REQUERENTE">Reg requerente:</label>
                <input type="text" id="REG_REQUERENTE" name="REG_REQUERENTE">
            </div>
            <div class="col">
                <label for="PROCESSO_ADMINISTRATIVO">Processo Administrativo:</label>
                <input type="text" id="PROCESSO_ADMINISTRATIVO" name="PROCESSO_ADMINISTRATIVO">
            </div>
            <div class="col">
                <label for="CITACAO_REQUERENTE">Citação requerente:</label>
                <input type="text" id="CITACAO_REQUERENTE" name="CITACAO_REQUERENTE">
            </div>
            <div class="col">
                <label for="CALCULO_IR">Cálculo do IR:</label>
                <input type="text" id="CALCULO_IR" name="CALCULO_IR">
            </div>
            <div class="col">
                <label for="DATA_ATUALIZACAO">Data de Atualização:</label>
                <input type="date" id="DATA_ATUALIZACAO" name="DATA_ATUALIZACAO">
            </div>
            <div class="col">
                <label for="VALOR_PRINCIPAL">Valor Principal:</label>
                <input type="text" id="VALOR_PRINCIPAL" name="VALOR_PRINCIPAL">
            </div>
            <div class="col">
                <label for="VALOR_ATUALIZADO">Valor Atualizado:</label>
                <input type="text" id="VALOR_ATUALIZADO" name="VALOR_ATUALIZADO">
            </div>
            <div class="col">
                <label for="JUROS_MORATORIOS">Juros Moratórios:</label>
                <input type="text" id="JUROS_MORATORIOS" name="JUROS_MORATORIOS">
            </div>
            <div class="col">
                <label for="CUSTAS">Custas:</label>
                <input type="text" id="CUSTAS" name="CUSTAS">
            </div>
            <div class="col">
                <label for="HONORARIOS">Honorários:</label>
                <input type="text" id="HONORARIOS" name="HONORARIOS">
            </div>
            <div class="col">
                <label for="HONORARIOS_PERCENTUAL">Percentual de Honorários:</label>
                <input type="text" id="HONORARIOS_PERCENTUAL" name="HONORARIOS_PERCENTUAL">
            </div>
            <div class="col">
                <label for="CAPEP_VALOR">CAPEP:</label>
                <input type="text" id="CAPEP_VALOR" name="CAPEP_VALOR">
            </div>
            <div class="col">
                <label for="IPREV_VALOR">IPREV:</label>
                <input type="text" id="IPREV_VALOR" name="IPREV_VALOR">
            </div>
            <div class="col">
                <label for="NOME_RESPONSAVEL">Nome do Responsável:</label>
                <input type="text" id="NOME_RESPONSAVEL" name="NOME_RESPONSAVEL">
            </div>
            <div class="col">
                <label for="CARGO_RESPONSAVEL">Cargo do Responsável:</label>
                <input type="text" id="CARGO_RESPONSAVEL" name="CARGO_RESPONSAVEL">
            </div>
            <div class="col">
                <label for="DATA_RESPONSAVEL">Data do Responsável:</label>
                <input type="date" id="DATA_RESPONSAVEL" name="DATA_RESPONSAVEL">
            </div>
            <div class="col">
                <label for="CONCLUSOES">Conclusões do Responsável:</label>
                <input type="text" id="CONCLUSOES" name="CONCLUSOES">
            </div>

            <!-- HTML para o campo Data de Início -->
            <div class="col">
                <label for="data_indice">Data de Início:</label>
                <div id="data_indice_container">
                    <input type="date" class="data_indice" name="data_indice[]">
                    <button type="button" class="btn btn-secondary add_input">Adicionar</button>
                </div>
            </div>

            <!-- HTML para o campo Valor do Índice -->
            <div class="col">
                <label for="valor_indice">Valor do Índice:</label>
                <div id="valor_indice_container">
                    <input type="text" class="valor_indice" name="valor_indice[]">
                    <button type="button" class="btn btn-secondary add_input">Adicionar</button>
                </div>
            </div>

            <!-- HTML para o campo Diferença inicial -->
            <div class="col">
                <label for="diferenca_inicial">Diferença inicial:</label>
                <div id="diferenca_inicial_container">
                    <input type="text" class="diferenca_inicial" name="diferenca_inicial[]">
                    <button type="button" class="btn btn-secondary add_input">Adicionar</button>
                </div>
            </div>

            <!-- HTML para o campo IR -->
            <div class="col">
                <label for="ir">IR:</label>
                <div id="ir_container">
                    <input type="text" class="ir" name="ir[]">
                    <button type="button" class="btn btn-secondary add_input">Adicionar</button>
                </div>
            </div>

            <div class="row">
                <div class="col-12"><br><br><br><br><br><br><br>
                    <input type="submit" value="Enviar" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>

    <hr>

    <!-- Formulário de pesquisa -->
    <form id="form_pesquisa" action="" method="post">
        <input type="text" id="pesquisar_processo" name="pesquisar_processo" placeholder="Digite o processo">
        <button type="submit" name="pesquisar" class="btn btn-primary">Pesquisar</button>
    </form>



    <!-- Exibição dos resultados da pesquisa -->
    <div id="resultados_pesquisa">
        <table class="resultado_pesquisa">
            <thead>
                <tr>
                    <th>Número do Processo Digital</th>
                    <th>Nome do Requerente</th>
                    <th>CPF</th>
                    <th>Reg Requerente</th>
                    <th>Processo Administrativo</th>
                    <th>Citação do Requerente</th>
                    <th>Cálculo do IR</th>
                    <th>Data de Atualização</th>
                    <th>Valor Principal</th>
                    <th>Valor Atualizado</th>
                    <th>Juros Moratórios</th>
                    <th>Custas</th>
                    <th>Honorários</th>
                    <th>Percentual de Honorários</th>
                    <th>CAPEP</th>
                    <th>IPREV</th>
                    <th>Nome do Responsável</th>
                    <th>Cargo do Responsável</th>
                    <th>Data do Responsável</th>
                    <th>Conclusões do Responsável</th>
                    <th>Data de Índice</th>
                    <th>Valor do Índice</th>
                    <th>Diferença Inicial</th>
                    <th>IR</th>
                    <th>Calculo valor atualizado</th>
                    <th></th>
                    <th>Calculo CAPEP</th>
                    <th>Calculo IPREV</th>
                    <th>Calculo IR</th>
                    <th>Total valor indice</th>
                    <th>Total diferenca inicial</th>
                    <th>total IR</th>
                    <th>Total valor atualizado</th>
                    <th>Total calculo CAPEP</th>
                    <th>total calculo IPREV</th>
                    <th>Total calculo IR</th>
                </tr>
            </thead>
            <tbody>



                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST['pesquisar_processo'])) {
                        $pesquisar_processo = $_POST['pesquisar_processo'];

                        // Realizar a consulta no banco de dados com base no número do processo digital
                        $servidor = "localhost";
                        $usuario = "root";
                        $senha = "";
                        $db = "processos_judiciais";

                        $conn = new mysqli($servidor, $usuario, $senha, $db);

                        if ($conn->connect_error) {
                            die("Conexão falhou: " . $conn->connect_error);
                        }

                        $sql_code = "SELECT
                    c.NUMERO_PROCESSO_DIGITAL,
                    MIN(c.NOME_REQUERENTE) AS NOME_REQUERENTE,
                    MIN(c.CPF_REQUERENTE) AS CPF_REQUERENTE,
                    MIN(c.REG_REQUERENTE) AS REG_REQUERENTE,
                    MIN(c.PROCESSO_ADMINISTRATIVO) AS PROCESSO_ADMINISTRATIVO,
                    MIN(c.CITACAO_REQUERENTE) AS CITACAO_REQUERENTE,
                    MIN(c.CALCULO_IR) AS CALCULO_IR,
                    MIN(c.DATA_ATUALIZACAO) AS DATA_ATUALIZACAO,
                    MIN(c.VALOR_PRINCIPAL) AS VALOR_PRINCIPAL,
                    MIN(c.VALOR_ATUALIZADO) AS VALOR_ATUALIZADO,
                    MIN(c.JUROS_MORATORIOS) AS JUROS_MORATORIOS,
                    MIN(c.CUSTAS) AS CUSTAS,
                    MIN(c.HONORARIOS) AS HONORARIOS,
                    MIN(c.HONORARIOS_PERCENTUAL) AS HONORARIOS_PERCENTUAL,
                    MIN(c.CAPEP_VALOR) AS CAPEP_VALOR,
                    MIN(c.IPREV_VALOR) AS IPREV_VALOR,
                    MIN(c.NOME_RESPONSAVEL) AS NOME_RESPONSAVEL,
                    MIN(c.CARGO_RESPONSAVEL) AS CARGO_RESPONSAVEL,
                    MIN(c.DATA_RESPONSAVEL) AS DATA_RESPONSAVEL,
                    MIN(c.CONCLUSOES) AS CONCLUSOES,
                    GROUP_CONCAT(DISTINCT i.DATA_INDICE SEPARATOR '<br>') AS DATA_INDICE,
                    GROUP_CONCAT(DISTINCT i.VALOR_INDICE SEPARATOR '<br>') AS VALOR_INDICE,
                    GROUP_CONCAT(DISTINCT i.DIFERENCA_INICIAL SEPARATOR '<br>') AS DIFERENCA_INICIAL,
                    GROUP_CONCAT(DISTINCT i.IR SEPARATOR '<br>') AS IR,
                    (
                        SELECT GROUP_CONCAT(CAL_VALOR_ATUALIZADO SEPARATOR '<br>')
                        FROM informacoes_financeiras
                        WHERE ID_CLIENTE = c.ID_CLIENTE
                    ) AS CAL_VALOR_ATUALIZADO,
                    (
                        SELECT GROUP_CONCAT(CAL_CAPEP_RETENCAO_LEGAL SEPARATOR '<br>')
                        FROM informacoes_financeiras
                        WHERE ID_CLIENTE = c.ID_CLIENTE
                    ) AS CAL_CAPEP_RETENCAO_LEGAL,
                    (
                        SELECT GROUP_CONCAT(CAL_IPREV_RETENCAO_LEGAL SEPARATOR '<br>')
                        FROM informacoes_financeiras
                        WHERE ID_CLIENTE = c.ID_CLIENTE
                    ) AS CAL_IPREV_RETENCAO_LEGAL,
                    (
                        SELECT GROUP_CONCAT(CAL_IR_RETENCAO_LEGAL SEPARATOR '<br>')
                        FROM informacoes_financeiras
                        WHERE ID_CLIENTE = c.ID_CLIENTE
                    ) AS CAL_IR_RETENCAO_LEGAL
                FROM
                    cadastro_cliente c
                LEFT JOIN
                    informacoes_financeiras i
                ON
                    c.ID_CLIENTE = i.ID_CLIENTE
                WHERE
                    c.NUMERO_PROCESSO_DIGITAL = '$pesquisar_processo'
                GROUP BY
                    c.NUMERO_PROCESSO_DIGITAL";



                        $resultado = $conn->query($sql_code);

                        if ($resultado->num_rows > 0) {
                            // Exibir os resultados em uma tabela
                            while ($row = $resultado->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["NUMERO_PROCESSO_DIGITAL"] . "</td>";
                                echo "<td>" . $row["NOME_REQUERENTE"] . "</td>";
                                echo "<td>" . $row["CPF_REQUERENTE"] . "</td>";
                                echo "<td>" . $row["REG_REQUERENTE"] . "</td>";
                                echo "<td>" . $row["PROCESSO_ADMINISTRATIVO"] . "</td>";
                                echo "<td>" . $row["CITACAO_REQUERENTE"] . "</td>";
                                echo "<td>" . $row["CALCULO_IR"] . "</td>";
                                echo "<td>" . $row["DATA_ATUALIZACAO"] . "</td>";
                                echo "<td>" . $row["VALOR_PRINCIPAL"] . "</td>";
                                echo "<td>" . $row["VALOR_ATUALIZADO"] . "</td>";
                                echo "<td>" . $row["JUROS_MORATORIOS"] . "</td>";
                                echo "<td>" . $row["CUSTAS"] . "</td>";
                                echo "<td>" . $row["HONORARIOS"] . "</td>";
                                echo "<td>" . $row["HONORARIOS_PERCENTUAL"] . "</td>";
                                echo "<td>" . $row["CAPEP_VALOR"] . "</td>";
                                echo "<td>" . $row["IPREV_VALOR"] . "</td>";
                                echo "<td>" . $row["NOME_RESPONSAVEL"] . "</td>";
                                echo "<td>" . $row["CARGO_RESPONSAVEL"] . "</td>";
                                echo "<td>" . $row["DATA_RESPONSAVEL"] . "</td>";
                                echo "<td>" . $row["CONCLUSOES"] . "</td>";
                                echo "<td>" . $row["DATA_INDICE"] . "</td>";
                                echo "<td>" . $row["VALOR_INDICE"] . "</td>";
                                echo "<td>" . $row["DIFERENCA_INICIAL"] . "</td>";
                                echo "<td>" . $row["IR"] . "</td>";


                                // Exibir o valor calculado na coluna "Calculo valor atualizado"
                                echo "<td>" . $row["CAL_VALOR_ATUALIZADO"] . "</td>";
                                // Calcular e exibir o valor do CAPEP
                                if (is_numeric($row["CAL_VALOR_ATUALIZADO"])) {
                                    $calculo_capep = $row["CAL_VALOR_ATUALIZADO"] * 0.3;
                                    echo "<td>" . $calculo_capep . "</td>"; // Exibir o valor calculado na coluna "Calculo CAPEP"
                                } else {
                                    echo "<td></td>"; // Se o valor não for numérico, exibir uma célula vazia
                                }
                                // Verificar se a chave existe no array antes de acessá-la
                                if (isset($row["CAL_CAPEP_RETENCAO_LEGAL"])) {
                                    echo "<td>" . $row["CAL_CAPEP_RETENCAO_LEGAL"] . "</td>";
                                } else {
                                    echo "<td></td>"; // Se a chave não estiver definida, exibe uma célula vazia
                                }
                                // Exibir o valor calculado na coluna "Calculo IPREV"
                                echo "<td>" . $row["CAL_IPREV_RETENCAO_LEGAL"] . "</td>";
                                // Calcular e exibir o valor do IPREV
                                if (is_numeric($row["CAL_IPREV_RETENCAO_LEGAL"])) {
                                    $calculo_iprev = $row["CAL_IPREV_RETENCAO_LEGAL"] * 0.12;
                                    echo "<td>" . $calculo_iprev . "</td>"; // Exibir o valor calculado na coluna "Calculo IPREV"
                                } else {
                                }

                                // Exibir o valor calculado na coluna "Calculo IR"
                                echo "<td>" . $row["CAL_IR_RETENCAO_LEGAL"] . "</td>";
                                // Calcular e exibir o valor do Calculo IR
                                if (is_numeric($row["CAL_IR_RETENCAO_LEGAL"])) {
                                    $calculo_ir = $row["CAL_IR_RETENCAO_LEGAL"] * 0.12;
                                    echo "<td>" . $calculo_ir . "</td>"; // Exibir o valor calculado na coluna "Calculo IPREV"
                                } else {
                                }

                                // Exibir o valor calculado na coluna "Total valor indice"
                                $valor_indice_array = explode('<br>', $row["VALOR_INDICE"]); // Converter a string em um array de valores
                                $total_valor_indice = array_sum($valor_indice_array); // Calcular o total dos valores
                                echo "<td>" . $total_valor_indice . "</td>";



                                // Exibir o valor calculado na coluna "Total diferenca inicial"
                                $diferenca_inicial_array = explode('<br>', $row["DIFERENCA_INICIAL"]); // Converter a string em um array de valores
                                $total_diferenca_inicial = array_sum($diferenca_inicial_array); // Calcular o total dos valores
                                echo "<td>" . $total_diferenca_inicial . "</td>";



                                // Exibir o valor calculado na coluna "Total IR"
                                $diferenca_inicial_array = explode('<br>', $row["IR"]); // Converter a string em um array de valores
                                $total_ir = array_sum($diferenca_inicial_array); // Calcular o total dos valores
                                echo "<td>" . $total_ir . "</td>";


                                // Exibir o valor calculado na coluna "Total valor atualizado"
                                $cal_valor_atualizado_array = explode('<br>', $row["CAL_VALOR_ATUALIZADO"]); // Converter a string em um array de valores
                                $total_cal_valor_atualizado = array_sum($cal_valor_atualizado_array); // Calcular o total dos valores
                                echo "<td>" . $total_cal_valor_atualizado . "</td>";


                                // Exibir o valor calculado na coluna "Total CAL_CAPEP_RETENCAO_LEGAL"
                                $cal_capep_array = explode('<br>', $row["CAL_CAPEP_RETENCAO_LEGAL"]); // Converter a string em um array de valores
                                $total_cal_capep = array_sum($cal_capep_array); // Calcular o total dos valores
                                echo "<td>" . $total_cal_capep . "</td>";


                                // Exibir o valor calculado na coluna "Total CAL_IPREV_RETENCAO_LEGAL"
                                $cal_iprev_array = explode('<br>', $row["CAL_IPREV_RETENCAO_LEGAL"]); // Converter a string em um array de valores
                                $total_cal_iprev = array_sum($cal_iprev_array); // Calcular o total dos valores
                                echo "<td>" . $total_cal_iprev . "</td>";


                                // Exibir o valor calculado na coluna "Total CAL_IR_RETENCAO_LEGAL"
                                $cal_ir_array = explode('<br>', $row["CAL_IR_RETENCAO_LEGAL"]); // Converter a string em um array de valores
                                $total_cal_ir = array_sum($cal_ir_array); // Calcular o total dos valores
                                echo "<td>" . $total_cal_ir . "</td>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            echo "</div>";
                        } else {
                            echo "0 resultados encontrados";
                        }

                        $conn->close();
                    }
                }
                ?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-XeN7T/Ud4vzw4J3EE7wDo2zTPIGLr/W9NK6Pk+y5y2Z+1sVcjsyMJ4h1+iFtzkks" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-WZsFZX1Ir5ZZ8I1uxf2ExWtvh0x6l1Ysab3FRXVxQ+38s4j1aoD6/Ak7crXOJ1c2" crossorigin="anonymous"></script>
    <script src="js/engine.js"></script>
</body>

</html>
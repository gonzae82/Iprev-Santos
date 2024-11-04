<?php
include_once 'db.php';

// Verifica se a variável $_POST está definida e não está vazia
if (isset($_POST) && !empty($_POST)) {

    $processo_id = $mysqli->real_escape_string($_POST['processo_id']);

    $tipo_indice = $mysqli->real_escape_string($_POST['tipo_indice']);
    $data_inicial = $mysqli->real_escape_string($_POST['data_inicial']);
    $indice_inicial = $mysqli->real_escape_string($_POST['indice_inicial']);
    $diferenca_inicial = $mysqli->real_escape_string($_POST['diferenca_inicial']);
    $ir_inicial = $mysqli->real_escape_string($_POST['ir_inicial']);


    // Verifica se alguma variável está vazia
    if (empty($tipo_indice) || empty($data_inicial) || empty($indice_inicial) || empty($diferenca_inicial) || empty($ir_inicial)) {
        header('Location: ../dashboard.php?dir=views&file=processosDemonstrativoList&id=' . $processo_id . '&msgd=Erro ao criar o índice, campos vazios.');
        exit(); // encerra o script para garantir que o redirecionamento ocorra
    }

    //Recupera os dados do Processo para realizar os calculos
    $SQL_PROCESSO = "SELECT * FROM processos where ID_CLIENTE = " . $processo_id;
    $RS_PROCESSO = $mysqli->query($SQL_PROCESSO);
    $processo = [];

    while ($row_processo = $RS_PROCESSO->fetch_assoc()) {
        $processo[] = $row_processo;   
    }

    //Faz os calculos para atualizar a linha
    //Verifica em qual índice será feito o cálculo
    //Verifica se a data inicial é anterior a 12/2021
    $data_inicial_check = substr($data_inicial, 0, 7);
    echo "data_inicial: " . $data_inicial;

    //Calcula IPREV
    if ($data_inicial_check <= '2020-03') {
        $AL_IPREV = 0.12;
    }else
        $AL_IPREV = 0.14;
    
    
    
    if ($data_inicial_check <= '2021-12') {
        //Para uso do Indice
        $DIFERENCA_ATUALIZADA = ($diferenca_inicial/$indice_inicial)*$processo[0]['indice_final']; 
        $CAPEP = $DIFERENCA_ATUALIZADA*0.03;
        $IPREV = $DIFERENCA_ATUALIZADA*$AL_IPREV;
        $IR = ($ir_inicial/$indice_inicial)*$processo[0]['indice_final'];
        $SQL = "INSERT INTO processos_detalhes (processo_id,tipo_indice,data_inicial, indice_inicial, diferenca_inicial, ir_inicial, diferenca_atualizada, capep, iprev, ir) 
            VALUES 
            ('$processo_id','$tipo_indice','$data_inicial', '$indice_inicial', '$diferenca_inicial', '$ir_inicial', '$DIFERENCA_ATUALIZADA','$CAPEP','$IPREV','$IR')";
    } else {
        //Para uso da Selic
        $SELIC_ACUMULADA = $processo[0]['indice_selic_final'] - $indice_inicial;
        $DIFERENCA_ATUALIZADA = $diferenca_inicial+($diferenca_inicial*$SELIC_ACUMULADA/100);
        $CAPEP = $DIFERENCA_ATUALIZADA*0.03;
        $IPREV = $DIFERENCA_ATUALIZADA*$AL_IPREV;
        $IR = $ir_inicial+($ir_inicial*$SELIC_ACUMULADA/100);

        $SQL = "INSERT INTO processos_detalhes (processo_id,tipo_indice,data_inicial, indice_inicial, diferenca_inicial, ir_inicial, diferenca_atualizada,capep,iprev,ir,selic_acumulada) 
            VALUES 
            ('$processo_id','$tipo_indice','$data_inicial', '$indice_inicial', '$diferenca_inicial', '$ir_inicial', '$DIFERENCA_ATUALIZADA','$CAPEP','$IPREV','$IR','$SELIC_ACUMULADA')";
    }

    // Executar a query
    if ($mysqli->query($SQL) === TRUE) {
        // Redirecionar para a página de listagem do demonstrativo        
        header('Location: ../dashboard.php?dir=views&file=processosDemonstrativoList&id= '. $processo_id .'&msg=Registro criado com sucesso.');
    } else {
        // Caso ocorra algum erro        
        header('Location: ../dashboard.php?dir=views&file=processosDemonstrativoList&id= '.$processo_id .'&msgd=Erro ao criar o indíce.');        
    }

}
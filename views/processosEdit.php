<?php
/*
Edita o usuário selecionado e exibe os dados do usuário selecionado.
*/

//Verifica se o id do usuário foi passado pela URL, caso não haja, redireciona para a página de listagem de usuários
if (isset($_GET['id'])) {
  $SQL = "SELECT * FROM processos where ID_CLIENTE = " . $_GET['id'];
  $RS = $mysqli->query($SQL);
  $processo = [];

  while ($row = $RS->fetch_assoc()) {
      $processo[] = $row;   
   }
  $mysqli->close();

  if (count($processo) == 0)
    header('Location: dashboard.php?dir=views&file=processosList');
    
} else
    header('Location: dashboard.php?dir=views&file=processosList');
    
?>


<div class="principal" id="data-page" data-page="processosEdit">
    <div class="col-sm-12 text-left">
        <h1>Editar Processo</h1><!--Titulo da Página-->
        <hr>
    </div>
   
    <div class="col-sm-12 text-left">
        
        <a href="dashboard.php?dir=views&file=processosDemonstrativoList&id=<?php echo $_GET['id'] ?>"class="btn btn-primary">Editar Índices</a>
        <hr>
    </div>
  

    <form action="assets/processaEditprocessos.php" method="post" class="row row-cols-1 row-cols-md-4 g-4">
    <div class="form-group col-md-3">
            <label for="NUMERO_PROCESSO_DIGITAL">Número do processo digital:</label>
            <input type="text" id="NUMERO_PROCESSO_DIGITAL" name="NUMERO_PROCESSO_DIGITAL" class="form-control" value="<?php echo htmlspecialchars($processo[0]['NUMERO_PROCESSO_DIGITAL']); ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="NOME_REQUERENTE">Nome requerente:</label>
            <input type="text" id="NOME_REQUERENTE" name="NOME_REQUERENTE" class="form-control" value="<?php echo htmlspecialchars($processo[0]['NOME_REQUERENTE']); ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="CPF_REQUERENTE">CPF:</label>
            <input type="text" id="CPF_REQUERENTE" name="CPF_REQUERENTE" class="form-control" value="<?php echo htmlspecialchars($processo[0]['CPF_REQUERENTE']); ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="REG_REQUERENTE">Reg requerente:</label>
            <input type="text" id="REG_REQUERENTE" name="REG_REQUERENTE" class="form-control" value="<?php echo htmlspecialchars($processo[0]['REG_REQUERENTE']); ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="PROCESSO_ADMINISTRATIVO">Processo Administrativo:</label>
            <input type="text" id="PROCESSO_ADMINISTRATIVO" name="PROCESSO_ADMINISTRATIVO" class="form-control" value="<?php echo htmlspecialchars($processo[0]['PROCESSO_ADMINISTRATIVO']); ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="CITACAO_REQUERENTE">Citação requerente:</label>
            <input type="date" id="CITACAO_REQUERENTE" name="CITACAO_REQUERENTE" class="form-control" value="<?php echo htmlspecialchars($processo[0]['CITACAO_REQUERENTE']); ?>">
        </div>
        
        <div class="form-group col-md-3">
            <label for="DATA_ATUALIZACAO">Data de Atualização(Índice Final  ):</label>
            <input type="date" id="DATA_ATUALIZACAO" name="DATA_ATUALIZACAO" class="form-control" value="<?php echo htmlspecialchars($processo[0]['DATA_ATUALIZACAO']); ?>">
        </div>

        <div class="form-group col-md-3">
            <label for="DATA_ATUALIZACAO">Selic (Mês Final):</label>
            <input type="date" id="selic_mes_final" name="selic_mes_final" class="form-control" value="<?php echo htmlspecialchars($processo[0]['selic_mes_final']); ?>">
        </div>

        <div class="form-group col-md-12">
            <hr/>
        </div>
        

        <div class="form-group col-md-3">
            <label for="VALOR_PRINCIPAL">Valor Principal:</label>
            <input type="text" id="VALOR_PRINCIPAL" name="VALOR_PRINCIPAL" class="form-control" value="<?php echo htmlspecialchars($processo[0]['VALOR_PRINCIPAL']); ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="VALOR_ATUALIZADO">Valor Atualizado:</label>
            <input type="text" id="VALOR_ATUALIZADO" name="VALOR_ATUALIZADO" class="form-control" value="<?php echo htmlspecialchars($processo[0]['VALOR_ATUALIZADO']); ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="CALCULO_IR">Cálculo do IR:</label>
            <input type="text" id="CALCULO_IR" name="CALCULO_IR" class="form-control" value="<?php echo htmlspecialchars($processo[0]['CALCULO_IR']); ?>">
        </div>

        <div class="form-group col-md-3">
            <label for="CALCULO_IR">Ìndice Final:</label>
            <input type="text" id="indice_final" name="indice_final" class="form-control" value="<?php echo htmlspecialchars($processo[0]['indice_final']); ?>">
        </div>

        <div class="form-group col-md-3">
            <label for="indice_selic_final">Selic Mês Final:</label>
            <input type="text" id="indice_selic_final" name="indice_selic_final" class="form-control" value="<?php echo htmlspecialchars($processo[0]['indice_selic_final']); ?>">
        </div>



        <div class="form-group col-md-12">
            <hr/>
        </div>
        
        <div class="form-group col-md-3">
            <label for="CUSTAS">Custas:</label>
            <input type="text" id="CUSTAS" name="CUSTAS" class="form-control" value="<?php echo htmlspecialchars($processo[0]['CUSTAS']); ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="HONORARIOS">Honorários:</label>
            <input type="text" id="HONORARIOS" name="HONORARIOS" class="form-control" value="<?php echo htmlspecialchars($processo[0]['HONORARIOS']); ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="HONORARIOS_PERCENTUAL">Percentual de Honorários:</label>
            <input type="text" id="HONORARIOS_PERCENTUAL" name="HONORARIOS_PERCENTUAL" class="form-control" value="<?php echo htmlspecialchars($processo[0]['HONORARIOS_PERCENTUAL']); ?>">
        </div>

        <div class="form-group col-md-12">
            <hr/>
        </div>
        

        <div class="form-group col-md-3">
            <label for="CAPEP_VALOR">CAPEP:</label>
            <input type="text" id="CAPEP_VALOR" name="CAPEP_VALOR" class="form-control" value="<?php echo htmlspecialchars($processo[0]['CAPEP_VALOR']); ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="IPREV_VALOR">IPREV:</label>
            <input type="text" id="IPREV_VALOR" name="IPREV_VALOR" class="form-control" value="<?php echo htmlspecialchars($processo[0]['IPREV_VALOR']); ?>">
            
        </div>
        
        <div class="form-group col-md-12">
            <hr/>
        </div>
        

        <div class="form-group col-md-3">
            <label for="NOME_RESPONSAVEL">Nome do Responsável:</label>
            <input type="text" id="NOME_RESPONSAVEL" name="NOME_RESPONSAVEL" class="form-control" value="<?php echo htmlspecialchars($processo[0]['NOME_RESPONSAVEL']); ?>" disabled>
        </div>
        <div class="form-group col-md-3">
            <label for="CARGO_RESPONSAVEL">Cargo do Responsável:</label>
            <input type="text" id="CARGO_RESPONSAVEL" name="CARGO_RESPONSAVEL" class="form-control" value="<?php echo htmlspecialchars($processo[0]['CARGO_RESPONSAVEL']); ?>"disabled>
        </div>
        
        
        <div class="form-group col-md-3">
            <label for="DATA_RESPONSAVEL">Data do Responsável:</label>
            <input type="date" id="DATA_RESPONSAVEL" name="DATA_RESPONSAVEL" class="form-control" value="<?php echo htmlspecialchars($processo[0]['DATA_RESPONSAVEL']); ?>"disabled>
        </div>
        <div class="form-group col-md-12">
            <hr/>
        </div>

        <div class="form-group col-md-12">
            <label for="CONCLUSOES">Conclusões do Responsável:</label>
            <input type="text" id="CONCLUSOES" name="CONCLUSOES" class="form-control" value="<?php echo htmlspecialchars($processo[0]['CONCLUSOES']); ?>">
        </div>
        

        <div class="form-group col-md-12">
            <label for="CONCLUSOES">Conclusões do Responsável:</label>
            <select id="CONCLUSOES" name="CONCLUSOES" class="form-control">
                <option value="0"><?php echo htmlspecialchars($processo[0]['CONCLUSOES']); ?></option>
                <option value="1">1 - O Cálculo das parcelas devidas foram baseadas nas informações do DEPREV juntadas nos autos.</option>
                <option value="2">2 - Os índices de atualização utilizados pelo requerente não conferem com a nova Tabela de Índices divulgada pelo TJSP disponível em <a href="https://api.tjsp.jus.br/Handlers/Handler/FileFetch.ashx?codigo=159495" target="_blank">link</a>.</option>
                <option value="3">3 - Data de citação posterior a EC nº 113/2021. Conforme EC nº 113/2021 a partir de 09/12/2021, NÃO devem ser apurados juros de quaisquer espécies. Somente aplicação da SELIC.</option>
                <option value="4">4 - O desconto da contribuição CAPEP não deve incidir sobre o 13º pagamento. Percentual de 3% sobre o valor atualizado sem considerar os juros.</option>
                <option value="5">5 - A partir de maio/2020 a Contribuição Previdenciária passou a ser de 14%. Percentual de 12/14% sobre o valor atualizado.</option>
                <option value="6">6 - Imposto de Renda calculado pelo DEPREV conforme diferenças mensais apuradas.</option>
            </select>
        </div>

        
        <div class="form-group col-md-12">
        <hr/>
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
        <button type="submit" class="btn btn-warning">Atualizar</button>       
        <a href="dashboard.php?dir=views&file=processosList" class="btn btn-primary">Voltar</a>
        </div>
    </form>
</div>
<div class="principal" id="data-page" data-page="processosAdd">
    <div class="col-sm-12 text-left">
        <h1>Cadastrar novo Processo</h1><!--Titulo da Página-->
        <hr>
    </div>

    <form action="assets/processaAddprocessos.php" method="post" class="row row-cols-1 row-cols-md-4 g-4">
    <div class="col-sm-12 text-left">
        <h4><b>Dados do Processo</b></h4>
        <hr/>        
    </div>
        <div class="form-group col-md-3">
                <label for="NUMERO_PROCESSO_DIGITAL">Número do processo digital:</label>
                <input type="text" id="NUMERO_PROCESSO_DIGITAL" name="NUMERO_PROCESSO_DIGITAL" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="NOME_REQUERENTE">Nome requerente:</label>
            <input type="text" id="NOME_REQUERENTE" name="NOME_REQUERENTE" class="form-control" >
        </div>
        <div class="form-group col-md-3">
            <label for="CPF_REQUERENTE">CPF:</label>
            <input type="text" id="CPF_REQUERENTE" name="CPF_REQUERENTE" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="REG_REQUERENTE">Reg requerente:</label>
            <input type="text" id="REG_REQUERENTE" name="REG_REQUERENTE" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="PROCESSO_ADMINISTRATIVO">Processo Administrativo:</label>
            <input type="text" id="PROCESSO_ADMINISTRATIVO" name="PROCESSO_ADMINISTRATIVO" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="CITACAO_REQUERENTE">Citação requerente:</label>
            <input type="date" id="CITACAO_REQUERENTE" name="CITACAO_REQUERENTE" class="form-control">
        </div>
        
        <div class="form-group col-md-3">
            <label for="DATA_ATUALIZACAO">Data de Atualização(Índice Final):</label>
            <input type="date" id="DATA_ATUALIZACAO" name="DATA_ATUALIZACAO" class="form-control">
        </div>

        <div class="form-group col-md-3">
            <label for="DATA_ATUALIZACAO">Selic (Mês Final):</label>
            <input type="date" id="selic_mes_final" name="selic_mes_final" class="form-control">
        </div>

        <div class="form-group col-md-12">
            <hr/>
        </div>
        
        <div class="col-sm-12 text-left">
            <h4><b>Dados dos Financeiros</b></h4>
            <hr/>        
        </div>
    
        <div class="form-group col-md-3">
            <label for="VALOR_PRINCIPAL">Valor Principal:</label>
            <input type="text" id="VALOR_PRINCIPAL" name="VALOR_PRINCIPAL" class="form-control" >
        </div>
        <div class="form-group col-md-3">
            <label for="VALOR_ATUALIZADO">Valor Atualizado:</label>
            <input type="text" id="VALOR_ATUALIZADO" name="VALOR_ATUALIZADO" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="CALCULO_IR">Cálculo do IR:</label>
            <input type="text" id="CALCULO_IR" name="CALCULO_IR" class="form-control">
        </div>

        <div class="form-group col-md-3">
            <label for="CALCULO_IR">Ìndice Final:</label>
            <input type="text" id="indice_final" name="indice_final" class="form-control">
        </div>

        <div class="form-group col-md-3">
            <label for="indice_selic_final">Selic Mês Final:</label>
            <input type="text" id="indice_selic_final" name="indice_selic_final" class="form-control">
        </div>
        
        <div class="form-group col-md-12">
            <hr/>
        </div>
        
        <div class="col-sm-12 text-left">
            <h4><b>Custos Advogado</b></h4>
            <hr/>        
        </div>

        <div class="form-group col-md-3">
            <label for="CUSTAS">Custas:</label>
            <input type="text" id="CUSTAS" name="CUSTAS" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="HONORARIOS">Honorários:</label>
            <input type="text" id="HONORARIOS" name="HONORARIOS" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="HONORARIOS_PERCENTUAL">Percentual de Honorários:</label>
            <input type="text" id="HONORARIOS_PERCENTUAL" name="HONORARIOS_PERCENTUAL" class="form-control">
        </div>

        <div class="form-group col-md-12">
            <hr/>
        </div>
        
        <div class="col-sm-12 text-left">
            <h4><b>Custos IPREV</b></h4>
            <hr/>        
        </div>
        <div class="form-group col-md-3">
            <label for="CAPEP_VALOR">CAPEP:</label>
            <input type="text" id="CAPEP_VALOR" name="CAPEP_VALOR" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="IPREV_VALOR">IPREV:</label>
            <input type="text" id="IPREV_VALOR" name="IPREV_VALOR" class="form-control">            
        </div>        
        
        <div class="form-group col-md-12">
        <hr/>   
        <input type="submit" value="Enviar" class="btn btn-success">
            <a href="dashboard.php?dir=views&file=processosList" class="btn btn-primary">Voltar</a>
        </div>
    </form>
</div>

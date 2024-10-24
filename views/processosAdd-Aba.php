<div class="principal">
    <div class="col-sm-12 text-left">
        <h1>Cadastrar novo Processo</h1><!--Titulo da Página-->
        <hr>
    </div>

    <!-- Abas -->
    <div class="tab-container">
        <div class="tab" onclick="openTab(event, 'Tab1')">Informações Básicas</div>        
        <div class="tab" onclick="openTab(event, 'Tab2')">Índices</div>
    </div>    
    <form action="assets/processaAddprocessos.php" method="post" class="row row-cols-1 row-cols-md-4 g-4">
    <!-- Conteúdo da Aba 1 -->
    <div id="Tab1" class="tab-content">
        <h3>Informações Básicas</h3>
        
        <div class="form-group col-md-3">
            <label for="NUMERO_PROCESSO_DIGITAL">Número do processo digital:</label>
            <input type="text" id="NUMERO_PROCESSO_DIGITAL" name="NUMERO_PROCESSO_DIGITAL" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="NOME_REQUERENTE">Nome requerente:</label>
            <input type="text" id="NOME_REQUERENTE" name="NOME_REQUERENTE" class="form-control">
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
            <input type="text" id="CITACAO_REQUERENTE" name="CITACAO_REQUERENTE" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="CALCULO_IR">Cálculo do IR:</label>
            <input type="text" id="CALCULO_IR" name="CALCULO_IR" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="DATA_ATUALIZACAO">Data de Atualização:</label>
            <input type="date" id="DATA_ATUALIZACAO" name="DATA_ATUALIZACAO" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="VALOR_PRINCIPAL">Valor Principal:</label>
            <input type="text" id="VALOR_PRINCIPAL" name="VALOR_PRINCIPAL" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="VALOR_ATUALIZADO">Valor Atualizado:</label>
            <input type="text" id="VALOR_ATUALIZADO" name="VALOR_ATUALIZADO" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="JUROS_MORATORIOS">Juros Moratórios:</label>
            <input type="text" id="JUROS_MORATORIOS" name="JUROS_MORATORIOS" class="form-control">
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
        <div class="form-group col-md-3">
            <label for="CAPEP_VALOR">CAPEP:</label>
            <input type="text" id="CAPEP_VALOR" name="CAPEP_VALOR" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="IPREV_VALOR">IPREV:</label>
            <input type="text" id="IPREV_VALOR" name="IPREV_VALOR" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="NOME_RESPONSAVEL">Nome do Responsável:</label>
            <input type="text" id="NOME_RESPONSAVEL" name="NOME_RESPONSAVEL" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="CARGO_RESPONSAVEL">Cargo do Responsável:</label>
            <input type="text" id="CARGO_RESPONSAVEL" name="CARGO_RESPONSAVEL" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="DATA_RESPONSAVEL">Data do Responsável:</label>
            <input type="date" id="DATA_RESPONSAVEL" name="DATA_RESPONSAVEL" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="CONCLUSOES">Conclusões do Responsável:</label>
            <input type="text" id="CONCLUSOES" name="CONCLUSOES" class="form-control">
        </div>

    </div>

    <!-- Conteúdo da Aba 2 -->
    <div id="Tab2" class="tab-content">
        <h3>Índices</h3>        
            <div id="linha-container">
                <div id="linha" class="linha">
                    <div class="form-group col-md-3">
                        <label for="data_indice">Data de Início:</label>
                        <div id="data_indice_container">
                            <input type="date" class="data_indice form-control" name="data_indice[]">                        
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="valor_indice">Valor do Índice:</label>
                        <div id="valor_indice_container">
                            <input type="text" class="valor_indice form-control" name="valor_indice[]">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="diferenca_inicial">Diferença inicial:</label>
                        <div id="diferenca_inicial_container">
                            <input type="text" class="diferenca_inicial form-control" name="diferenca_inicial[]">                        
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="ir">IR:</label>
                        <div id="ir_container">
                            <input type="text" class="ir form-control" name="ir[]">                        
                        </div>
                    </div>
                </div>
                <hr/>
            </div>
            <hr/>
        <!-- Botão para adicionar nova linha -->
        <button type="button" class="btn btn-primary" id="add_linha">Adicionar Linha</button>
        <hr/>
        <div class="form-group col-md-12">
            <input type="submit" value="Enviar" class="btn btn-success">
            <a href="dashboard.php?dir=views&file=processosList" class="btn btn-primary">Voltar</a>
        </div>
        </div>
    </form>

    <script>
        // Função para abrir as abas
        function openTab(evt, tabId) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tab");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabId).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Exibe a primeira aba por padrão
        document.getElementsByClassName("tab")[0].click();
    </script>

    </div>
--
-- Banco de dados: `processos_judiciais`
--
CREATE DATABASE IF NOT EXISTS `processos_judiciais` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `processos_judiciais`;
-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_cliente`
--

CREATE TABLE `cadastro_cliente` (
  `ID_CLIENTE` int(11) NOT NULL,
  `NUMERO_PROCESSO_DIGITAL` int(11) DEFAULT NULL,
  `NOME_REQUERENTE` varchar(45) DEFAULT NULL,
  `CPF_REQUERENTE` varchar(45) DEFAULT NULL,
  `REG_REQUERENTE` varchar(45) DEFAULT NULL,
  `PROCESSO_ADMINISTRATIVO` varchar(45) DEFAULT NULL,
  `CITACAO_REQUERENTE` varchar(45) DEFAULT NULL,
  `CALCULO_IR` varchar(45) DEFAULT NULL,
  `DATA_ATUALIZACAO` date DEFAULT NULL,
  `VALOR_PRINCIPAL` varchar(45) DEFAULT NULL,
  `VALOR_ATUALIZADO` varchar(45) DEFAULT NULL,
  `JUROS_MORATORIOS` varchar(45) DEFAULT NULL,
  `CUSTAS` varchar(45) DEFAULT NULL,
  `HONORARIOS` varchar(45) DEFAULT NULL,
  `HONORARIOS_PERCENTUAL` varchar(45) DEFAULT NULL,
  `CAPEP_VALOR` varchar(45) DEFAULT NULL,
  `IPREV_VALOR` varchar(45) DEFAULT NULL,
  `NOME_RESPONSAVEL` varchar(45) DEFAULT NULL,
  `CARGO_RESPONSAVEL` varchar(45) DEFAULT NULL,
  `DATA_RESPONSAVEL` varchar(45) DEFAULT NULL,
  `CONCLUSOES` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadastro_cliente`
--

INSERT INTO `cadastro_cliente` (`ID_CLIENTE`, `NUMERO_PROCESSO_DIGITAL`, `NOME_REQUERENTE`, `CPF_REQUERENTE`, `REG_REQUERENTE`, `PROCESSO_ADMINISTRATIVO`, `CITACAO_REQUERENTE`, `CALCULO_IR`, `DATA_ATUALIZACAO`, `VALOR_PRINCIPAL`, `VALOR_ATUALIZADO`, `JUROS_MORATORIOS`, `CUSTAS`, `HONORARIOS`, `HONORARIOS_PERCENTUAL`, `CAPEP_VALOR`, `IPREV_VALOR`, `NOME_RESPONSAVEL`, `CARGO_RESPONSAVEL`, `DATA_RESPONSAVEL`, `CONCLUSOES`) VALUES
(1, 1, 'Rafael Fachini Moratelli', '02062378980', '40', '25', '20/02/2024', '2220', '2024-06-05', '20', '40', '20', '20', '20', '10', '20', '20', 'Rafael Fachini Moratelli', 'Contador', '', 'conclusão'),
(2, 2, 'Luciane Oliveira Amaral Moratelli', '27100069874', '25', '2525', '20/02/2024', '200', '2024-05-14', '20', '25', '2', '2', '0', '0', '25', '30', 'Luciane Oliveira Amaral Moratelli', 'Contadora', '2024-06-05', 'Concluido');

-- --------------------------------------------------------

--
-- Estrutura para tabela `informacoes_financeiras`
--

CREATE TABLE `informacoes_financeiras` (
  `ID_INFORMACAO` int(11) NOT NULL,
  `ID_CLIENTE` int(11) DEFAULT NULL,
  `DATA_INDICE` date DEFAULT NULL,
  `VALOR_INDICE` int(11) DEFAULT NULL,
  `DIFERENCA_INICIAL` int(11) DEFAULT NULL,
  `IR` int(11) DEFAULT NULL,
  `CAL_VALOR_ATUALIZADO` int(11) DEFAULT NULL,
  `CAL_CAPEP_RETENCAO_LEGAL` decimal(11,0) DEFAULT NULL,
  `CAL_IPREV_RETENCAO_LEGAL` decimal(11,0) DEFAULT NULL,
  `CAL_IR_RETENCAO_LEGAL` decimal(11,0) DEFAULT NULL,
  `total_valor_indice` decimal(11,0) DEFAULT NULL,
  `total_diferenca_incial` decimal(11,0) DEFAULT NULL,
  `total_ir` decimal(11,0) DEFAULT NULL,
  `total_cal_valor_atualizado` decimal(11,0) DEFAULT NULL,
  `total_cal_capep_retencao_legal` decimal(11,0) DEFAULT NULL,
  `total_cal_iprev_retencao_legal` decimal(11,0) DEFAULT NULL,
  `total_cal_ir_retencao_legal` decimal(11,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cadastro_cliente`
--
ALTER TABLE `cadastro_cliente`
  ADD PRIMARY KEY (`ID_CLIENTE`);

--
-- Índices de tabela `informacoes_financeiras`
--
ALTER TABLE `informacoes_financeiras`
  ADD PRIMARY KEY (`ID_INFORMACAO`);

--
-- AUTO_INCREMENT de tabela `cadastro_cliente`
--
ALTER TABLE `cadastro_cliente`
  MODIFY `ID_CLIENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `informacoes_financeiras`
--
ALTER TABLE `informacoes_financeiras`
  MODIFY `ID_INFORMACAO` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
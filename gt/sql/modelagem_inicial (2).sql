
--
-- Banco de dados: `db_gt`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_log`
--

CREATE TABLE `tb_log` (
  `id_log` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `ip` varchar(25) DEFAULT NULL,
  `log` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_rodadas`
--

CREATE TABLE `tb_rodadas` (
  `id` int(11) NOT NULL,
  `id_torneio` int(11) NOT NULL,
  `id_time_casa` int(11) NOT NULL,
  `id_time_visitante` int(11) NOT NULL,
  `gols_casa` int(11) NOT NULL,
  `gols_visitantes` int(11) NOT NULL,
  `c_amarelos_casa` int(11) NOT NULL,
  `c_vermelho_casa` int(11) NOT NULL,
  `c_amarelos_visitante` int(11) NOT NULL,
  `c_vermelho_visitante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_time`
--

CREATE TABLE `tb_time` (
  `id_time` int(11) NOT NULL,
  `escudo` varchar(200) DEFAULT NULL,
  `ativo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_tipo_torneio`
--

CREATE TABLE `tb_tipo_torneio` (
  `id_tipo` int(11) NOT NULL,
  `descricao` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tb_tipo_torneio`
--

INSERT INTO `tb_tipo_torneio` (`id_tipo`, `descricao`) VALUES
(1, 'mata-mata'),
(2, 'liga');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_torneio`
--

CREATE TABLE `tb_torneio` (
  `id_torneio` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `tipo` int(11) NOT NULL,
  `n_rodadas` int(11) NOT NULL,
  `ativo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_torneio_times`
--

CREATE TABLE `tb_torneio_times` (
  `id` int(11) NOT NULL,
  `id_time` int(11) NOT NULL,
  `id_torneio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `ativo` int(11) DEFAULT NULL,
  `username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_user`, `nome`, `sobrenome`, `email`, `senha`, `ativo`, `username`) VALUES
(1, 'joao', 'da silva', 'joao@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'joao.silva');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `usuario` (`usuario`);

--
-- Índices de tabela `tb_rodadas`
--
ALTER TABLE `tb_rodadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_torneio` (`id_torneio`),
  ADD KEY `id_time_casa` (`id_time_casa`),
  ADD KEY `id_time_visitante` (`id_time_visitante`);

--
-- Índices de tabela `tb_time`
--
ALTER TABLE `tb_time`
  ADD PRIMARY KEY (`id_time`);

--
-- Índices de tabela `tb_tipo_torneio`
--
ALTER TABLE `tb_tipo_torneio`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Índices de tabela `tb_torneio`
--
ALTER TABLE `tb_torneio`
  ADD PRIMARY KEY (`id_torneio`),
  ADD KEY `tipo` (`tipo`);

--
-- Índices de tabela `tb_torneio_times`
--
ALTER TABLE `tb_torneio_times`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_time` (`id_time`),
  ADD KEY `id_torneio` (`id_torneio`);

--
-- Índices de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tb_rodadas`
--
ALTER TABLE `tb_rodadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tb_time`
--
ALTER TABLE `tb_time`
  MODIFY `id_time` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tb_tipo_torneio`
--
ALTER TABLE `tb_tipo_torneio`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `tb_torneio`
--
ALTER TABLE `tb_torneio`
  MODIFY `id_torneio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tb_torneio_times`
--
ALTER TABLE `tb_torneio_times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `tb_log`
--
ALTER TABLE `tb_log`
  ADD CONSTRAINT `tb_log_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `tb_usuarios` (`id_user`);

--
-- Restrições para tabelas `tb_rodadas`
--
ALTER TABLE `tb_rodadas`
  ADD CONSTRAINT `tb_rodadas_ibfk_1` FOREIGN KEY (`id_torneio`) REFERENCES `tb_torneio` (`id_torneio`),
  ADD CONSTRAINT `tb_rodadas_ibfk_2` FOREIGN KEY (`id_time_casa`) REFERENCES `tb_time` (`id_time`),
  ADD CONSTRAINT `tb_rodadas_ibfk_3` FOREIGN KEY (`id_time_visitante`) REFERENCES `tb_time` (`id_time`);

--
-- Restrições para tabelas `tb_torneio`
--
ALTER TABLE `tb_torneio`
  ADD CONSTRAINT `tb_torneio_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tb_tipo_torneio` (`id_tipo`);

--
-- Restrições para tabelas `tb_torneio_times`
--
ALTER TABLE `tb_torneio_times`
  ADD CONSTRAINT `tb_torneio_times_ibfk_1` FOREIGN KEY (`id_time`) REFERENCES `tb_time` (`id_time`),
  ADD CONSTRAINT `tb_torneio_times_ibfk_2` FOREIGN KEY (`id_torneio`) REFERENCES `tb_torneio` (`id_torneio`);
COMMIT;


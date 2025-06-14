-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/06/2025 às 01:29
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cql_ifpe`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alertas`
--

CREATE TABLE `alertas` (
  `id_alerta` int(11) NOT NULL,
  `id_vaca` int(11) DEFAULT NULL,
  `mensagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `historico_vacas`
--

CREATE TABLE `historico_vacas` (
  `id_historico` int(11) NOT NULL,
  `id_vaca` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `producao_leite` decimal(5,2) DEFAULT NULL,
  `teste_mastite` enum('positivo','negativo') DEFAULT NULL,
  `tratamento` varchar(255) DEFAULT NULL,
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `producao_leite`
--

CREATE TABLE `producao_leite` (
  `id_producao` int(11) NOT NULL,
  `id_vaca` int(11) NOT NULL,
  `quantidade` decimal(5,2) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `producao_leite`
--

INSERT INTO `producao_leite` (`id_producao`, `id_vaca`, `quantidade`, `data`) VALUES
(1, 1, 7.00, '2025-02-10'),
(2, 3, 8.00, '2025-02-10'),
(3, 6, 8.00, '2025-02-10'),
(4, 4, 8.00, '2025-02-10'),
(5, 7, 10.00, '2025-02-10'),
(6, 1, 9.00, '2025-02-11'),
(7, 2, 6.00, '2025-02-11'),
(8, 6, 11.00, '2025-02-11'),
(9, 4, 7.00, '2025-02-11'),
(10, 7, 12.00, '2025-02-11'),
(11, 1, 8.00, '2025-02-12'),
(12, 2, 6.00, '2025-02-12'),
(13, 6, 10.00, '2025-02-12'),
(14, 4, 9.00, '2025-02-12'),
(15, 7, 11.00, '2025-02-12'),
(16, 1, 7.00, '2025-02-13'),
(17, 2, 9.00, '2025-02-13'),
(18, 6, 12.00, '2025-02-13'),
(19, 4, 6.00, '2025-02-13'),
(20, 7, 13.00, '2025-02-13'),
(21, 1, 8.00, '2025-02-14'),
(22, 2, 9.00, '2025-02-14'),
(23, 6, 10.00, '2025-02-14'),
(24, 4, 7.00, '2025-02-14'),
(25, 7, 13.00, '2025-02-14'),
(26, 2, 12.00, '2025-03-12');

--
-- Acionadores `producao_leite`
--
DELIMITER $$
CREATE TRIGGER `trg_after_insert_producao_leite` AFTER INSERT ON `producao_leite` FOR EACH ROW BEGIN
  INSERT INTO historico_vacas (id_vaca, data, producao_leite)
  VALUES (NEW.id_vaca, NEW.data, NEW.quantidade);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `recuperacao_senha`
--

CREATE TABLE `recuperacao_senha` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `data_expiracao` datetime NOT NULL,
  `usado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `teste_mastite`
--

CREATE TABLE `teste_mastite` (
  `id_teste` int(11) NOT NULL,
  `id_vaca` int(11) NOT NULL,
  `data` date NOT NULL,
  `resultado` enum('positivo','negativo') NOT NULL,
  `quantas_cruzes` int(11) NOT NULL DEFAULT 0,
  `ubere` varchar(50) DEFAULT NULL,
  `tratamento` varchar(100) DEFAULT NULL,
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `teste_mastite`
--

INSERT INTO `teste_mastite` (`id_teste`, `id_vaca`, `data`, `resultado`, `quantas_cruzes`, `ubere`, `tratamento`, `observacoes`) VALUES
(1, 1, '2025-03-11', 'positivo', 1, 'P.E', 'Nenhum', ''),
(2, 2, '2025-03-11', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(3, 3, '2025-03-11', 'positivo', 3, 'P.D P.E', 'Nenhum', ''),
(4, 4, '2025-03-11', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(5, 5, '2025-03-11', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(6, 6, '2025-03-11', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(7, 7, '2025-03-11', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(8, 1, '2025-03-14', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(9, 2, '2025-03-14', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(10, 3, '2025-03-14', 'positivo', 2, 'P.D A.D', 'Nenhum', ''),
(11, 4, '2025-03-14', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(12, 5, '2025-03-14', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(13, 6, '2025-03-14', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(14, 7, '2025-03-14', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(15, 1, '2025-03-18', 'positivo', 2, 'P.E A.D', 'Nenhum', ''),
(16, 2, '2025-03-18', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(17, 3, '2025-03-18', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(18, 4, '2025-03-18', 'positivo', 2, 'A.D P.D', 'Nenhum', ''),
(19, 5, '2025-03-18', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(20, 6, '2025-03-18', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(21, 7, '2025-03-18', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(22, 1, '2025-03-25', 'positivo', 4, 'A.D P.D P.E A.E', 'Nenhum', ''),
(23, 2, '2025-03-25', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(24, 3, '2025-03-25', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(25, 4, '2025-03-25', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(26, 5, '2025-03-25', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(27, 6, '2025-03-25', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(28, 7, '2025-03-25', 'negativo', 0, 'Especificado', 'Nenhum', '');

--
-- Acionadores `teste_mastite`
--
DELIMITER $$
CREATE TRIGGER `trg_after_insert_teste_mastite` AFTER INSERT ON `teste_mastite` FOR EACH ROW BEGIN
  INSERT INTO historico_vacas (id_vaca, data, teste_mastite, tratamento, observacoes)
  VALUES (NEW.id_vaca, NEW.data, NEW.resultado, NEW.tratamento, NEW.observacoes);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo_usuario` enum('aluno','professor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`, `tipo_usuario`) VALUES
(1, 'Cecília Helena', 'chsna@discente.ifpe.edu.br', '123senha', 'aluno'),
(2, 'Isabela de França', 'ifl1@discente.ifpe.edu.br', '3467tobias', 'aluno'),
(3, 'Vitória Melo', 'mvms4@discente.ifpe.edu.br', 'bobflor666', 'professor'),
(4, 'Alexia Alves', 'ajdsa@discente.ifpe.edu.br', 'granger1474', 'aluno');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vacas`
--

CREATE TABLE `vacas` (
  `id_vaca` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descarte` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vacas`
--

INSERT INTO `vacas` (`id_vaca`, `nome`, `descarte`) VALUES
(1, 'Alicate', 0),
(2, 'Chuvisco', 0),
(3, 'Chichita', 0),
(4, 'Muriçoca', 0),
(5, 'Morena', 0),
(6, 'Mococa', 0),
(7, 'Tanajura', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alertas`
--
ALTER TABLE `alertas`
  ADD PRIMARY KEY (`id_alerta`),
  ADD KEY `id_vaca` (`id_vaca`);

--
-- Índices de tabela `historico_vacas`
--
ALTER TABLE `historico_vacas`
  ADD PRIMARY KEY (`id_historico`),
  ADD KEY `id_vaca` (`id_vaca`);

--
-- Índices de tabela `producao_leite`
--
ALTER TABLE `producao_leite`
  ADD PRIMARY KEY (`id_producao`),
  ADD KEY `id_vaca` (`id_vaca`);

--
-- Índices de tabela `recuperacao_senha`
--
ALTER TABLE `recuperacao_senha`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `teste_mastite`
--
ALTER TABLE `teste_mastite`
  ADD PRIMARY KEY (`id_teste`),
  ADD KEY `id_vaca` (`id_vaca`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `vacas`
--
ALTER TABLE `vacas`
  ADD PRIMARY KEY (`id_vaca`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alertas`
--
ALTER TABLE `alertas`
  MODIFY `id_alerta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `historico_vacas`
--
ALTER TABLE `historico_vacas`
  MODIFY `id_historico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `producao_leite`
--
ALTER TABLE `producao_leite`
  MODIFY `id_producao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `recuperacao_senha`
--
ALTER TABLE `recuperacao_senha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `teste_mastite`
--
ALTER TABLE `teste_mastite`
  MODIFY `id_teste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `vacas`
--
ALTER TABLE `vacas`
  MODIFY `id_vaca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `alertas`
--
ALTER TABLE `alertas`
  ADD CONSTRAINT `alertas_ibfk_1` FOREIGN KEY (`id_vaca`) REFERENCES `vacas` (`id_vaca`);

--
-- Restrições para tabelas `historico_vacas`
--
ALTER TABLE `historico_vacas`
  ADD CONSTRAINT `historico_vacas_ibfk_1` FOREIGN KEY (`id_vaca`) REFERENCES `vacas` (`id_vaca`);

--
-- Restrições para tabelas `producao_leite`
--
ALTER TABLE `producao_leite`
  ADD CONSTRAINT `producao_leite_ibfk_1` FOREIGN KEY (`id_vaca`) REFERENCES `vacas` (`id_vaca`);

--
-- Restrições para tabelas `recuperacao_senha`
--
ALTER TABLE `recuperacao_senha`
  ADD CONSTRAINT `recuperacao_senha_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Restrições para tabelas `teste_mastite`
--
ALTER TABLE `teste_mastite`
  ADD CONSTRAINT `teste_mastite_ibfk_1` FOREIGN KEY (`id_vaca`) REFERENCES `vacas` (`id_vaca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

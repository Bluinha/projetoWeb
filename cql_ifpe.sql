-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/06/2025 às 01:49
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
  `observacoes` text DEFAULT NULL,
  `acao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `historico_vacas`
--

INSERT INTO `historico_vacas` (`id_historico`, `id_vaca`, `data`, `producao_leite`, `teste_mastite`, `tratamento`, `observacoes`, `acao`) VALUES
(1, NULL, '2025-06-21', NULL, NULL, NULL, 'Vaca \"lindinha\" cadastrada com descarte = 0', 'Inserção'),
(2, NULL, '2025-06-21', NULL, NULL, NULL, 'Vaca \"vaquinha\" cadastrada com descarte = 0', 'Inserção'),
(3, 11, '2025-06-21', NULL, NULL, NULL, 'Vaca \"vaquinha\" cadastrada com descarte = 0', 'Inserção');

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
(53, 1, 7.00, '2025-02-10'),
(54, 3, 8.00, '2025-02-10'),
(55, 6, 8.00, '2025-02-10'),
(56, 4, 8.00, '2025-02-10'),
(57, 7, 10.00, '2025-02-10'),
(58, 1, 9.00, '2025-02-11'),
(59, 2, 6.00, '2025-02-11'),
(60, 6, 11.00, '2025-02-11'),
(61, 4, 7.00, '2025-02-11'),
(62, 7, 12.00, '2025-02-11'),
(63, 1, 8.00, '2025-02-12'),
(64, 2, 6.00, '2025-02-12'),
(65, 6, 10.00, '2025-02-12'),
(66, 4, 9.00, '2025-02-12'),
(67, 7, 11.00, '2025-02-12'),
(68, 1, 7.00, '2025-02-13'),
(69, 2, 9.00, '2025-02-13'),
(70, 6, 12.00, '2025-02-13'),
(71, 4, 6.00, '2025-02-13'),
(72, 7, 13.00, '2025-02-13'),
(73, 1, 8.00, '2025-02-14'),
(74, 2, 9.00, '2025-02-14'),
(75, 6, 10.00, '2025-02-14'),
(76, 4, 7.00, '2025-02-14'),
(77, 7, 13.00, '2025-02-14'),
(78, 2, 12.00, '2025-03-12');

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
  `id_recuperação` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `data_expiracao` datetime NOT NULL,
  `usado` tinyint(1) NOT NULL DEFAULT 0
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
  `quantas_cruzes` tinyint(3) NOT NULL DEFAULT 0,
  `ubere` varchar(50) DEFAULT NULL,
  `tratamento` varchar(100) DEFAULT NULL,
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `teste_mastite`
--

INSERT INTO `teste_mastite` (`id_teste`, `id_vaca`, `data`, `resultado`, `quantas_cruzes`, `ubere`, `tratamento`, `observacoes`) VALUES
(57, 1, '2025-03-11', 'positivo', 1, 'P.E', 'Nenhum', ''),
(58, 2, '2025-03-11', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(59, 3, '2025-03-11', 'positivo', 3, 'P.D P.E', 'Nenhum', ''),
(60, 4, '2025-03-11', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(61, 5, '2025-03-11', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(62, 6, '2025-03-11', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(63, 7, '2025-03-11', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(64, 1, '2025-03-14', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(65, 2, '2025-03-14', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(66, 3, '2025-03-14', 'positivo', 2, 'P.D A.D', 'Nenhum', ''),
(67, 4, '2025-03-14', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(68, 5, '2025-03-14', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(69, 6, '2025-03-14', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(70, 7, '2025-03-14', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(71, 1, '2025-03-18', 'positivo', 2, 'P.E A.D', 'Nenhum', ''),
(72, 2, '2025-03-18', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(73, 3, '2025-03-18', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(74, 4, '2025-03-18', 'positivo', 2, 'A.D P.D', 'Nenhum', ''),
(75, 5, '2025-03-18', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(76, 6, '2025-03-18', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(77, 7, '2025-03-18', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(78, 1, '2025-03-25', 'positivo', 4, 'A.D P.D P.E A.E', 'Nenhum', ''),
(79, 2, '2025-03-25', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(80, 3, '2025-03-25', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(81, 4, '2025-03-25', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(82, 5, '2025-03-25', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(83, 6, '2025-03-25', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(84, 7, '2025-03-25', 'negativo', 0, 'Especificado', 'Nenhum', '');

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
(7, 'Tanajura', 0),
(11, 'vaquinha', 0);

--
-- Acionadores `vacas`
--
DELIMITER $$
CREATE TRIGGER `trg_after_insert_vacas` AFTER INSERT ON `vacas` FOR EACH ROW BEGIN
  INSERT INTO historico_vacas (id_vaca, data, acao, observacoes)
  VALUES (NEW.id_vaca, NOW(), 'Inserção', CONCAT('Vaca "', NEW.nome, '" cadastrada com descarte = ', NEW.descarte));
END
$$
DELIMITER ;

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
  ADD PRIMARY KEY (`id_recuperação`),
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
  MODIFY `id_historico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `producao_leite`
--
ALTER TABLE `producao_leite`
  MODIFY `id_producao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de tabela `recuperacao_senha`
--
ALTER TABLE `recuperacao_senha`
  MODIFY `id_recuperação` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `teste_mastite`
--
ALTER TABLE `teste_mastite`
  MODIFY `id_teste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `vacas`
--
ALTER TABLE `vacas`
  MODIFY `id_vaca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `alertas`
--
ALTER TABLE `alertas`
  ADD CONSTRAINT `alertas_ibfk_1` FOREIGN KEY (`id_vaca`) REFERENCES `vacas` (`id_vaca`) ON DELETE SET NULL;

--
-- Restrições para tabelas `historico_vacas`
--
ALTER TABLE `historico_vacas`
  ADD CONSTRAINT `historico_vacas_ibfk_1` FOREIGN KEY (`id_vaca`) REFERENCES `vacas` (`id_vaca`) ON DELETE SET NULL;

--
-- Restrições para tabelas `producao_leite`
--
ALTER TABLE `producao_leite`
  ADD CONSTRAINT `producao_leite_ibfk_1` FOREIGN KEY (`id_vaca`) REFERENCES `vacas` (`id_vaca`) ON DELETE CASCADE;

--
-- Restrições para tabelas `recuperacao_senha`
--
ALTER TABLE `recuperacao_senha`
  ADD CONSTRAINT `recuperacao_senha_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Restrições para tabelas `teste_mastite`
--
ALTER TABLE `teste_mastite`
  ADD CONSTRAINT `teste_mastite_ibfk_1` FOREIGN KEY (`id_vaca`) REFERENCES `vacas` (`id_vaca`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/06/2025 às 22:51
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cql_ifpe1`
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
(3, 11, '2025-06-21', NULL, NULL, NULL, 'Vaca \"vaquinha\" cadastrada com descarte = 0', 'Inserção'),
(4, 1, '2025-02-10', 7.00, NULL, NULL, NULL, NULL),
(5, 3, '2025-02-10', 8.00, NULL, NULL, NULL, NULL),
(6, 6, '2025-02-10', 8.00, NULL, NULL, NULL, NULL),
(7, 4, '2025-02-10', 8.00, NULL, NULL, NULL, NULL),
(8, 7, '2025-02-10', 10.00, NULL, NULL, NULL, NULL),
(9, 1, '2025-02-11', 9.00, NULL, NULL, NULL, NULL),
(10, 2, '2025-02-11', 6.00, NULL, NULL, NULL, NULL),
(11, 6, '2025-02-11', 11.00, NULL, NULL, NULL, NULL),
(12, 4, '2025-02-11', 7.00, NULL, NULL, NULL, NULL),
(13, 7, '2025-02-11', 12.00, NULL, NULL, NULL, NULL),
(14, 1, '2025-02-12', 8.00, NULL, NULL, NULL, NULL),
(15, 2, '2025-02-12', 6.00, NULL, NULL, NULL, NULL),
(16, 6, '2025-02-12', 10.00, NULL, NULL, NULL, NULL),
(17, 4, '2025-02-12', 9.00, NULL, NULL, NULL, NULL),
(18, 7, '2025-02-12', 11.00, NULL, NULL, NULL, NULL),
(19, 1, '2025-02-13', 7.00, NULL, NULL, NULL, NULL),
(20, 2, '2025-02-13', 9.00, NULL, NULL, NULL, NULL),
(21, 6, '2025-02-13', 12.00, NULL, NULL, NULL, NULL),
(22, 4, '2025-02-13', 6.00, NULL, NULL, NULL, NULL),
(23, 7, '2025-02-13', 13.00, NULL, NULL, NULL, NULL),
(24, 1, '2025-02-14', 8.00, NULL, NULL, NULL, NULL),
(25, 2, '2025-02-14', 9.00, NULL, NULL, NULL, NULL),
(26, 6, '2025-02-14', 10.00, NULL, NULL, NULL, NULL),
(27, 4, '2025-02-14', 7.00, NULL, NULL, NULL, NULL),
(28, 7, '2025-02-14', 13.00, NULL, NULL, NULL, NULL),
(29, 2, '2025-03-12', 12.00, NULL, NULL, NULL, NULL),
(30, 1, '2025-03-11', NULL, 'positivo', 'Nenhum', '', NULL),
(31, 2, '2025-03-11', NULL, 'negativo', 'Nenhum', '', NULL),
(32, 3, '2025-03-11', NULL, 'positivo', 'Nenhum', '', NULL),
(33, 4, '2025-03-11', NULL, 'negativo', 'Nenhum', '', NULL),
(34, 5, '2025-03-11', NULL, 'negativo', 'Nenhum', '', NULL),
(35, 6, '2025-03-11', NULL, 'negativo', 'Nenhum', '', NULL),
(36, 7, '2025-03-11', NULL, 'negativo', 'Nenhum', '', NULL),
(37, 1, '2025-03-14', NULL, 'negativo', 'Nenhum', '', NULL),
(38, 2, '2025-03-14', NULL, 'negativo', 'Nenhum', '', NULL),
(39, 3, '2025-03-14', NULL, 'positivo', 'Nenhum', '', NULL),
(40, 4, '2025-03-14', NULL, 'negativo', 'Nenhum', '', NULL),
(41, 5, '2025-03-14', NULL, 'negativo', 'Nenhum', '', NULL),
(42, 6, '2025-03-14', NULL, 'negativo', 'Nenhum', '', NULL),
(43, 7, '2025-03-14', NULL, 'negativo', 'Nenhum', '', NULL),
(44, 1, '2025-03-18', NULL, 'positivo', 'Nenhum', '', NULL),
(45, 2, '2025-03-18', NULL, 'negativo', 'Nenhum', '', NULL),
(46, 3, '2025-03-18', NULL, 'negativo', 'Nenhum', '', NULL),
(47, 4, '2025-03-18', NULL, 'positivo', 'Nenhum', '', NULL),
(48, 5, '2025-03-18', NULL, 'negativo', 'Nenhum', '', NULL),
(49, 6, '2025-03-18', NULL, 'negativo', 'Nenhum', '', NULL),
(50, 7, '2025-03-18', NULL, 'negativo', 'Nenhum', '', NULL),
(51, 1, '2025-03-25', NULL, 'positivo', 'Nenhum', '', NULL),
(52, 2, '2025-03-25', NULL, 'negativo', 'Nenhum', '', NULL),
(53, 3, '2025-03-25', NULL, 'negativo', 'Nenhum', '', NULL),
(54, 4, '2025-03-25', NULL, 'negativo', 'Nenhum', '', NULL),
(55, 5, '2025-03-25', NULL, 'negativo', 'Nenhum', '', NULL),
(56, 6, '2025-03-25', NULL, 'negativo', 'Nenhum', '', NULL),
(57, 7, '2025-03-25', NULL, 'negativo', 'Nenhum', '', NULL),
(58, 12, '2025-06-25', NULL, NULL, NULL, 'Vaca \"vaca3\" cadastrada com descarte = 0', 'Inserção'),
(59, 1, '2025-06-25', 6.00, NULL, NULL, NULL, NULL),
(60, 1, '2025-06-25', 6.00, NULL, NULL, NULL, NULL),
(61, 1, '2025-06-25', NULL, 'positivo', '', '', NULL),
(62, 13, '2025-06-25', NULL, NULL, NULL, 'Vaca \"vaquinha2\" cadastrada com descarte = 0', 'Inserção'),
(63, 1, '2025-06-25', 8.00, NULL, NULL, NULL, NULL),
(64, 1, '2025-06-25', 10.00, NULL, NULL, NULL, NULL),
(65, 1, '2025-06-25', 12.00, NULL, NULL, NULL, NULL),
(66, 1, '2025-06-25', 12.00, NULL, NULL, NULL, NULL),
(67, 14, '2025-06-25', NULL, NULL, NULL, 'Vaca \"vaca007\" cadastrada com descarte = 0', 'Inserção'),
(68, 15, '2025-06-25', NULL, NULL, NULL, 'Vaca \"vaca55\" cadastrada com descarte = 0', 'Inserção'),
(69, 1, '2025-06-25', 15.00, NULL, NULL, NULL, NULL),
(70, 16, '2025-06-25', NULL, NULL, NULL, 'Vaca \"vacaquinha33\" cadastrada com descarte = 0', 'Inserção'),
(71, 1, '2025-06-25', 14.00, NULL, NULL, NULL, NULL),
(72, 1, '2025-06-23', 20.00, NULL, NULL, NULL, NULL),
(73, 1, '2025-05-26', 17.00, NULL, NULL, NULL, NULL),
(74, NULL, '2025-06-25', NULL, NULL, NULL, 'Vaca \"vacaa\" cadastrada com descarte = 0', 'Inserção'),
(75, 2, '2025-06-26', 30.00, NULL, NULL, NULL, NULL),
(76, 4, '2025-06-26', NULL, 'positivo', '', '', NULL),
(77, 2, '2025-06-26', 2.00, NULL, NULL, NULL, NULL),
(78, 2, '2025-06-26', 4.00, NULL, NULL, NULL, NULL),
(79, NULL, '2025-06-26', NULL, NULL, NULL, 'Vaca \"vaca653\" cadastrada com descarte = 0', 'Inserção'),
(80, 2, '2025-06-26', 7.00, NULL, NULL, NULL, NULL),
(81, 2, '2025-06-26', 24.00, NULL, NULL, NULL, NULL),
(82, 2, '2025-06-26', 24.00, NULL, NULL, NULL, NULL),
(83, 1, '2025-06-26', 14.00, NULL, NULL, NULL, NULL),
(84, 2, '2025-06-26', 12.00, NULL, NULL, NULL, NULL),
(85, 4, '2025-06-26', 16.00, NULL, NULL, NULL, NULL),
(86, 3, '2025-06-26', 19.00, NULL, NULL, NULL, NULL),
(87, 2, '2025-06-26', 13.00, NULL, NULL, NULL, NULL),
(88, 3, '2025-06-26', 25.00, NULL, NULL, NULL, NULL),
(89, 3, '2025-06-26', 25.00, NULL, NULL, NULL, NULL),
(90, 3, '2025-06-26', 16.00, NULL, NULL, NULL, NULL),
(91, 2, '2025-06-26', NULL, 'positivo', '', '', NULL),
(92, 2, '2025-06-26', NULL, 'positivo', '', '', NULL),
(93, NULL, '2025-06-26', NULL, NULL, NULL, 'Vaca \"vaca76\" cadastrada com descarte = 0', 'Inserção'),
(94, 2, '2025-06-26', 12.00, NULL, NULL, NULL, NULL),
(95, 2, '2025-06-26', 12.00, NULL, NULL, NULL, NULL),
(96, 2, '2025-06-26', 23.00, NULL, NULL, NULL, NULL),
(97, 2, '2025-06-26', NULL, 'positivo', '', '', NULL),
(98, NULL, '2025-06-26', NULL, NULL, NULL, 'Vaca \"pintada\" cadastrada com descarte = 0', 'Inserção'),
(99, 2, '2025-06-26', 13.00, NULL, NULL, NULL, NULL),
(100, 2, '2025-06-26', 12.00, NULL, NULL, NULL, NULL),
(101, 3, '2025-06-26', 17.00, NULL, NULL, NULL, NULL),
(102, NULL, '2025-06-26', NULL, NULL, NULL, 'Vaca \"coca\" cadastrada com descarte = 0', 'Inserção'),
(103, 1, '2025-06-26', 15.00, NULL, NULL, NULL, NULL),
(104, 2, '2025-06-26', 24.00, NULL, NULL, NULL, NULL),
(105, 3, '2025-06-26', 17.00, NULL, NULL, NULL, NULL),
(106, 3, '2025-06-26', 16.00, NULL, NULL, NULL, NULL),
(107, 2, '2025-06-26', NULL, 'negativo', '', '', NULL),
(108, 3, '2025-06-26', 15.00, NULL, NULL, NULL, NULL),
(109, 3, '2025-06-26', 19.00, NULL, NULL, NULL, NULL),
(110, 2, '2025-06-26', 4.00, NULL, NULL, NULL, NULL),
(111, 2, '2025-06-26', NULL, 'negativo', '', '', NULL),
(112, 3, '2025-06-26', NULL, 'negativo', '', '', NULL),
(113, NULL, '2025-06-26', NULL, NULL, NULL, 'Vaca \"vaca654\" cadastrada com descarte = 0', 'Inserção'),
(114, 3, '2025-06-26', 19.00, NULL, NULL, NULL, NULL),
(115, 4, '2025-06-26', NULL, 'negativo', '', '', NULL);

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
(26, 2, 12.00, '2025-03-12'),
(27, 1, 6.00, '2025-06-25'),
(28, 1, 6.00, '2025-06-25'),
(29, 1, 8.00, '2025-06-25'),
(30, 1, 10.00, '2025-06-25'),
(31, 1, 12.00, '2025-06-25'),
(32, 1, 12.00, '2025-06-25'),
(33, 1, 15.00, '2025-06-25'),
(34, 1, 14.00, '2025-06-25'),
(35, 1, 20.00, '2025-06-23'),
(36, 1, 17.00, '2025-05-26'),
(37, 2, 30.00, '2025-06-26'),
(38, 2, 2.00, '2025-06-26'),
(39, 2, 4.00, '2025-06-26'),
(40, 2, 7.00, '2025-06-26'),
(41, 2, 24.00, '2025-06-26'),
(42, 2, 24.00, '2025-06-26'),
(43, 1, 14.00, '2025-06-26'),
(44, 2, 12.00, '2025-06-26'),
(45, 4, 16.00, '2025-06-26'),
(49, 3, 25.00, '2025-06-26'),
(50, 3, 16.00, '2025-06-26'),
(51, 2, 12.00, '2025-06-26'),
(52, 2, 12.00, '2025-06-26'),
(53, 2, 23.00, '2025-06-26'),
(55, 2, 12.00, '2025-06-26'),
(56, 3, 17.00, '2025-06-26'),
(57, 1, 15.00, '2025-06-26'),
(58, 2, 24.00, '2025-06-26'),
(59, 3, 17.00, '2025-06-26'),
(60, 3, 16.00, '2025-06-26'),
(61, 3, 15.00, '2025-06-26'),
(62, 3, 12.00, '2025-06-26');

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

--
-- Despejando dados para a tabela `recuperacao_senha`
--

INSERT INTO `recuperacao_senha` (`id_recuperação`, `id_usuario`, `token`, `data_expiracao`, `usado`) VALUES
(1, 3, 'a667a004031a15f42eef269341d8afa7', '2025-06-26 21:39:21', 0),
(2, 3, '3a95fcebece9e4a1a487d93806f28911', '2025-06-26 21:42:20', 0),
(3, 3, '9714486c9ce85a51faf7aa2ec20445ed', '2025-06-26 21:46:14', 0),
(4, 3, '02a935d9705117f7ede561e931f1759c', '2025-06-26 21:56:23', 0),
(5, 3, '42fe111165d88854e050d8702b5f7ad5', '2025-06-26 22:09:15', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `relatorios`
--

CREATE TABLE `relatorios` (
  `id_relatorio` int(11) NOT NULL,
  `nome_arquivo` varchar(255) NOT NULL,
  `caminho_arquivo` varchar(255) NOT NULL,
  `data_upload` datetime NOT NULL DEFAULT current_timestamp()
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
(28, 7, '2025-03-25', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(29, 1, '2025-06-25', 'positivo', 2, 'D.D, T.E', '', ''),
(33, 2, '2025-06-26', 'positivo', 1, 'D.D', '', ''),
(34, 2, '2025-06-26', 'negativo', 0, '', '', ''),
(35, 2, '2025-06-26', 'negativo', 0, '', '', ''),
(36, 3, '2025-06-26', 'negativo', 0, '', '', '');

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
(1, 'Cecília Helena', 'chsna@discente.ifpe.edu.br', '$2y$10$mVTmG2AISbQogZzbUjGRdO9Kh0j6P9NLTnja1xdZ6Iz37GfKw/4yq', 'aluno'),
(2, 'Isabela de França', 'ifl1@discente.ifpe.edu.br', '$2y$10$rkHPA4T1wncPzKEQlGBOneNENEJqyrmBEI03UUoZomR91NERHcH4.', 'aluno'),
(3, 'Vitória Melo', 'mvms4@discente.ifpe.edu.br', '$2y$10$WVPO7UaXCczfAODdvCt8m.i.OiylHGabbSHAYqzDXtYcLSaafw1mO', 'professor'),
(4, 'Alexia Alves', 'ajdsa@discente.ifpe.edu.br', '$2y$10$NimEkKa5fliewp/OpZcgPeSjQUAAjh/o/fYZGLPZV8C85EyggCDCS', 'aluno');

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
(11, 'vaquinha', 0),
(12, 'vaca3', 0),
(13, 'vaquinha2', 0),
(14, 'vaca007', 0),
(15, 'vaca55', 0),
(16, 'vacaquinha33', 0);

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
-- Índices de tabela `relatorios`
--
ALTER TABLE `relatorios`
  ADD PRIMARY KEY (`id_relatorio`);

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
  MODIFY `id_historico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de tabela `producao_leite`
--
ALTER TABLE `producao_leite`
  MODIFY `id_producao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de tabela `recuperacao_senha`
--
ALTER TABLE `recuperacao_senha`
  MODIFY `id_recuperação` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `relatorios`
--
ALTER TABLE `relatorios`
  MODIFY `id_relatorio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `teste_mastite`
--
ALTER TABLE `teste_mastite`
  MODIFY `id_teste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `vacas`
--
ALTER TABLE `vacas`
  MODIFY `id_vaca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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

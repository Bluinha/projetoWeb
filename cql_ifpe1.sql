-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/07/2025 às 04:11
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
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (4, 11.5, '2025-09-17');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (6, 9.9, '2025-09-14');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (1, 15.7, '2025-09-05');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (6, 8.2, '2025-09-20');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (5, 15.6, '2025-09-24');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (1, 15.6, '2025-09-01');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (6, 13.3, '2025-09-22');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (5, 6.8, '2025-09-26');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (7, 10.0, '2025-09-26');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (1, 13.5, '2025-09-27');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (6, 11.7, '2025-09-04');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (7, 10.9, '2025-09-29');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (1, 14.8, '2025-09-09');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (2, 13.0, '2025-09-09');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (3, 11.0, '2025-09-18');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (4, 11.2, '2025-09-23');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (5, 15.3, '2025-09-13');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (6, 10.6, '2025-09-03');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (7, 7.9, '2025-09-12');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (2, 10.8, '2025-09-28');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (5, 12.6, '2025-09-20');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (1, 13.9, '2025-09-04');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (4, 12.0, '2025-09-01');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (2, 13.9, '2025-09-24');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (3, 9.7, '2025-09-30');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (6, 11.5, '2025-09-18');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (7, 8.7, '2025-09-06');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (1, 15.2, '2025-09-12');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (2, 11.5, '2025-09-19');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (5, 16.8, '2025-09-11');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (3, 10.6, '2025-09-02');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (4, 9.7, '2025-09-07');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (6, 9.8, '2025-09-08');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (1, 12.9, '2025-09-16');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (7, 9.9, '2025-09-15');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (2, 12.1, '2025-09-11');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (5, 12.4, '2025-09-02');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (3, 7.9, '2025-09-21');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (4, 11.7, '2025-09-25');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (6, 11.9, '2025-09-27');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (1, 16.2, '2025-09-08');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (7, 8.7, '2025-09-02');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (2, 12.3, '2025-09-06');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (5, 13.9, '2025-09-16');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (3, 11.7, '2025-09-03');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (4, 8.7, '2025-09-30');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (6, 9.8, '2025-09-10');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (1, 13.1, '2025-09-18');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (5, 14.7, '2025-09-05');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (2, 11.7, '2025-09-02');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (3, 12.3, '2025-09-14');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (4, 10.8, '2025-09-11');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (7, 8.6, '2025-09-21');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (6, 13.7, '2025-09-23');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (1, 14.0, '2025-09-23');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (2, 10.1, '2025-09-03');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (5, 12.2, '2025-09-19');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (3, 11.2, '2025-09-08');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (4, 12.2, '2025-09-06');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (6, 12.2, '2025-09-02');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (7, 9.2, '2025-09-10');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (1, 15.0, '2025-09-14');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (2, 13.8, '2025-09-07');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (5, 14.2, '2025-09-28');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (3, 9.2, '2025-09-25');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (4, 11.9, '2025-09-12');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (6, 10.4, '2025-09-26');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (7, 8.0, '2025-09-04');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (1, 16.1, '2025-09-02');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (2, 12.6, '2025-09-21');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (3, 10.5, '2025-09-13');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (5, 15.4, '2025-09-08');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (4, 10.6, '2025-09-19');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (6, 10.9, '2025-09-15');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (7, 9.4, '2025-09-18');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (1, 14.3, '2025-09-10');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (2, 11.0, '2025-09-17');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (3, 10.3, '2025-09-26');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (4, 11.1, '2025-09-08');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (5, 14.4, '2025-09-27');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (6, 12.9, '2025-09-29');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (7, 8.9, '2025-09-09');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (1, 13.6, '2025-09-21');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (2, 12.8, '2025-09-13');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (3, 11.4, '2025-09-16');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (4, 9.1, '2025-09-04');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (5, 13.2, '2025-09-22');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (6, 11.1, '2025-09-07');
INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (7, 9.1, '2025-09-20');


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
-- Estrutura para tabela `relatorios`
--

CREATE TABLE `relatorios` (
  `id_relatorio` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
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

INSERT INTO `teste_mastite` 
(`id_teste`, `id_vaca`, `data`, `resultado`, `quantas_cruzes`, `ubere`, `tratamento`, `observacoes`) VALUES
-- Semana 1 (05/09)
(1, 1, '2025-09-05', 'positivo', 1, 'P.E', 'Nenhum', ''),
(2, 2, '2025-09-05', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(3, 3, '2025-09-05', 'positivo', 2, 'P.D A.D', 'Nenhum', ''),
(4, 4, '2025-09-05', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(5, 5, '2025-09-05', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(6, 6, '2025-09-05', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(7, 7, '2025-09-05', 'negativo', 0, 'Especificado', 'Nenhum', ''),

-- Semana 2 (12/09)
(8, 1, '2025-09-12', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(9, 2, '2025-09-12', 'positivo', 1, 'A.D', 'Nenhum', ''),
(10, 3, '2025-09-12', 'positivo', 3, 'P.E A.E P.D', 'Nenhum', ''),
(11, 4, '2025-09-12', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(12, 5, '2025-09-12', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(13, 6, '2025-09-12', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(14, 7, '2025-09-12', 'negativo', 0, 'Especificado', 'Nenhum', ''),

-- Semana 3 (19/09)
(15, 1, '2025-09-19', 'positivo', 2, 'A.D P.E', 'Nenhum', ''),
(16, 2, '2025-09-19', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(17, 3, '2025-09-19', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(18, 4, '2025-09-19', 'positivo', 2, 'P.D A.E', 'Nenhum', ''),
(19, 5, '2025-09-19', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(20, 6, '2025-09-19', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(21, 7, '2025-09-19', 'negativo', 0, 'Especificado', 'Nenhum', ''),

-- Semana 4 (26/09)
(22, 1, '2025-09-26', 'positivo', 4, 'A.D P.D P.E A.E', 'Nenhum', ''),
(23, 2, '2025-09-26', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(24, 3, '2025-09-26', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(25, 4, '2025-09-26', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(26, 5, '2025-09-26', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(27, 6, '2025-09-26', 'negativo', 0, 'Especificado', 'Nenhum', ''),
(28, 7, '2025-09-26', 'negativo', 0, 'Especificado', 'Nenhum', '');

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

-- Criar tabela vacas com id auto-increment
CREATE TABLE `vacas` (
  `id_vaca` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descarte` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_vaca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Inserir dados iniciais (IDs serão gerados automaticamente)
INSERT INTO `vacas` (`nome`, `descarte`) VALUES
('Alicate', 0),
('Chuvisco', 0),
('Chichita', 0),
('Muriçoca', 0),
('Morena', 0),
('Mococa', 0),
('Tanajura', 0);

COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE fila_emails (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destinatario VARCHAR(255) NOT NULL,
    assunto VARCHAR(255) NOT NULL,
    corpo TEXT NOT NULL,
    status ENUM('pendente','enviado','erro') DEFAULT 'pendente',
    tentativas INT DEFAULT 0,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    enviado_em TIMESTAMP NULL
);


-- Índice para acelerar buscas na produção de leite
CREATE INDEX idx_producao_vaca_data
ON producao_leite (id_vaca, data);

-- Índice para acelerar buscas no teste de mastite
CREATE INDEX idx_mastite_vaca_data
ON teste_mastite (id_vaca, data);

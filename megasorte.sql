-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/07/2022 às 21:15
-- Versão do servidor: 10.4.21-MariaDB
-- Versão do PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `megasorte`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cotas`
--

CREATE TABLE `cotas` (
  `id` int(11) NOT NULL,
  `idComprador` int(11) NOT NULL,
  `idSorteio` int(11) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `metodo_pagamento` int(11) NOT NULL,
  `qtdCotas` int(11) NOT NULL,
  `cotas` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `cotas`
--

INSERT INTO `cotas` (`id`, `idComprador`, `idSorteio`, `valor`, `metodo_pagamento`, `qtdCotas`, `cotas`, `status`, `data`) VALUES
(33, 1, 6, '16', 0, 20, '4345,7010,1277,4127,6532,9560,266,1672,4798,9433,3728,9684,1206,6631,8038,9298,5674,4008,4572,7855', 1, '27/07/2022 08:36:52'),
(34, 1, 6, '16', 0, 20, '447,2378,7313,9332,433,5580,4158,4567,1114,2272,7213,1283,4289,4773,1174,3118,6227,3801,7555,5551', 1, '27/07/2022 10:23:18'),
(35, 1, 6, '1.6', 0, 2, '0', 1, '27/07/2022 10:23:57'),
(36, 1, 6, '1.6', 0, 2, '0', 1, '27/07/2022 10:26:14'),
(37, 1, 6, '16', 0, 20, '3053,6293,170,6499,1379,3016,775,7013,9850,1499,4258,8728,8359,57,9825,8440,5938,7605,3446,2711', 1, '27/07/2022 10:26:21'),
(38, 1, 6, '16', 0, 20, '3053,6293,170,6499,1379,3016,775,7013,9850,1499,4258,8728,8359,57,9825,8440,5938,7605,3446,2711', 1, '27/07/2022 10:26:25'),
(39, 1, 6, '16', 0, 20, '3053,6293,170,6499,1379,3016,775,7013,9850,1499,4258,8728,8359,57,9825,8440,5938,7605,3446,2711', 1, '27/07/2022 10:27:48'),
(40, 1, 6, '16', 0, 20, '2508,4118,4085,9638,7962,5893,195,5684,6354,6114,4924,6905,1946,1795,3927,8002,4626,5560,3965,1129', 1, '27/07/2022 10:27:54'),
(41, 1, 6, '16', 0, 20, '2508,4118,4085,9638,7962,5893,195,5684,6354,6114,4924,6905,1946,1795,3927,8002,4626,5560,3965,1129', 1, '27/07/2022 10:28:24'),
(42, 1, 6, '16', 0, 20, '2508,4118,4085,9638,7962,5893,195,5684,6354,6114,4924,6905,1946,1795,3927,8002,4626,5560,3965,1129', 1, '27/07/2022 10:28:25'),
(43, 1, 6, '16', 0, 20, '2508,4118,4085,9638,7962,5893,195,5684,6354,6114,4924,6905,1946,1795,3927,8002,4626,5560,3965,1129', 1, '27/07/2022 10:28:25'),
(44, 1, 6, '16', 0, 20, '2508,4118,4085,9638,7962,5893,195,5684,6354,6114,4924,6905,1946,1795,3927,8002,4626,5560,3965,1129', 1, '27/07/2022 10:28:25'),
(45, 1, 6, '16', 0, 20, '2508,4118,4085,9638,7962,5893,195,5684,6354,6114,4924,6905,1946,1795,3927,8002,4626,5560,3965,1129', 1, '27/07/2022 10:28:26'),
(46, 1, 6, '8', 0, 10, '9673,7775,5999,7723,4215,1092,6639,4984,3496,7777', 1, '27/07/2022 10:28:32'),
(47, 1, 6, '8', 0, 10, '9673,7775,5999,7723,4215,1092,6639,4984,3496,7777', 1, '27/07/2022 10:30:48'),
(48, 1, 6, '8', 0, 10, '8905,5853,4562,2050,4964,1902,8642,9927,5323,9133', 0, '27/07/2022 10:31:19'),
(49, 1, 6, '8', 0, 10, '1250,6913,1524,8850,6200,2473,6609,312,4016,4356', 0, '27/07/2022 11:02:14');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ganhadores`
--

CREATE TABLE `ganhadores` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cota` int(11) NOT NULL,
  `premio` varchar(255) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `sorteios`
--

CREATE TABLE `sorteios` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `categoria` int(11) NOT NULL,
  `preco` varchar(255) NOT NULL,
  `dataCriacao` datetime NOT NULL,
  `dataSorteio` datetime NOT NULL,
  `qtdCotas` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `promocao` int(11) NOT NULL,
  `tipo_taxa` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `sorteios`
--

INSERT INTO `sorteios` (`id`, `titulo`, `categoria`, `preco`, `dataCriacao`, `dataSorteio`, `qtdCotas`, `descricao`, `promocao`, `tipo_taxa`, `status`, `autor`) VALUES
(6, 'iPhone 11 64GB Preto', 1, '0.8', '2022-07-25 20:36:10', '2022-09-07 20:36:00', 20000, 'Novo, lacrado // Cor Preto // 64GB', 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `numero` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `uf` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `pontoreferencia` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `telefone`, `senha`, `cep`, `cpf`, `numero`, `bairro`, `complemento`, `uf`, `cidade`, `pontoreferencia`, `status`, `nivel`, `data`) VALUES
(1, 'Eraldo Okado', 'eraldo.bmx@gmail.com', '82987374323', 'e53ce68e4a3683e578abca65a64a4f24', '0000-00-00', '', '', '', '', '', '', '', 1, 1, '0000-00-00'),
(2, 'Joao Pedro', 'joaopedro123@gmail.com', '82987468913', '9f9e2a96743156dcc10690ea97d643bb', '57084632', 'Rua 5-E', '123', 'Benedito Bentes', 'Lote 36', 'AL', 'Maceió', 'Na rua da escolinha', 1, 0, '2022-07-25'),
(3, 'Marlo Flavio Rodrigues', 'amanae.bmx@hotmail.com', '82987374323', '9f9e2a96743156dcc10690ea97d643bb', '57084-632', '', '(82) 98737-4323', 'asdasd', '', '', '', '', 1, 0, '2022-07-27'),
(4, 'Eraldo I S Neto', 'familiasampoficial@gmail.com', '82988704123', '9f9e2a96743156dcc10690ea97d643bb', '57084632', '525.805.047-53', '3123', 'ADASD', '', '', '', '', 1, 0, '2022-07-27'),
(5, 'Marlo Flavio Rodrigues', 'amanaasdde.bmx@hotmail.com', '82987374323', '9f9e2a96743156dcc10690ea97d643bb', '57084-632', '', '(82) 98737-4323', 'asdasd', '', '', '', '', 1, 0, '2022-07-27');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices de tabela `cotas`
--
ALTER TABLE `cotas`
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Índices de tabela `ganhadores`
--
ALTER TABLE `ganhadores`
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices de tabela `sorteios`
--
ALTER TABLE `sorteios`
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cotas`
--
ALTER TABLE `cotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `ganhadores`
--
ALTER TABLE `ganhadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `sorteios`
--
ALTER TABLE `sorteios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/12/2025 às 18:53
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
-- Banco de dados: `lojascarandcar`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `anuncios`
--

CREATE TABLE `anuncios` (
  `id` int(11) NOT NULL,
  `veiculo_id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `cor` varchar(30) DEFAULT NULL,
  `ano_fabricacao` int(4) NOT NULL,
  `ano_modelo` int(4) NOT NULL,
  `km_atual` int(11) NOT NULL,
  `foto_destaque` varchar(255) DEFAULT NULL,
  `status` enum('ativo','reservado','vendido') DEFAULT 'ativo',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `anuncios`
--

INSERT INTO `anuncios` (`id`, `veiculo_id`, `titulo`, `descricao`, `preco`, `placa`, `cor`, `ano_fabricacao`, `ano_modelo`, `km_atual`, `foto_destaque`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'CHEVROLET MONZA 2.0 EFI GL 8V GASOLINA 4P MANUAL', 'Carro impecável original com manual/NF - praticamente único dono comprado com 3. 000 no primeiro ano.', 40500.00, 'ABC 1234', 'Cinza', 1995, 1996, 49871, '1764783167_01c0e419e0bc87bf8d11.jpg', 'vendido', '2025-12-03 17:32:47', '2025-12-03 17:49:57');

-- --------------------------------------------------------

--
-- Estrutura para tabela `historico_vendas`
--

CREATE TABLE `historico_vendas` (
  `id` int(11) NOT NULL,
  `anuncio_id` int(11) NOT NULL,
  `comprador_id` int(11) DEFAULT NULL,
  `cliente_nome` varchar(100) NOT NULL,
  `valor_negociado` decimal(10,2) NOT NULL,
  `data_venda` date NOT NULL,
  `observacoes` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `historico_vendas`
--

INSERT INTO `historico_vendas` (`id`, `anuncio_id`, `comprador_id`, `cliente_nome`, `valor_negociado`, `data_venda`, `observacoes`, `created_at`) VALUES
(1, 1, 2, 'Nicolas Monteiro', 40500.00, '2025-12-03', 'Compra realizada pelo site.', '2025-12-03 14:49:57');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha_hash` varchar(255) NOT NULL,
  `tipo` enum('admin','usuario') DEFAULT 'usuario',
  `foto` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha_hash`, `tipo`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'admin@lojascarandcar.com.br', '$2y$10$Wd0DU6tAT/Glkdj.a0yUc.tGO/NgewpJm3dptmyDi4fvjZx0UVPcG', 'admin', NULL, '2025-12-03 14:21:07', '2025-12-03 17:25:13'),
(2, 'Nicolas Monteiro', 'nicolas@gmail.com', '$2y$10$qQJD.71716qgvRapEPrWBOix.vtnV2ZztTZMT485aIsGq6XW4AYRi', 'usuario', NULL, '2025-12-03 17:33:44', '2025-12-03 17:33:55'),
(3, 'Nicolas Monteiro', 'nicolas3@gmail.com', '$2y$10$7ZdGgH3njVOwz3eMpmiRFePcUyzePNySGc/V.YF7x2Op8eqXJGi2y', 'usuario', NULL, '2025-12-03 17:44:32', '2025-12-03 17:44:32'),
(4, 'taina', 'taina@gmail.com', '$2y$10$cmSf.ksgD6ESj/O/uccG4uGBOuf2WdBvUkD31c7wrBN/ZGUcFHosW', 'usuario', NULL, '2025-12-03 17:52:33', '2025-12-03 17:52:47');

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `versao` varchar(100) DEFAULT NULL,
  `combustivel` enum('Gasolina','Etanol','Flex','Diesel','Elétrico') DEFAULT 'Flex',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `marca`, `modelo`, `versao`, `combustivel`, `created_at`, `updated_at`) VALUES
(1, 'CHEVROLET', 'MONZA', '2.0 EFI GL 8V', 'Gasolina', '2025-12-03 17:26:27', '2025-12-03 17:26:27');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `veiculo_id` (`veiculo_id`);

--
-- Índices de tabela `historico_vendas`
--
ALTER TABLE `historico_vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anuncio_id` (`anuncio_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `historico_vendas`
--
ALTER TABLE `historico_vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `anuncios_ibfk_1` FOREIGN KEY (`veiculo_id`) REFERENCES `veiculos` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `historico_vendas`
--
ALTER TABLE `historico_vendas`
  ADD CONSTRAINT `historico_vendas_ibfk_1` FOREIGN KEY (`anuncio_id`) REFERENCES `anuncios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

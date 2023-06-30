-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/06/2023 às 17:10
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `databaseestoque`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `baixar`
--

CREATE TABLE `baixar` (
  `id_baixaR` int(11) NOT NULL,
  `data_baixaR` date DEFAULT NULL,
  `patrimonio_baixaR` int(50) DEFAULT NULL,
  `material_baixaR` varchar(180) DEFAULT NULL,
  `causa_baixaR` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `baixau`
--

CREATE TABLE `baixau` (
  `id_baixaU` int(11) NOT NULL,
  `causa_baixaU` varchar(255) DEFAULT NULL,
  `data_baixaU` date DEFAULT NULL,
  `material_baixaU` varchar(255) DEFAULT NULL,
  `quantidade_baixaU` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `chave`
--

CREATE TABLE `chave` (
  `id_chave` int(11) NOT NULL,
  `sala` varchar(180) DEFAULT NULL,
  `pessoaRequerente` varchar(180) DEFAULT NULL,
  `dataRetirada` date DEFAULT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `emprestimos`
--

CREATE TABLE `emprestimos` (
  `id_empr` int(50) NOT NULL,
  `patrimonio_empr` int(50) NOT NULL,
  `data_empr` date NOT NULL,
  `requerente_empr` varchar(100) NOT NULL,
  `material_empr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `entrada`
--

CREATE TABLE `entrada` (
  `id_entrada` int(11) NOT NULL,
  `qntd_entrada` varchar(255) NOT NULL,
  `material_entrada` varchar(255) NOT NULL,
  `data_entrada` date NOT NULL,
  `unidade_entrada` varchar(255) NOT NULL,
  `qntdAnterior_entrada` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `prod_devolucao`
--

CREATE TABLE `prod_devolucao` (
  `id_dev` int(11) NOT NULL,
  `dataDev` date DEFAULT NULL,
  `materialDev` varchar(180) DEFAULT NULL,
  `unidadeDev` varchar(180) DEFAULT NULL,
  `qntdDev` int(11) DEFAULT NULL,
  `categoriaDev` varchar(200) DEFAULT NULL,
  `motivoDev` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `prod_retornavel`
--

CREATE TABLE `prod_retornavel` (
  `id_prodR` int(11) NOT NULL,
  `patrimonioR` int(50) DEFAULT NULL,
  `dataEntradaR` date DEFAULT NULL,
  `materialR` varchar(180) DEFAULT NULL,
  `categoriaR` varchar(200) DEFAULT NULL,
  `situacao_prodR` varchar(11) NOT NULL,
  `vista_pr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `prod_unico`
--

CREATE TABLE `prod_unico` (
  `id_prodU` int(11) NOT NULL,
  `dataEntradaU` date DEFAULT NULL,
  `materialU` varchar(180) DEFAULT NULL,
  `unidadeU` varchar(180) DEFAULT NULL,
  `quantidadeU` int(11) DEFAULT NULL,
  `categoriaU` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `nome` varchar(180) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `cpf` int(11) NOT NULL,
  `senha` varchar(180) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `baixar`
--
ALTER TABLE `baixar`
  ADD PRIMARY KEY (`id_baixaR`);

--
-- Índices de tabela `baixau`
--
ALTER TABLE `baixau`
  ADD PRIMARY KEY (`id_baixaU`);

--
-- Índices de tabela `chave`
--
ALTER TABLE `chave`
  ADD PRIMARY KEY (`id_chave`);

--
-- Índices de tabela `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id_entrada`);

--
-- Índices de tabela `prod_devolucao`
--
ALTER TABLE `prod_devolucao`
  ADD PRIMARY KEY (`id_dev`);

--
-- Índices de tabela `prod_retornavel`
--
ALTER TABLE `prod_retornavel`
  ADD PRIMARY KEY (`id_prodR`);

--
-- Índices de tabela `prod_unico`
--
ALTER TABLE `prod_unico`
  ADD PRIMARY KEY (`id_prodU`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `baixar`
--
ALTER TABLE `baixar`
  MODIFY `id_baixaR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `baixau`
--
ALTER TABLE `baixau`
  MODIFY `id_baixaU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `chave`
--
ALTER TABLE `chave`
  MODIFY `id_chave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `prod_devolucao`
--
ALTER TABLE `prod_devolucao`
  MODIFY `id_dev` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `prod_retornavel`
--
ALTER TABLE `prod_retornavel`
  MODIFY `id_prodR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `prod_unico`
--
ALTER TABLE `prod_unico`
  MODIFY `id_prodU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

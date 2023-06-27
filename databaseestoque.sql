-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/06/2023 às 16:02
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
-- Estrutura para tabela `chave`
--

CREATE TABLE `chave` (
  `id_chave` int(11) NOT NULL,
  `sala` varchar(180) DEFAULT NULL,
  `pessoaRetirada` varchar(180) DEFAULT NULL,
  `dataRetirada` date DEFAULT NULL,
  `responsavel` varchar(180) DEFAULT NULL,
  `disponivel_chave` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `chave`
--

INSERT INTO `chave` (`id_chave`, `sala`, `pessoaRetirada`, `dataRetirada`, `responsavel`, `disponivel_chave`) VALUES
(2, '4-15', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `emprestimos`
--

CREATE TABLE `emprestimos` (
  `id_empr` int(50) NOT NULL,
  `requerente_empr` varchar(100) NOT NULL,
  `qntd_empr` int(50) NOT NULL,
  `data_empr` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `material_empr` varchar(100) NOT NULL,
  `unidade_empr` int(50) NOT NULL,
  `responsavel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produ_baixa`
--

CREATE TABLE `produ_baixa` (
  `id_baixaU` int(11) NOT NULL,
  `id_prodU` int(11) NOT NULL,
  `materialU` varchar(100) NOT NULL,
  `qntd_baixaU` int(11) NOT NULL,
  `dataBaixaU` timestamp NOT NULL DEFAULT current_timestamp()
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

--
-- Despejando dados para a tabela `prod_devolucao`
--

INSERT INTO `prod_devolucao` (`id_dev`, `dataDev`, `materialDev`, `unidadeDev`, `qntdDev`, `categoriaDev`, `motivoDev`) VALUES
(1, NULL, '2023-06-14arduino', 'avulso', 2, 'pedagógico', 'estava quebado'),
(2, '2023-06-27', 'chave de fenda', 'avulso', 1, 'ferramenta', 'estava quebado'),
(3, '0000-00-00', 'arduino', 'avulso', 33, 'pedagógico', 'estava quebado'),
(4, '2023-06-27', 'arduino', 'caixa', 44, 'pedagógico', 'estava quebado'),
(5, '2023-06-26', 'oioi', 'caixa', 21, 'pedagógico', 'estava quebado'),
(6, '0000-00-00', 'chave de fenda', 'caixa', 656, 'pedagógico', 'estava quebado'),
(7, '0000-00-00', 'sgagsdg', 'caixa', 3245, 'pedagógico', 'estava quebado'),
(8, '0000-00-00', 'ewtwtfstesf', 'caixa', 2147483647, 'pedagógico', 'estava quebado');

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
  `situacao_prodR` tinyint(1) NOT NULL,
  `vista_pr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `prod_retornavel`
--

INSERT INTO `prod_retornavel` (`id_prodR`, `patrimonioR`, `dataEntradaR`, `materialR`, `categoriaR`, `situacao_prodR`, `vista_pr`) VALUES
(1, 12345643, '2023-06-14', 'arduino', 'pedagógico', 0, '');

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

--
-- Despejando dados para a tabela `prod_unico`
--

INSERT INTO `prod_unico` (`id_prodU`, `dataEntradaU`, `materialU`, `unidadeU`, `quantidadeU`, `categoriaU`) VALUES
(1, '2023-06-13', 'arduino', 'avulso', 22, 'pedagógico');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(180) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `senha` varchar(180) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `cpf`, `senha`) VALUES
(2, 'monica', 'monicacr250305@gmail.com', '14687635482', '123456'),
(3, 'renisson', 'renisson5@gmail.com', '12345432345', '123456');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `chave`
--
ALTER TABLE `chave`
  ADD PRIMARY KEY (`id_chave`);

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
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chave`
--
ALTER TABLE `chave`
  MODIFY `id_chave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `prod_devolucao`
--
ALTER TABLE `prod_devolucao`
  MODIFY `id_dev` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `prod_retornavel`
--
ALTER TABLE `prod_retornavel`
  MODIFY `id_prodR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `prod_unico`
--
ALTER TABLE `prod_unico`
  MODIFY `id_prodU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

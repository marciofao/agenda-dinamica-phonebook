-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Dez-2016 às 04:51
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenda`
--
CREATE DATABASE IF NOT EXISTS `agenda` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `agenda`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `cod_contato` bigint(20) NOT NULL,
  `nome_contato` varchar(30) NOT NULL,
  `sobrenome` varchar(60) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `cod_organizacao` bigint(20) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`cod_contato`, `nome_contato`, `sobrenome`, `endereco`, `cep`, `bairro`, `cidade`, `cod_organizacao`, `data_criacao`, `data_modificacao`) VALUES
(14, 'JoÃ£o', 'Lorempsum', 'Rua das flores', '96015-000', 'asdasd', 'CanguÃ§u', 1, '2016-12-04 04:24:04', '2016-12-04 04:24:04'),
(17, 'Jonatas', 'Amet', 'Rua das flores', '96015-000', 'asdasdads', 'CanguÃ§u', 4, '2016-12-04 04:41:21', '2016-12-04 04:41:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emails`
--

CREATE TABLE `emails` (
  `cod_email` bigint(20) UNSIGNED NOT NULL,
  `cod_contato` bigint(20) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `emails`
--

INSERT INTO `emails` (`cod_email`, `cod_contato`, `email`) VALUES
(3, 14, 'asdasd'),
(4, 17, 'qweqweqw@asdasdads');

-- --------------------------------------------------------

--
-- Estrutura da tabela `organizacoes`
--

CREATE TABLE `organizacoes` (
  `cod_organizacao` bigint(20) NOT NULL,
  `nome_organizacao` varchar(60) NOT NULL,
  `telefone` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `organizacoes`
--

INSERT INTO `organizacoes` (`cod_organizacao`, `nome_organizacao`, `telefone`) VALUES
(1, 'Tabajara', '(53)32276972'),
(3, 'Capivara', '5332276971'),
(4, 'guanabara', '12312312');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefones`
--

CREATE TABLE `telefones` (
  `cod_telefone` bigint(20) UNSIGNED NOT NULL,
  `cod_contato` bigint(20) NOT NULL,
  `numero` varchar(14) DEFAULT NULL,
  `etiqueta` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `telefones`
--

INSERT INTO `telefones` (`cod_telefone`, `cod_contato`, `numero`, `etiqueta`) VALUES
(22, 14, 'asdasd', 'Residencial'),
(23, 14, 'asdasd', 'Celular'),
(24, 17, '1231231', 'Celular'),
(25, 17, '123123', 'Trabalho');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`cod_contato`),
  ADD UNIQUE KEY `cod` (`cod_contato`),
  ADD KEY `cod_organizacao` (`cod_organizacao`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`cod_email`),
  ADD KEY `cod_contato` (`cod_contato`);

--
-- Indexes for table `organizacoes`
--
ALTER TABLE `organizacoes`
  ADD PRIMARY KEY (`cod_organizacao`),
  ADD UNIQUE KEY `cod` (`cod_organizacao`);

--
-- Indexes for table `telefones`
--
ALTER TABLE `telefones`
  ADD PRIMARY KEY (`cod_telefone`),
  ADD UNIQUE KEY `cod` (`cod_telefone`),
  ADD KEY `cod_contato` (`cod_contato`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contatos`
--
ALTER TABLE `contatos`
  MODIFY `cod_contato` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `cod_email` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `organizacoes`
--
ALTER TABLE `organizacoes`
  MODIFY `cod_organizacao` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `telefones`
--
ALTER TABLE `telefones`
  MODIFY `cod_telefone` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `contatos`
--
ALTER TABLE `contatos`
  ADD CONSTRAINT `fk_contato_3` FOREIGN KEY (`cod_organizacao`) REFERENCES `organizacoes` (`cod_organizacao`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `fk_contato_2` FOREIGN KEY (`cod_contato`) REFERENCES `contatos` (`cod_contato`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `telefones`
--
ALTER TABLE `telefones`
  ADD CONSTRAINT `fk_contato` FOREIGN KEY (`cod_contato`) REFERENCES `contatos` (`cod_contato`) ON DELETE CASCADE;
--
-- Database: `my_app`
--

-- --------------------------------------------------------
cod_organizacao` (`cod_organizacao`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`cod_email`),
  ADD KEY `cod_contato` (`cod_contato`);

--
-- Indexes for table `organizacoes`
--
ALTER TABLE `organizacoes`
  ADD PRIMARY KEY (`cod_organizacao`),
  ADD UNIQUE KEY `cod` (`cod_organizacao`);

--
-- Indexes for table `telefones`
--
ALTER TABLE `telefones`
  ADD PRIMARY KEY (`cod_telefone`),
  ADD UNIQUE KEY `cod` (`cod_telefone`),
  ADD KEY `cod_contato` (`cod_contato`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contatos`
--
ALTER TABLE `contatos`
  MODIFY `cod_contato` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `cod_email` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `organizacoes`
--
ALTER TABLE `organizacoes`
  MODIFY `cod_organizacao` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `telefones`
--
ALTER TABLE `telefones`
  MODIFY `cod_telefone` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `contatos`
--
ALTER TABLE `contatos`
  ADD CONSTRAINT `fk_contato_3` FOREIGN KEY (`cod_organizacao`) REFERENCES `organizacoes` (`cod_organizacao`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `fk_contato_2` FOREIGN KEY (`cod_contato`) REFERENCES `contatos` (`cod_contato`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `telefones`
--
ALTER TABLE `telefones`
  ADD CONSTRAINT `fk_contato` FOREIGN KEY (`cod_contato`) REFERENCES `contatos` (`cod_contato`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

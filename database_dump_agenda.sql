-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Dez-2016 às 07:39
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
  `cod_org_contato` bigint(20) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`cod_contato`, `nome_contato`, `sobrenome`, `endereco`, `cep`, `bairro`, `cidade`, `cod_org_contato`, `data_criacao`, `data_modificacao`) VALUES
(16, 'Jonatas', 'Amet', 'Rua das flores', '96015-000', 'centro', 'CanguÃ§u', 3, '2016-12-04 07:07:36', '2016-12-04 07:36:35'),
(17, 'JoÃ£o ClÃ¡udio', 'Andaime', 'Rua das flores', '96015-000', 'sdfsdfsdf', 'CanguÃ§u', 3, '2016-12-04 07:17:47', '2016-12-04 07:18:00'),
(18, 'Fernando', 'Dolor', 'Av. Palmeiras', '96015-000', 'ASDASD', 'Ijui', 3, '2016-12-04 07:38:26', '2016-12-04 07:38:26');

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
(13, 17, 'asdasd@asdasd'),
(14, 17, 'asdasd@asdasd'),
(20, 16, 'sdfsfsdfdsf@fsddfsdf'),
(21, 18, 'asdadsa@asdsad');

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
(3, 'Capivara', '5332276971');

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
(43, 17, '34243234', 'Residencial'),
(44, 17, '234234', 'Celular'),
(68, 16, '24234234', 'Trabalho'),
(69, 16, '234234234', 'Residencial'),
(70, 16, '12312321', 'Residencial'),
(71, 16, '13123123', 'Celular'),
(72, 16, '1224234', 'Residencial'),
(73, 18, '234234', 'Residencial');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`cod_contato`),
  ADD UNIQUE KEY `cod` (`cod_contato`),
  ADD KEY `cod_organizacao` (`cod_org_contato`);

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
  MODIFY `cod_contato` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `cod_email` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `organizacoes`
--
ALTER TABLE `organizacoes`
  MODIFY `cod_organizacao` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `telefones`
--
ALTER TABLE `telefones`
  MODIFY `cod_telefone` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `contatos`
--
ALTER TABLE `contatos`
  ADD CONSTRAINT `fk_contato_3` FOREIGN KEY (`cod_org_contato`) REFERENCES `organizacoes` (`cod_organizacao`) ON DELETE CASCADE;

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

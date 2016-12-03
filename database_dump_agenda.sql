-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Dez-2016 às 15:09
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `cod` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(30) COLLATE utf8_bin NOT NULL,
  `sobrenome` varchar(60) COLLATE utf8_bin NOT NULL,
  `endereco` varchar(60) COLLATE utf8_bin NOT NULL,
  `cep` varchar(8) COLLATE utf8_bin NOT NULL,
  `bairro` varchar(30) COLLATE utf8_bin NOT NULL,
  `cidade` varchar(30) COLLATE utf8_bin NOT NULL,
  `cod_organizacao` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `emails`
--

CREATE TABLE `emails` (
  `cod` bigint(20) UNSIGNED NOT NULL,
  `cod_contato` int(11) NOT NULL,
  `email` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `organizacoes`
--

CREATE TABLE `organizacoes` (
  `cod` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(60) COLLATE utf8_bin NOT NULL,
  `telefone` varchar(14) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefones`
--

CREATE TABLE `telefones` (
  `cod` bigint(20) UNSIGNED NOT NULL,
  `cod_contato` int(11) NOT NULL,
  `telefone` varchar(14) COLLATE utf8_bin NOT NULL,
  `etiqueta` varchar(20) COLLATE utf8_bin NOT NULL COMMENT 'CONSTRAINT chk_Frequency CHECK (Frequency IN (''trabalho'', ''residencial'', ''celular''))'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contatos`
--
ALTER TABLE `contatos`
  ADD UNIQUE KEY `cod` (`cod`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`cod`),
  ADD UNIQUE KEY `cod` (`cod`);

--
-- Indexes for table `organizacoes`
--
ALTER TABLE `organizacoes`
  ADD UNIQUE KEY `cod` (`cod`);

--
-- Indexes for table `telefones`
--
ALTER TABLE `telefones`
  ADD PRIMARY KEY (`cod`),
  ADD UNIQUE KEY `cod` (`cod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contatos`
--
ALTER TABLE `contatos`
  MODIFY `cod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `cod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `organizacoes`
--
ALTER TABLE `organizacoes`
  MODIFY `cod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `telefones`
--
ALTER TABLE `telefones`
  MODIFY `cod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

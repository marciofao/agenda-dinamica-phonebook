-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Dez-2016 às 17:38
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

CREATE TABLE `organizacoes` (
  `cod` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60)  NOT NULL,
  `telefone` varchar(14)  NOT NULL,
  PRIMARY KEY (cod)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------



--

--
ALTER TABLE `organizacoes`
  ADD UNIQUE KEY `cod` (`cod`);
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `cod` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30)  NOT NULL,
  `sobrenome` varchar(60)  NOT NULL,
  `endereco` varchar(60)  NOT NULL,
  `cep` varchar(9)  NOT NULL,
  `bairro` varchar(30)  NOT NULL,
  `cidade` varchar(30)  NOT NULL,
  `cod_organizacao` bigint(20) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime NOT NULL,
  PRIMARY KEY (cod),
  KEY cod_organizacao (cod_organizacao),
  CONSTRAINT fk_contato_3
  FOREIGN KEY (cod_organizacao) 
  REFERENCES organizacoes (cod) 
  ON DELETE CASCADE
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------
ALTER TABLE `contatos`
  ADD UNIQUE KEY `cod` (`cod`);
--
-- Estrutura da tabela `emails`
--

CREATE TABLE `emails` (
  `cod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cod_contato` bigint(20) NOT NULL,
  `email` varchar(60)  NOT NULL,
  PRIMARY KEY (cod),
  KEY cod_contato (cod_contato),
  CONSTRAINT fk_contato_2
  FOREIGN KEY (cod_contato) 
  REFERENCES contatos (cod) 
  ON DELETE CASCADE
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `organizacoes`
--

--
-- Extraindo dados da tabela `organizacoes`
--

INSERT INTO `organizacoes` (`cod`, `nome`, `telefone`) VALUES
(1, 'Tabajara', '(53)32276972'),
(3, 'Capivara', '5332276971');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefones`
--



CREATE TABLE `telefones` (
  `cod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cod_contato` bigint(20) NOT NULL,
  `telefone` varchar(14),
  `etiqueta` varchar(14),
  PRIMARY KEY (cod),
  KEY cod_contato (cod_contato),
  CONSTRAINT fk_contato 
  FOREIGN KEY (cod_contato) 
  REFERENCES contatos (cod) 
  ON DELETE CASCADE
) ENGINE=INNODB;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `contatos`
--

--
-- Indexes for table `telefones`
--
ALTER TABLE `telefones`
  
  ADD UNIQUE KEY `cod` (`cod`);

--
-- AUTO_INCREMENT for dumped tables
--


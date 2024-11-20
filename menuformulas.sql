-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 13-Nov-2024 às 14:51
-- Versão do servidor: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `menuformulas`
--
CREATE DATABASE IF NOT EXISTS `menuformulas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `menuformulas`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `formulas`
--

DROP TABLE IF EXISTS `formulas`;
CREATE TABLE IF NOT EXISTS `formulas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_da_formula` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `formulas`
--

INSERT INTO `formulas` (`id`, `nome_da_formula`) VALUES
(159, 'potencia'),
(160, 'amortizacao'),
(161, 'progressaoaritmetica'),
(162, 'progressaoaritmetica'),
(163, 'circulo'),
(164, 'circulo'),
(165, 'triangulo'),
(166, 'pitagoras'),
(167, 'retangulo'),
(168, 'funcaoquadratica'),
(169, 'potencia'),
(170, 'quadrado'),
(171, 'quadrado'),
(172, 'pitagoras'),
(173, 'quadrado'),
(174, 'funcaoquadratica'),
(175, 'progressaoaritmetica'),
(176, 'progressaoaritmetica'),
(177, 'progressaogeometrica'),
(178, 'juros'),
(179, 'funcaoquadratica'),
(180, 'circulo'),
(181, 'funcaoquadratica'),
(182, 'quadrado'),
(183, 'quadrado'),
(184, 'quadrado'),
(185, 'quadrado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(110) NOT NULL,
  `email` varchar(110) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `palavra_seguranca` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `palavra_seguranca`) VALUES
(1, 'Khalia', 'khalia735@gmail.com', '123', 'Mimosa'),
(2, 'teste', 'teste', 'teste', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

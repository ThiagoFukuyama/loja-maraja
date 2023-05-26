-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.24-log
-- Versão do PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `loja_maraja`
--

CREATE DATABASE loja_maraja DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `loja_maraja`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `cod_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco_custo` float NOT NULL,
  `preco_venda` float NOT NULL,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`cod_produto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`cod_produto`, `nome`, `quantidade`, `preco_custo`, `preco_venda`, `descricao`) VALUES
(1, 'Tijolo Marajá', 530, 1, 1.99, 'Tijolo de cerâmica reforçado Marajá'),
(2, 'Tinta Boombril', 450, 45.9, 54.9, 'Tinta impermeabilizante para obra residencial\r\n '),
(3, 'Tábua', 170, 60.98, 79.98, 'Tábua 30cm X 3m para construção civil'),
(4, 'Argamassa São Tomé', 159, 13.79, 18.99, 'Argamassa especial ultraflexível para piso e construção'),
(5, 'Escada articulada', 105, 399.99, 529.9, 'Escada articulada multifuncional de alumínio com 12 degraus');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

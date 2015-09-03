-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 12/08/2015 às 19:43
-- Versão do servidor: 5.5.44-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `chamados`
--
CREATE DATABASE IF NOT EXISTS `chamados` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `chamados`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `atividades`
--

DROP TABLE IF EXISTS `atividades`;
CREATE TABLE IF NOT EXISTS `atividades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_demandante` int(11) NOT NULL,
  `id_responsavel` int(11) NOT NULL,
  `id_setor` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `data` date NOT NULL,
  `tempo_gasto` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `setores`
--

DROP TABLE IF EXISTS `setores`;
CREATE TABLE IF NOT EXISTS `setores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sigla` varchar(8) DEFAULT NULL,
  `nome` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `status_atividade`
--

DROP TABLE IF EXISTS `status_atividade`;
CREATE TABLE IF NOT EXISTS `status_atividade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_setor` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `ativo` enum('Sim','Não') NOT NULL DEFAULT 'Sim',
  `tipo` enum('Administrador','Usuário') NOT NULL DEFAULT 'Usuário',
  `ultimo_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_setor` (`id_setor`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


/*Foreign keys*/
ALTER TABLE `usuarios` ADD CONSTRAINT `fk_usuario_setor` FOREIGN KEY ( `id_setor` ) REFERENCES `setores` ( `id` );
ALTER TABLE `atividades` ADD CONSTRAINT `fk_setor_atividade` FOREIGN KEY ( `id_setor` ) REFERENCES `setores` ( `id` );
ALTER TABLE `atividades` ADD CONSTRAINT `fk_status_atividade` FOREIGN KEY ( `id_status` ) REFERENCES `status_atividade` ( `id` );
ALTER TABLE `atividades` ADD CONSTRAINT `fk_usuario_atividade_demanda` FOREIGN KEY ( `id_demandante` ) REFERENCES `usuarios` ( `id` );
ALTER TABLE `atividades` ADD CONSTRAINT `fk_usuario_atividade_reps` FOREIGN KEY ( `id_responsavel` ) REFERENCES `usuarios` ( `id` );


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

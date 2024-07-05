-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01-Nov-2023 às 23:25
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `canilosasco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sobrenome` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CPF` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Telefone` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Celular` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DataNasc` date NOT NULL,
  `Genero` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha_usuario` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recuperar_senha` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `Sobrenome`, `CPF`, `Telefone`, `Celular`, `DataNasc`, `Genero`, `usuario`, `senha_usuario`, `recuperar_senha`) VALUES
(1, 'amanda', '', '', '', '', '0000-00-00', '', 'canilosascotcc@gmail.com', '$2y$10$BOpBrZdgcGdL85XVei13qOOQ6CHT/5WSzyT2sPcwbud1BQzdrudGe', '$2y$10$I3AIIhywviPcQbYwNlsvdOJ.K6zNS9tF7OmHIZoHnwW9Jw.PUdqPG'),
(5, 'Amanda', 'santos amorim', '555.555.555-24', '', '', '0000-00-00', '', '', '', NULL),
(6, 'yasmin', 'vital', '555.555.555-25', '11912029876', '', '0000-00-00', '', '', '', NULL),
(7, 'camilly', 'vital', '', '', '', '0000-00-00', '', '', '', NULL),
(8, 'camilly', 'vitoria', '555.555.555-24', '1112323424', '12243245555', '0000-00-00', '', '', '', NULL),
(10, 'enzo', 'maldonado', '555.555.555-24', '23724374637', '328437343', '2006-02-19', '', '', '', NULL),
(11, 'danilo', 'carvalho', '555.555.555-25', '112343454564', '1112332435', '2023-11-23', 'M', '', '', NULL),
(12, 'amandaa', 'amorim', '55555555555', '1183843848585', '374747474747', '2005-09-14', 'Outros', '', '', NULL),
(13, 'Amanda', 'Santos Amorim', '515.179.567-98', '11897687656', '1178798097', '2005-09-14', 'F', 'amanda76@gmail.com', '123', '$2y$10$aPzgUfwu7ljZgGsQMU1akepj1yVbtLPISUUqJwPcDQCZGt2Gvib.K'),
(14, 'enzo', 'Maldonado Miura', '515.179.567-98', '1187943746', '119384744', '2006-02-19', 'M', 'enzomald@gmail.com', 'aaaa', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

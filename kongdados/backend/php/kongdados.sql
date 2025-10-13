-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/11/2024 às 00:03
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `kongdados`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `kongdados`
--

CREATE TABLE `kongdados` (
  `nome` varchar(45) NOT NULL,
  `email` varchar(110) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `telefone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `kongdados`
--

INSERT INTO `kongdados` (`nome`, `email`, `senha`, `telefone`) VALUES
('Heitor', 'santosheitor692@gmail.com', '', '123456'),
('Heitor', 'santosheitor692@gmail.com', '', '12345'),
('thiago silva', 'thiagosilva.aluno27@gmail.com', '', 'thiagogay123'),
('Pedro gay', 'pedro@gmail.com', '', 'pedro1234gay'),
('Heitor', 'lusantosfrazao@hotmail.com', '', '24018910'),
('', '', '', ''),
('', '', '', ''),
('Heitor', 'pedro@gmail.com', '', '2401910'),
('Heitor', 'lusantosfrazao@hotmail.com', '', '00198224019018'),
('Heitor', 'lusantosfrazao@hotmail.com', '', '00198224019018'),
('Heitor', 'thiagosilva.aluno27@gmail.com', '', '12345678910'),
('', '', '', ''),
('', '', '', ''),
('ssas', 'thiagosilva.aluno27@gmail.com', '', '112345'),
('', '', '', ''),
('', '', '', ''),
('', '', '', ''),
('', '', '', ''),
('', '', '', ''),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('', '', '', ''),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('', '', '', ''),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('', '', '', ''),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('Heitor', 'santosheitor692@gmail.com', '', '1234'),
('Heitor', 'santosheitor692@gmail.com', '', 'teste123'),
('frazaoteste', 'santosheitor692@gmail.com', '', 'teste123'),
('teste', 'teste123@gmail.com', '', 'testefinalizaca'),
('', '', '', ''),
('Heitor', 'teste123@gmail.com', '', 'teste123'),
('teste', 'teste123@gmail.com', '', 'testefinalizaca'),
('teste123', 'teste123@gmail.com', '', 'testefinalizado'),
('', '', '', ''),
('teste123', 'teste123@gmail.com', 'testefinalizado', 'telefone'),
('teste123', 'teste123@gmail.com', 'testefinalizado', ''),
('teste123', 'teste123@gmail.com', 'testefinalizado', ''),
('teste123', 'teste123@gmail.com', 'testefinalizado', ''),
('teste123', 'teste123@gmail.com', 'testefinalizado', ''),
('teste123', 'teste123@gmail.com', 'testefinalizado', ''),
('teste123', 'teste123@gmail.com', 'testefinalizado', ''),
('teste', 'santosheitor692@gmail.com', '123', '11990110015'),
('Heitor', 'teste123@gmail.com', '24018910', '11990110015'),
('Heitor', 'teste123@gmail.com', '24018910', '11990110015'),
('Heitor', 'teste123@gmail.com', '24018910', '11990110015'),
('', '', '', ''),
('', '', '', ''),
('', '', '', ''),
('', '', '', ''),
('', '', '', ''),
('', '', '', ''),
('Heitor', 'teste123@gmail.com', '12345', '11990110015'),
('Heitor', 'lusantosfrazao@hotmail.com', 'semsenha', '098765'),
('', '', '', ''),
('', '', '', ''),
('', '', '', ''),
('', '', '', ''),
('', '', '', ''),
('', '', '', ''),
('', '', '', ''),
('', '', '', ''),
('', '', '', ''),
('Heitor', 'santosheitor692@gmail.com', 'lu', '1234'),
('Heitor', 'santosheitor692@gmail.com', 'lu', '1234'),
('', '', '', ''),
('', '', '', ''),
('teste', 'teste123@gmail.com', 'teste123', '40028922'),
('titi', 'tiagosilva@gmail.com', 'titi1234', '40028922'),
('titi', 'tiagosilva@gmail.com', 'titi1234', '40028922'),
('Sérgio', 'sergio.professor@gmail.com', '123456', '24018910'),
('Sérgio', 'sergio.professor@gmail.com', '123456', '24018910'),
('Sérgio', 'sergio.professor@gmail.com', '123456', '24018910'),
('frazaoteste', 'teste@gmail.com', '24018910', '001982'),
('frazaoteste', 'teste@gmail.com', '24018910', '001982'),
('teste', 'teste@gmail.com', 'teste24', '1234'),
('thiago silva', 'titi@gmail.com', '3490', '40028922'),
('thiago silva', 'titi@gmail.com', '3490', '40028922'),
('teste', 'teste@gmail.com', '24018910', '11990110015'),
('ssas', 'saaa@gmail.com', 'sasa123', 'sazona'),
('Guilherme', 'gui@gmail.com', '1234', '24018910'),
('Guilherme', 'gui@gmail.com', '1234', '24018910'),
('Sérgio Ponteli ', 'sergioteste@gmail.com', '40028922', '24018910'),
('Heitor teste ', 'heitorteste@gmail.com', '24018910', '11990110015'),
('Heitor ultimo teste', 'teste123@gmail.com', '123', '40028922');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

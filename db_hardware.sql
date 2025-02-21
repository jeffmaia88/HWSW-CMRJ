-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3312
-- Tempo de geração: 21/02/2025 às 23:05
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
-- Banco de dados: `db_hardware`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_entrada`
--

CREATE TABLE `tb_entrada` (
  `id` int(11) NOT NULL,
  `equipamento` varchar(25) NOT NULL,
  `patrimonio` varchar(25) NOT NULL,
  `responsavel` varchar(25) NOT NULL,
  `origem` varchar(50) NOT NULL,
  `data_entrada` date NOT NULL,
  `modelo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_entrada`
--

INSERT INTO `tb_entrada` (`id`, `equipamento`, `patrimonio`, `responsavel`, `origem`, `data_entrada`, `modelo`) VALUES
(1, 'Monitor', '8837701', 'Jefferson', 'GV Vera Lins', '2025-02-13', 'LG'),
(2, 'Computador', '8842658', 'Mauro', 'almoxerifado', '2022-11-22', 'Dell'),
(3, 'Monitor', '8842610', 'JEfferson', 'DTI', '2022-11-22', 'Dell'),
(5, 'Impressora', '8834423', 'Mauro', 'GV Leniel Borel', '2025-02-20', 'Brother'),
(6, 'Impressora', '8834423', 'Mauro', 'GV Leniel Borel', '2025-02-20', 'Brother');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_entrada`
--
ALTER TABLE `tb_entrada`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_entrada`
--
ALTER TABLE `tb_entrada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

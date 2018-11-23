-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 16-Nov-2018 às 00:45
-- Versão do servidor: 5.7.23
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `locadora`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carro`
--

DROP TABLE IF EXISTS `carro`;
CREATE TABLE IF NOT EXISTS `carro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `placa` text NOT NULL,
  `nome` text NOT NULL,
  `modelo` text NOT NULL,
  `valorSeguro` float NOT NULL,
  `valorLocacao` float NOT NULL,
  `cor` text NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `marca` text NOT NULL,
  `img` varchar(100) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carro`
--

INSERT INTO `carro` (`id`, `placa`, `nome`, `modelo`, `valorSeguro`, `valorLocacao`, `cor`, `ativo`, `marca`, `img`) VALUES
(1, 'ABC-666', 'carro0', 'Ben', 100, 500, 'Azul', 0, 'Fiatinho', 'carro1'),
(2, 'htt-2334', 'carro1', 'modelo1', 1000, 100, 'preto', 1, 'honda', 'carro9'),
(3, 'htt-3433', 'carro2', 'hondacivic', 1000, 500, 'branco', 1, 'honda', 'carro10'),
(4, 'htt-12', 'carro3', 'onix', 5000, 100, 'branco', 1, 'chevrolet', 'carro11'),
(5, 'htt-12', 'carro4', 'onix', 5000, 200, 'branco', 1, 'chevrolet', 'carro2'),
(6, 'htt-12', 'carro5', 'onix', 5000, 500, 'branco', 1, 'chevrolet', 'carro3'),
(7, 'htt-12', 'carro6', 'onix', 5000, 600, 'branco', 1, 'chevrolet', 'carro4'),
(8, 'htt-12', 'carro7', 'onix', 5000, 700, 'branco', 1, 'chevrolet', 'carro5'),
(9, 'htt-12', 'carro8', 'onix', 5000, 800, 'branco', 1, 'chevrolet', 'carro6'),
(10, 'htt-12', 'carro9', 'onix', 5000, 900, 'branco', 1, 'chevrolet', 'carro7'),
(11, 'placa1', 'carroalgum', 'i30', 700, 233, 'prata', 1, 'hyndai', 'carro8');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_Cliente` int(11) NOT NULL AUTO_INCREMENT,
  `cnh` text NOT NULL,
  `numeroDependentes` int(11) NOT NULL,
  `idPessoa` int(11) NOT NULL,
  UNIQUE KEY `id_Cliente` (`id_Cliente`),
  KEY `idPessoa` (`idPessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_Cliente`, `cnh`, `numeroDependentes`, `idPessoa`) VALUES
(1, '91553599', 2, 2),
(2, '16366954', 2, 10),
(3, '40028922', 3, 7),
(4, '70707070', 9999, 12),
(5, '35501117', 89, 6),
(6, '69696901', 69, 8),
(7, '41705282', 2, 9),
(8, '11111111', 5, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_Funcionario` int(11) NOT NULL AUTO_INCREMENT,
  `dataAdmissao` date NOT NULL,
  `dataDemissao` date DEFAULT NULL,
  `idPessoa` int(11) NOT NULL,
  UNIQUE KEY `id_Funcionario` (`id_Funcionario`),
  KEY `idPessoa` (`idPessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_Funcionario`, `dataAdmissao`, `dataDemissao`, `idPessoa`) VALUES
(1, '2018-10-22', NULL, 1),
(2, '2018-12-21', NULL, 3),
(3, '2016-02-04', NULL, 15),
(4, '1915-10-17', '2018-08-12', 13),
(5, '2018-05-01', '2018-10-20', 16),
(6, '2018-01-15', NULL, 5),
(7, '2000-10-01', NULL, 4),
(8, '2018-08-10', '2018-10-22', 17),
(69, '2018-08-06', '2018-10-16', 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `locacao`
--

DROP TABLE IF EXISTS `locacao`;
CREATE TABLE IF NOT EXISTS `locacao` (
  `id_Locacao` int(11) NOT NULL AUTO_INCREMENT,
  `dataLocacao` date NOT NULL,
  `dataDevolucao` date NOT NULL,
  `km` float NOT NULL,
  `situacao` text NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idCarro` int(11) NOT NULL,
  `idFuncionario` int(11) NOT NULL,
  UNIQUE KEY `id_Locacao` (`id_Locacao`),
  KEY `idCliente` (`idCliente`),
  KEY `idCarro` (`idCarro`),
  KEY `idFuncionario` (`idFuncionario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE IF NOT EXISTS `pessoa` (
  `id_Pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome_Pessoa` text NOT NULL,
  `rg` text NOT NULL,
  `cpf` text NOT NULL,
  `endereco` text NOT NULL,
  `tipo` text NOT NULL,
  `login` text NOT NULL,
  `senha` text NOT NULL,
  UNIQUE KEY `id_Pessoa` (`id_Pessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id_Pessoa`, `nome_Pessoa`, `rg`, `cpf`, `endereco`, `tipo`, `login`, `senha`) VALUES
(1, 'Diego Silva Araujo', '25841675', '468.461.101-94', '  Samambaia 5621', 'supervisor', 'admin', 'admin'),
(2, 'Pedro Rodrigues Castro', '35484525', '849.293.956-74', 'Rua Anuiba,1091 ', 'cliente', '', ''),
(3, 'Rosetta W. Hammond ', '24715642', '440.138.317-67', 'Rua Petúnia, 1127', 'funcionario`', '', ''),
(4, 'Vinicius Dias Rocha', '28416942', '230.025.317-62', 'Avenida Nossa Senhora','funcionario', '', ''),
(5, 'André Carvalho Ribeiro', '92467158', '364.036.147-46', 'Rua Ponta Grossa 73 ', 'funcionario', '', ''),
(6, 'Erica Soares Paiva ', '57413574', '150.138.257-04', ' Agenor Pinheiro 659','cliente', '', ''),
(7, 'Thiago Cunha Correia', '23741952', '204.264.352-14', 'Rua Hermilio Alves 199', 'cliente', '', ''),
(8, 'Junes Teixeira', '15748216', '044.926.587-41', 'Marcelino Pires 1234', 'cliente', '', ''),
(9, 'Igor Pinto Dias', '58137496', '189.622.259-56', 'Rua Luiz Pelegrino Toaldo 1436 ', 'cliente', '', ''),
(10, 'Erin G. Hoffman', '47512673', '365.254.897-85', 'Linda Street Philadelphia 19108', 'cliente', '', ''),
(11, 'Elvis Sores Paiva ', '25186134', '384.138.317-18', 'Travessa dos Apostolos 530 ', 'cliente', '', ''),
(12, 'Maria Aparecida ', '24381672', '440.138.317-67', 'Aquidauna 2015 ', 'cliente', '', ''),
(13, 'Isabelle Carvalho ', '84940324', '225.006.327-33', 'Rua Kromberg 737', 'funcionario', '', ''),
(14, 'Robert W. Cerda', '25764583', '050.152.561-70', 'San Francisco 531', 'funcionario', '', ''),
(15, 'Elias  da Conceição', '35482671', '22.652.360-3', 'Rua José de Mattos Pereira 431', 'funcionario', '', ''),
(16, 'Matilde Martins Castro', '94152763', '440.138.317-67', 'Forest Avenue 1144', 'funcionario', '', ''),
(17, 'Elaine Cristina ', '51548347', '740.158.317-42', '28 de Outubro  1721', 'funcionario', '', ''),
(18, 'Giovani', '34571286', '267.125.317-67', 'Oliveiras 2356', 'funcionario', '', '');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `id_cliente_pessoa` FOREIGN KEY (`idPessoa`) REFERENCES `pessoa` (`id_Pessoa`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `id_funcionario_pessoa` FOREIGN KEY (`idPessoa`) REFERENCES `pessoa` (`id_Pessoa`) ON UPDATE CASCADE;
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

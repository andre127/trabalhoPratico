package unigran.projeto.br.Pesistencia;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class Banco extends SQLiteOpenHelper {
 public Banco (Context context){
     super(context,"BANCOLOCAPLUS",null,1);
 }
    @Override
    public void onCreate(SQLiteDatabase sqLiteDatabase) {
        String sql ="-- phpMyAdmin SQL Dump\n" +
                "-- version 4.8.3\n" +
                "-- https://www.phpmyadmin.net/\n" +
                "--\n" +
                "-- Host: 127.0.0.1:3306\n" +
                "-- Generation Time: 15-Nov-2018 às 01:17\n" +
                "-- Versão do servidor: 5.7.23\n" +
                "-- versão do PHP: 7.2.10\n" +
                "\n" +
                "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\n" +
                "SET AUTOCOMMIT = 0;\n" +
                "START TRANSACTION;\n" +
                "SET time_zone = \"+00:00\";\n" +
                "\n" +
                "\n" +
                "/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\n" +
                "/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;\n" +
                "/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;\n" +
                "/*!40101 SET NAMES utf8mb4 */;\n" +
                "\n" +
                "--\n" +
                "-- Database: `locadora`\n" +
                "--\n" +
                "\n" +
                "-- --------------------------------------------------------\n" +
                "\n" +
                "--\n" +
                "-- Estrutura da tabela `carro`\n" +
                "--\n" +
                "\n" +
                "DROP TABLE IF EXISTS `carro`;\n" +
                "CREATE TABLE IF NOT EXISTS `carro` (\n" +
                "  `id` int(11) NOT NULL AUTO_INCREMENT,\n" +
                "  `placa` text NOT NULL,\n" +
                "  `nome` text NOT NULL,\n" +
                "  `modelo` text NOT NULL,\n" +
                "  `valorSeguro` float NOT NULL,\n" +
                "  `valorLocacao` float NOT NULL,\n" +
                "  `cor` text NOT NULL,\n" +
                "  `ativo` tinyint(1) NOT NULL,\n" +
                "  `marca` text NOT NULL,\n" +
                "  UNIQUE KEY `id` (`id`)\n" +
                ") ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;\n" +
                "\n" +
                "--\n" +
                "-- Extraindo dados da tabela `carro`\n" +
                "--\n" +
                "\n" +
                "INSERT INTO `carro` (`id`, `placa`, `nome`, `modelo`, `valorSeguro`, `valorLocacao`, `cor`, `ativo`, `marca`) VALUES\n" +
                "(1, 'ABC-666', 'carro0', 'Ben', 100, 500, 'Azul', 0, 'Fiatinho'),\n" +
                "(2, 'htt-2334', 'carro1', 'modelo1', 1000, 100, 'preto', 1, 'honda'),\n" +
                "(3, 'htt-3433', 'carro2', 'hondacivic', 1000, 500, 'branco', 1, 'honda'),\n" +
                "(4, 'htt-12', 'carro3', 'onix', 5000, 100, 'branco', 1, 'chevrolet'),\n" +
                "(5, 'htt-12', 'carro4', 'onix', 5000, 200, 'branco', 1, 'chevrolet'),\n" +
                "(6, 'htt-12', 'carro5', 'onix', 5000, 500, 'branco', 1, 'chevrolet'),\n" +
                "(7, 'htt-12', 'carro6', 'onix', 5000, 600, 'branco', 1, 'chevrolet'),\n" +
                "(8, 'htt-12', 'carro7', 'onix', 5000, 700, 'branco', 1, 'chevrolet'),\n" +
                "(9, 'htt-12', 'carro8', 'onix', 5000, 800, 'branco', 1, 'chevrolet'),\n" +
                "(10, 'htt-12', 'carro9', 'onix', 5000, 900, 'branco', 1, 'chevrolet');\n" +
                "\n" +
                "-- --------------------------------------------------------\n" +
                "\n" +
                "--\n" +
                "-- Estrutura da tabela `cliente`\n" +
                "--\n" +
                "\n" +
                "DROP TABLE IF EXISTS `cliente`;\n" +
                "CREATE TABLE IF NOT EXISTS `cliente` (\n" +
                "  `id` int(11) NOT NULL AUTO_INCREMENT,\n" +
                "  `cnh` text NOT NULL,\n" +
                "  `numeroDependentes` int(11) NOT NULL,\n" +
                "  `idPessoa` int(11) NOT NULL,\n" +
                "  UNIQUE KEY `id` (`id`),\n" +
                "  KEY `idPessoa` (`idPessoa`)\n" +
                ") ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;\n" +
                "\n" +
                "--\n" +
                "-- Extraindo dados da tabela `cliente`\n" +
                "--\n" +
                "\n" +
                "INSERT INTO `cliente` (`id`, `cnh`, `numeroDependentes`, `idPessoa`) VALUES\n" +
                "(1, '91553599', 2, 2),\n" +
                "(2, '1636695', 2, 10),\n" +
                "(3, '40028922', 3, 7),\n" +
                "(4, '70707070', 9999, 12),\n" +
                "(5, '35501117730', 89, 6),\n" +
                "(6, '696969', 69, 8),\n" +
                "(7, '41705282663', 2, 9),\n" +
                "(8, '111111111', 5, 11);\n" +
                "\n" +
                "-- --------------------------------------------------------\n" +
                "\n" +
                "--\n" +
                "-- Estrutura da tabela `funcionario`\n" +
                "--\n" +
                "\n" +
                "DROP TABLE IF EXISTS `funcionario`;\n" +
                "CREATE TABLE IF NOT EXISTS `funcionario` (\n" +
                "  `id` int(11) NOT NULL AUTO_INCREMENT,\n" +
                "  `dataAdmissao` date NOT NULL,\n" +
                "  `dataDemissao` date DEFAULT NULL,\n" +
                "  `supervisor` tinyint(1) NOT NULL,\n" +
                "  `idPessoa` int(11) NOT NULL,\n" +
                "  UNIQUE KEY `id` (`id`),\n" +
                "  KEY `idPessoa` (`idPessoa`)\n" +
                ") ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;\n" +
                "\n" +
                "--\n" +
                "-- Extraindo dados da tabela `funcionario`\n" +
                "--\n" +
                "\n" +
                "INSERT INTO `funcionario` (`id`, `dataAdmissao`, `dataDemissao`, `supervisor`, `idPessoa`) VALUES\n" +
                "(1, '2018-10-22', NULL, 0, 1),\n" +
                "(2, '2018-12-21', NULL, 0, 3),\n" +
                "(3, '2016-02-04', NULL, 0, 15),\n" +
                "(4, '1915-10-17', '2018-08-12', 0, 13),\n" +
                "(5, '2018-05-01', '2018-10-20', 0, 16),\n" +
                "(6, '2018-01-15', NULL, 0, 5),\n" +
                "(7, '2000-10-01', NULL, 0, 4),\n" +
                "(8, '2018-08-10', '2018-10-22', 0, 17),\n" +
                "(69, '2018-08-06', '2018-10-16', 0, 18);\n" +
                "\n" +
                "-- --------------------------------------------------------\n" +
                "\n" +
                "--\n" +
                "-- Estrutura da tabela `locacao`\n" +
                "--\n" +
                "\n" +
                "DROP TABLE IF EXISTS `locacao`;\n" +
                "CREATE TABLE IF NOT EXISTS `locacao` (\n" +
                "  `id` int(11) NOT NULL AUTO_INCREMENT,\n" +
                "  `dataLocacao` date NOT NULL,\n" +
                "  `dataDevolucao` date NOT NULL,\n" +
                "  `quilometragem` float NOT NULL,\n" +
                "  `idPessoa` int(11) NOT NULL,\n" +
                "  `idCliente` int(11) NOT NULL,\n" +
                "  `idFuncionario` int(11) NOT NULL,\n" +
                "  UNIQUE KEY `id` (`id`),\n" +
                "  KEY `idPessoa` (`idPessoa`),\n" +
                "  KEY `idCliente` (`idPessoa`),\n" +
                "  KEY `idFuncionario` (`idPessoa`)\n" +
                ") ENGINE=InnoDB DEFAULT CHARSET=latin1;\n" +
                "\n" +
                "-- --------------------------------------------------------\n" +
                "\n" +
                "--\n" +
                "-- Estrutura da tabela `pessoa`\n" +
                "--\n" +
                "\n" +
                "DROP TABLE IF EXISTS `pessoa`;\n" +
                "CREATE TABLE IF NOT EXISTS `pessoa` (\n" +
                "  `id` int(11) NOT NULL AUTO_INCREMENT,\n" +
                "  `nome` text NOT NULL,\n" +
                "  `rg` text NOT NULL,\n" +
                "  `cpf` text NOT NULL,\n" +
                "  `endereco` text NOT NULL,\n" +
                "  UNIQUE KEY `id` (`id`)\n" +
                ") ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;\n" +
                "\n" +
                "--\n" +
                "-- Extraindo dados da tabela `pessoa`\n" +
                "--\n" +
                "\n" +
                "INSERT INTO `pessoa` (`id`, `nome`, `rg`, `cpf`, `endereco`) VALUES\n" +
                "(1, 'Diego Silva Araujo', '100000122', '468.461.101-94', 'Quadra QN 419 Bloco C, 1025, Samambaia-DF'),\n" +
                "(2, 'Pedro Rodrigues Castro', '2.555.844', '849.293.956-74', 'Rua Anuiba,1091,Duque de Caxias,RJ'),\n" +
                "(3, 'Rosetta W. Hammond ', '1231231', '440.138.317-67', 'Rua Petúnia, 1127, Porto Velho, RO'),\n" +
                "(4, 'Vinicius Dias Rocha', '0218549', '97569403525', 'Avenida Nossa Senhora,914,Boa Vista,RR'),\n" +
                "(5, 'André Carvalho Ribeiro', '86.060.450', '364.036.147-46', 'Rua Ponta Grossa, 73, Londrina-PR'),\n" +
                "(6, 'Dzhambolat Akhtakhanov', '470289909', '789632154125', 'Praça Agenor Pinheiro, 659, Baixa Grande do Ribeiro'),\n" +
                "(7, 'Thiago Cunha Correia', '204.264.3', '204.264.352-14', 'Rua Hermílio Alves,199,São João Del Rei,MG'),\n" +
                "(8, 'MEU NOME NÃO É JUNES', '001.867.444', '044.926.587-41', 'RUA NÃO TE INTERESSA, 666, DOURADOS,MS'),\n" +
                "(9, 'Igor Pinto Dias', '29.734.404-3', '189.622.259-56', 'Rua Luiz Pelegrino Toaldo,1436,Curitiba-PR'),\n" +
                "(10, 'Erin G. Hoffman', '96584128', '365.254.897-85', '2188 Linda Street, Philadelphia, PA 19108'),\n" +
                "(11, 'ANDRE (eu sou hétero obs: é verdade esse bileti)', '69.6969.69', '222.222.222.22', 'Travessa no cu Torquato Lumandi,530,Santo Angelo,Rs'),\n" +
                "(12, 'MARIA DA SILVA PINTO', '70707070', '999.999.999-99', 'RUA QUINTO DOS INFOERNO, 6969, iNFERNO,CU'),\n" +
                "(13, 'Isabelle Carvalho Pinto', '849403', '225.006.327-33', 'Rua Kromberg,737,Boa Vista,PR'),\n" +
                "(14, 'Robert W. Cerda', '050.152.561-70', '11286921', 'San Francisco'),\n" +
                "(15, 'Elias Renan Vitor da Conceição', '22.652.360-3', '0410695557', 'Rua José de Mattos Pereira,431'),\n" +
                "(16, 'Matilde Martins Castro', '9415276315', '84724836', 'Forest Avenue'),\n" +
                "(17, 'NAROBOLSO SSIAME IRJA', '125.565.321-78', '11554412345', 'Rua 28 de Outubro, nº 17, Aki BAla HU'),\n" +
                "(18, 'Giovani', '696969696969', '69696969', 'rua das picas, numero 69');\n" +
                "\n" +
                "--\n" +
                "-- Constraints for dumped tables\n" +
                "--\n" +
                "\n" +
                "--\n" +
                "-- Limitadores para a tabela `cliente`\n" +
                "--\n" +
                "ALTER TABLE `cliente`\n" +
                "  ADD CONSTRAINT `id_cliente_pessoa` FOREIGN KEY (`idPessoa`) REFERENCES `pessoa` (`id`) ON UPDATE CASCADE;\n" +
                "\n" +
                "--\n" +
                "-- Limitadores para a tabela `funcionario`\n" +
                "--\n" +
                "ALTER TABLE `funcionario`\n" +
                "  ADD CONSTRAINT `id_funcionario_pessoa` FOREIGN KEY (`idPessoa`) REFERENCES `pessoa` (`id`) ON UPDATE CASCADE;\n" +
                "COMMIT;\n" +
                "\n" +
                "/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\n" +
                "/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\n" +
                "/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;\n";

        sqLiteDatabase.execSQL(sql);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {

    }
}
